<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="tab" id="tab" value="<?php echo $tab;?>"/>
<div id="Tabs">
<div id="Tabs0" style="display:">
<table class="tb">
<thead>
<th>��������</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">��վ����</td>
<td><input name="setting[sitename]" type="text" value="<?php echo $sitename;?>" size="40"/></td>
</tr>
<tr>
<td class="tl">��վ��ַ</td>
<td><input name="config[url]" type="text" value="<?php echo $url;?>" size="40"/><?php tips('����д����URL��ַ,����http://www.xxxx.com/<br/>ע���� / ��β');?></td>
</tr>
<tr>
<td class="tl">��վLOGO</td>
<td><input name="setting[logo]" type="text" value="<?php echo $logo;?>" id="logo" size="60"/> <span onclick="Dthumb(1,303,68, $('#logo').val(), 0, 'logo');" class="jt">�ϴ�</span>&nbsp;&nbsp;<span onclick="_preview($('#logo').val());" class="jt">Ԥ��</span>&nbsp;&nbsp;<span onclick="$('#logo').val('');" class="jt">ɾ��</span><br/>
<a href="<?php echo XQ_PATH;?>" target="_blank"><img src="<?php echo $logo ? $logo : XQ_STYLE.'images/logo.gif';?>" style="margin:2px;"/></a></td>
</tr>
<tr>
<td class="tl">���Ե�ַ</td>
<td>
<input type="radio" name="config[absurl]" value="1"  <?php if($absurl){ ?>checked <?php } ?>/> ����
<input type="radio" name="config[absurl]" value="0"  <?php if(!$absurl){ ?>checked <?php } ?>/> �ر�<?php tips('������һģ��󶨶�������ʱ�������þ��Ե�ַ');?>
</td>
</tr>
<tr>
<td class="tl">��Ȩ��Ϣ</td>
<td><textarea name="setting[copyright]" id="copyright" style="width:500px;height:50px;"><?php echo $copyright;?></textarea><br/>֧��HTML�﷨�����ô��룺��Ȩ&copy; &amp;copy; �ո� &amp;nbsp; ����  &lt;br/&gt;
</td> 
</tr>
<tr>
<td class="tl">��վ����</td>
<td><textarea name="setting[webann]" id="webann" style="width:500px;height:50px;"><?php echo $webann;?></textarea><br/>֧��HTML�﷨
</td> 
</tr>
<tr>
<td class="tl">ICP�������</td>
<td><input name="setting[icpno]" type="text" value="<?php echo $icpno;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">��վ״̬</td>
<td>
<input type="radio" name="setting[close]" value="0"  <?php if(!$close){ ?>checked <?php } ?> onclick="Dh('dclose');"/> ����&nbsp;&nbsp;
<input type="radio" name="setting[close]" value="1"  <?php if($close){ ?>checked <?php } ?> onclick="Ds('dclose');"/> �ر�
</td>
</tr>
<tr id="dclose" style="display:<?php if(!$close) echo 'none';?>">
<td class="tl">�ر�ԭ��</td>
<td><textarea name="setting[close_reason]" id="close_reason" style="width:500px;height:50px;overflow:visible;"><?php echo $close_reason;?></textarea><br/>֧��HTML�﷨����վ�رղ�Ӱ���̨����
</td> 
</tr>
<tr>
<td class="tl">��վĬ������</td>
<td>
<?php
$select = '';
$dirs = list_dir('xqcms/languages');
foreach($dirs as $v) {
	$selected = ($v['dir'] == XQ_LANG) ? 'selected' : '';
	$select .= "<option value='".$v['dir']."' ".$selected.">".$v['name']."</option>";
}
$select = '<select name="config[language]">'.$select.'</select>';
echo $select;
?>
</td> 
</tr>

<tr>
<td class="tl">��վĬ�Ϸ��</td>
<td>
<?php
$select = '';
$dirs = list_dir('style');
foreach($dirs as $v) {
	$selected = ($WEB['style'] && $v['dir'] == $WEB['style']) ? 'selected' : '';
	$select .= "<option value='".$v['dir']."' ".$selected.">".$v['name']."</option>";
}
$select = '<select name="config[style]">'.$select.'</select>';
echo $select;
tips('λ��./style/Ŀ¼,һ��Ŀ¼��Ϊһ�׷��');
?>
</td> 
</tr>
<tr>
<td class="tl">��վĬ��ģ��</td>
<td>
<?php
$select = '';
$dirs = list_dir('templates');
foreach($dirs as $v) {
	$selected = ($WEB['templates'] && $v['dir'] == $WEB['templates']) ? 'selected' : '';
	$select .= "<option value='".$v['dir']."' ".$selected.">".$v['name']."</option>";
}
$select = '<select name="config[templates]">'.$select.'</select>';
echo $select;
tips('λ��./templates/Ŀ¼,һ��Ŀ¼��Ϊһ��ģ��');
?>
</td> 
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</div>

<div id="Tabs1" style="display:none">
<table class="tb">
<thead>
<th>��ϵ��ʽ</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">��ϵ�绰</td>
<td><input name="setting[webphone]" type="text" value="<?php echo $webphone;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">��ϵ����</td>
<td><input name="setting[webfax]" type="text" value="<?php echo $webfax;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">��ϵ�ֻ�</td>
<td><input name="setting[webtel]" type="text" value="<?php echo $webtel;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">�� ϵ ��</td>
<td><input name="setting[webplpoer]" type="text" value="<?php echo $webplpoer;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">��ϵQQ</td>
<td><input name="setting[webqq]" type="text" value="<?php echo $webqq;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">��ϵe-mail</td>
<td><input name="setting[webmail]" type="text" value="<?php echo $webmail;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">��ϵ��ַ</td>
<td><input name="setting[webadd]" type="text" value="<?php echo $webadd;?>" size="40"/></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input name="setting[webcode]" type="text" value="<?php echo $webcode;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">Ư��QQ</td>
<td><input name="setting[webfqq]" type="text" value="<?php echo $webfqq;?>" size="80"/> <input type="radio" name="setting[isfqq]"  value="1" <?php if($isfqq){echo 'checked';}?> /> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[isfqq]" value="0" <?php if(!$isfqq){echo 'checked';}?>/> �ر�&nbsp;&nbsp;<?php tips('��ʽ:����|QQ����,��д�������,����');?></td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</div>

<div id="Tabs2" style="display:none">
<table class="tb">
<thead>
<th>SEO�Ż�</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">����ָ���</td>
<td><input name="setting[seo_delimiter]" type="text" value="<?php echo $seo_delimiter;?>" size="10"/></td>
</tr>
<tr>
<td class="tl">Title(��վ����)</td>
<td><input name="setting[seo_title]" type="text" value="<?php echo $seo_title;?>" size="61"><?php tips('��������������õ���ҳ����');?></td>
</tr>
<tr>
<td class="tl">Meta Keywords<br/>(��ҳ�ؼ���)</td>
<td><textarea name="setting[seo_keywords]" cols="60" rows="3"><?php echo $seo_keywords;?></textarea><?php tips('��������������õĹؼ���');?></td>
</tr>
<tr>
<td class="tl">Meta Description<br/>(��ҳ����)</td>
<td><textarea name="setting[seo_description]" cols="60" rows="3"><?php echo $seo_description;?></textarea><?php tips('��������������õ���ҳ����');?></td>
</tr>


<tr>
<td class="tl">Ŀ¼��ҳ�ļ���</td>
<td><input name="setting[index]" type="text" value="<?php echo $index;?>" size="8"/>
</td>
</tr>
<tr>
<td class="tl">�����ļ���չ��</td>
<td>
<select name="setting[file_ext]">
<option value="html"<?php if($file_ext == 'html') echo ' selected';?>>.html</option>
<option value="htm"<?php if($file_ext == 'htm') echo ' selected';?>>.htm</option>
<option value="shtm"<?php if($file_ext == 'shtm') echo ' selected';?>>.shtm</option>
<option value="shtml"<?php if($file_ext == 'shtml') echo ' selected';?>>.shtml</option>
</select>
</td>
</tr>
<tr>
<td class="tl">��վ��ҳ����html</td>
<td>
<input type="radio" name="setting[index_html]" value="1"  <?php if($index_html){ ?>checked <?php } ?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[index_html]" value="0"  <?php if(!$index_html){ ?>checked <?php } ?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">����������·������</td>
<td>
<input type="radio" name="setting[pcharset]" value="0"  <?php if(!$pcharset){ ?>checked <?php } ?>/> δ��&nbsp;&nbsp;
<input type="radio" name="setting[pcharset]" value="gbk"  <?php if($pcharset == 'gbk'){ ?>checked <?php } ?>/> GBK&nbsp;&nbsp;
<input type="radio" name="setting[pcharset]" value="utf-8"  <?php if($pcharset == 'utf-8'){ ?>checked <?php } ?>/> UTF-8 <?php tips('�����ɰ��������ļ������ļ���������������ش����������ļ���ʾ�Ҳ����ļ�ʱ���ɳ������ô���');?>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<div id="Tabs3" style="display:none">
<table class="tb">
<thead>
<th>�ϴ�����</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">�����ϴ����ļ�����</td>
<td><input name="setting[uploadtype]" type="text" value="<?php echo $uploadtype;?>" size="60"/> <?php tips('��|�Ÿ����ļ���׺');?></td>
</tr>
<tr>
<td class="tl">�����ϴ���С����</td>
<td><input name="setting[uploadsize]" type="text" value="<?php echo $uploadsize;?>" size="10"/> Kb (1024Kb=1M)</td>
</tr>
<tr>
<td class="tl">�ļ�����Ŀ¼</td>
<td>
<select name="setting[uploaddir]">
<option value="Ym/d" <?php if($uploaddir == 'Ym/d') echo 'selected';?>>����/��</option>
<option value="Ym/d/H" <?php if($uploaddir == 'Ym/d/H') echo 'selected';?>>����/��/ʱ</option>
<option value="Ym/d/H/i" <?php if($uploaddir == 'Ym/d/H/i') echo 'selected';?>>����/��/ʱ/��</option>
<option value="Ym/d/H/i/s" <?php if($uploaddir == 'Ym/d/H/i/s') echo 'selected';?>>����/��/ʱ/��/��</option>
</select>
<?php tips('�ϴ��ļ������� upfiles Ŀ¼');?>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>

<table class="tb">
<thead>
<th>ͼƬˮӡ</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">ˮӡͼƬ</td>
<td><input name="setting[water_image]" type="text" value="<?php echo $water_image;?>" size="40"/><br/>
<img src="<?php echo $water_image;?>"/></td>
</tr>
<tr>
<td class="tl">ˮӡ͸����</td>
<td><input name="setting[water_transition]" type="text" value="<?php echo $water_transition;?>" size="5"><?php tips('���ˮӡͼΪgif��ʽ�������÷�ΧΪ 1~100 ������,��ֵԽСˮӡͼƬԽ͸����PNG ����ˮӡ����������͸��Ч�������������');?></td>
</tr>
<tr>
<td class="tl">JPEG ˮӡ����</td>
<td><input name="setting[water_jpeg_quality]" type="text" value="<?php echo $water_jpeg_quality;?>" size="5"><?php tips('��ΧΪ 0~100 ������,��ֵԽ����ͼƬЧ��Խ��,���ߴ�ҲԽ��');?></td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>

<table class="tb">
<thead>
<th>����ˮӡ</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">ˮӡ����</td>
<td><input name="setting[water_text]" type="text" id="water_text" value="<?php echo $water_text;?>" size="30" style="color:<?php echo $water_fontcolor;?>;font-size:<?php echo $water_fontsize;?>px;"></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input name="setting[water_font]" type="text" value="<?php echo $water_font;?>" size="30"> <?php if($water_font && !is_file(XQ_ROOT."/data/".$water_font)){ ?><span class="f_red">���岻����,���ϴ����嵽./data/Ŀ¼</span><?php } ?></td>
</tr>
<tr>
<td class="tl">���ִ�С</td>
<td><input name="setting[water_fontsize]" type="text" value="<?php echo $water_fontsize;?>" size="8" style="font-size:<?php echo $water_fontsize;?>px;" onblur="this.style.fontSize=this.value+'px';$('water_text').style.fontSize=this.value+'px';"> px</td>
</tr>
<tr>
<td class="tl">������ɫ</td>
<td><input name="setting[water_fontcolor]" type="text" value="<?php echo $water_fontcolor;?>" size="8" style="color:<?php echo $water_fontcolor;?>" onblur="this.style.color=this.value;$('water_text').style.color=this.value;"></td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>

<table class="tb">
<thead>
<th>ͼƬ����</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">ˮӡ����</td>
<td>
<input type="radio" name="setting[water_type]" value="0"  <?php if($water_type==0){ ?>checked <?php } ?> /> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[water_type]" value="1"  <?php if($water_type==1){ ?>checked <?php } ?> /> ����ˮӡ&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[water_type]" value="2"  <?php if($water_type==2){ ?>checked <?php } ?> /> ͼƬˮӡ
</td>
</tr>

<tr>
<td class="tl">ˮӡͼƬ�����ֱ߾�</td>
<td><input name="setting[water_margin]" type="text" value="<?php echo $water_margin;?>" size="5"> px <?php tips('ˮӡͼƬ��������ԭͼ�ı߾�');?>
</td>
</tr>
<tr>
<td class="tl">ͼƬ��������</td>
<td><input name="setting[water_min_wh]" type="text" value="<?php echo $water_min_wh;?>" size="5"> px <?php tips('ͼƬ��Ȼ��߸߶�С�ڴ�ֵ������ˮӡ����');?>
</td>
</tr>
<tr>
<td class="tl">ˮӡλ��</td>
<td>
	<table cellspacing="1" cellpadding="5" width="150" >
	<tr align="center" bgcolor="#F1F2F3">
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'"> <input type="radio" name="setting[water_pos]" value="1" <?php if($water_pos==1){ ?>checked <?php } ?>/> </td>
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'"> <input type="radio" name="setting[water_pos]" value="2" <?php if($water_pos==2){ ?>checked <?php } ?>/></td>
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'"> <input type="radio" name="setting[water_pos]" value="3" <?php if($water_pos==3){ ?>checked <?php } ?>/> </td>
	</tr>

	<tr align="center"  bgcolor="#F1F2F3">
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'"> <input type="radio" name="setting[water_pos]" value="4" <?php if($water_pos==4){ ?>checked <?php } ?>/> </td>
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'"> <input type="radio" name="setting[water_pos]" value="5" <?php if($water_pos==5){ ?>checked <?php } ?>/> </td>
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'"> <input type="radio" name="setting[water_pos]" value="6" <?php if($water_pos==6){ ?>checked <?php } ?>/> </td>
	</tr>

	<tr align="center" bgcolor="#F1F2F3">
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'"> <input type="radio" name="setting[water_pos]" value="7" <?php if($water_pos==7){ ?>checked <?php } ?>/> </td>
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'"> <input type="radio" name="setting[water_pos]" value="8" <?php if($water_pos==8){ ?>checked <?php } ?>/> </td>
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'"> <input type="radio" name="setting[water_pos]" value="9" <?php if($water_pos==9){ ?>checked <?php } ?>/> </td>
	</tr>
	<tr align="center" bgcolor="#F1F2F3">
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'" colspan="3">��� <input type="radio" name="setting[water_pos]" value="0" <?php if($water_pos==0){ ?>checked <?php } ?>/></td>
	</tr>
	</table>
</tr>
<tr>
<td class="tl">BMPͼƬתJPG��ʽ</td>
<td>
<input type="radio" name="setting[bmp_jpg]" value="1"  <?php if($bmp_jpg==1){ ?>checked <?php } ?> /> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[bmp_jpg]" value="0"  <?php if($bmp_jpg==0){ ?>checked <?php } ?> /> �ر�
<?php tips('BMP��ʽͼƬ����ϴ��Ҳ�����������ͼ�����鿪��');?>
</td>
</tr>

<tr>
<td class="tl">��ͼ��ˮӡ</td>
<td>
<input type="radio" name="setting[water_middle]" value="1"  <?php if($water_middle==1){ ?>checked <?php } ?> /> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[water_middle]" value="0"  <?php if($water_middle==0){ ?>checked <?php } ?> /> �ر�
</td>
</tr>
<tr>
<td class="tl">��ͼ���Դ�С</td>
<td><input name="setting[middle_w]" type="text" value="<?php echo $middle_w;?>" size="3"/> X <input name="setting[middle_h]" type="text" value="<?php echo $middle_h;?>" size="3"/> px
</td>
</tr>
<tr>
<td class="tl">ͼƬ����ģʽ</td>
<td>
<input type="radio" name="setting[thumb_album]" value="0"  <?php if($thumb_album==0){ ?>checked <?php } ?> /> �ü�&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[thumb_album]" value="1"  <?php if($thumb_album==1){ ?>checked <?php } ?> /> ѹ��
<?php tips('�ü�ģʽ��ͼƬ��ʾ����������ͼ���ܻᱻ�ö��ಿ��<br/>ѹ��ģʽ��ͼƬ��ʾ����������ͼ���ܻ����ױ�');?>
</td>
</tr>
<tr>
<td class="tl">����ͼƬ����ģʽ</td>
<td>
<input type="radio" name="setting[thumb_title]" value="0"  <?php if($thumb_title==0){ ?>checked <?php } ?> /> �ü�&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[thumb_title]" value="1"  <?php if($thumb_title==1){ ?>checked <?php } ?> /> ѹ��
</td>
</tr>
<tr>
<td class="tl">ͼƬ�ļ������</td>
<td><input name="setting[max_image]" type="text" value="<?php echo $max_image;?>" size="5"/> px
<?php tips('������ʾ��������ޣ������˿�ȵ�ͼƬ�����ȱȵ���Ϊ�˿���Խ�ʡ�洢�ռ�');?>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<div id="Tabs4" style="display:none">
<table class="tb">
<thead>
<th>����������</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">�Ƿ���������</td>
<td><input type="radio" name="setting[iscount]" value="1" <?php if($iscount){echo "checked";}?> /> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[iscount]"  value="0" <?php if(!$iscount){echo "checked";}?>/> �ر�</td>
</tr>
<tr>
<td class="tl">��������ʼֵ</td>
<td>  <input type="text" size="10" name="setting[countval]" value="<?php echo $countval; ?>" />&nbsp;��ǰֵ��<font color="red"><?php echo $webcount;?><input  type="hidden" name="setting[webcount]" value="<?php echo $webcount;?>" /></font></td>
</tr>
<tr>
<td class="tl">�������������</td>
<td><input type="text" name="setting[countl]" value="<?php echo $countl;?>" /></td>
</tr>
<tr>
<td class="tl">���������</td>
<td>
<?php
$input = '';
$dirs = list_dir('app/count');
foreach($dirs as $v) {
	$checked = ($count && $v['dir'] == $count) ? ' checked' : '';
	$input .= "<input class='radio' type='radio' name='setting[count]' value='".$v['dir']."'".$checked.">&nbsp;";
	for($i=0;$i<=9;$i++){
		$input .=  "<img src='app/count/".$v['dir']."/".$i.".gif' align='absbottom'>";
	}
	$input .= "<br>";
}
echo $input;
?>


</td>
</tr>
<tr>
<td class="tl">�������ұ�����</td>
<td><input type="text" name="setting[countr]" value="<?php echo $countr;?>" /></td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<div id="Tabs5" style="display:none">
<table class="tb">
<thead>
<th>�������Ż�</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">��ҳ�Զ�����ʱ��</td>
<td>
<input name="setting[task_index]" type="text" value="<?php echo $task_index;?>" size="5"/> �� <?php tips('�������ɵľ�̬��ҳ��Ч');?>
</td>
</tr>
<tr>
<td class="tl">�б�ҳ�Զ�����ʱ��</td>
<td>
<input name="setting[task_list]" type="text" value="<?php echo $task_list;?>" size="5"/> �� <?php tips('�������ɵľ�̬��ҳ��Ч');?>
</td>
</tr>
<tr>
<td class="tl">����ҳ�Զ�����ʱ��</td>
<td>
<input name="setting[task_item]" type="text" value="<?php echo $task_item;?>" size="5"/> �� <?php tips('�������ɵľ�̬��ҳ��Ч');?>
</td>
</tr>
<tr>
<td class="tl">��վ��ҳʹ����Ե�ַ</td>
<td>
<input type="radio" name="setting[index_rela]" value="1"  <?php if($index_rela){ ?>checked <?php } ?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[index_rela]" value="0"  <?php if(!$index_rela){ ?>checked <?php } ?>/> �ر� <?php tips('���������վ��ҳ����htmlʱ��Ч<br/>��վ��ҳ����Ҫʹ�þ��Ե�ַ����������ɽ�ʡ10Kb���ϵ���ҳ���');?>
</td>
</tr>
<tr>
<td class="tl">ģ�建���Զ�����</td>
<td>
<input type="radio" name="config[template_refresh]" value="1" <?php if($template_refresh){ ?>checked <?php } ?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="config[template_refresh]" value="0" <?php if(!$template_refresh){ ?>checked <?php } ?>/> �ر� <?php tips('�����վģ�������޸ģ��������رմ˹���');?></td>
</tr>
<tr title="��ҳ��������gzipѹ�����䣬���Լӿ촫���ٶȣ���PHP 4.0.4������֧��Zlibģ�����ʹ��">
<td class="tl">ҳ��Gzipѹ��</td>
<td>
<input type="radio" name="setting[gzip_enable]" value="1" <?php if($gzip_enable){ ?>checked <?php } ?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[gzip_enable]" value="0" <?php if(!$gzip_enable){ ?>checked <?php } ?>/> �ر� <?php tips(function_exists('ob_gzhandler') ? '��ǰ������֧��Gzip�����鿪��' : '��ǰ��������֧��Gzip����ر�');?>
</td>
</tr>
<tr>
<td class="tl">��ҳ��ʾ��ʽ</td>
<td>
<input type="radio" name="setting[pages_mode]" value="0" <?php if(!$pages_mode){ ?>checked <?php } ?>/> Ĭ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[pages_mode]" value="1" <?php if($pages_mode){ ?>checked <?php } ?>/> ���
</td>
</tr>
<tr>
<td class="tl">�б�ÿҳĬ����Ϣ����</td>
<td><input name="setting[pagesize]" type="text" value="<?php echo $pagesize;?>" size="3"/> ��</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="sbt">
<input type="submit" name="submit" value="ȷ ��" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="չ ��" id="ShowAll" class="btn" title="չ��/��������"/>
</div>
</form>
</body>
</html>