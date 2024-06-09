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
<th>基本设置</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">网站名称</td>
<td><input name="setting[sitename]" type="text" value="<?php echo $sitename;?>" size="40"/></td>
</tr>
<tr>
<td class="tl">网站地址</td>
<td><input name="config[url]" type="text" value="<?php echo $url;?>" size="40"/><?php tips('请添写完整URL地址,例如http://www.xxxx.com/<br/>注意以 / 结尾');?></td>
</tr>
<tr>
<td class="tl">网站LOGO</td>
<td><input name="setting[logo]" type="text" value="<?php echo $logo;?>" id="logo" size="60"/> <span onclick="Dthumb(1,303,68, $('#logo').val(), 0, 'logo');" class="jt">上传</span>&nbsp;&nbsp;<span onclick="_preview($('#logo').val());" class="jt">预览</span>&nbsp;&nbsp;<span onclick="$('#logo').val('');" class="jt">删除</span><br/>
<a href="<?php echo XQ_PATH;?>" target="_blank"><img src="<?php echo $logo ? $logo : XQ_STYLE.'images/logo.gif';?>" style="margin:2px;"/></a></td>
</tr>
<tr>
<td class="tl">绝对地址</td>
<td>
<input type="radio" name="config[absurl]" value="1"  <?php if($absurl){ ?>checked <?php } ?>/> 启用
<input type="radio" name="config[absurl]" value="0"  <?php if(!$absurl){ ?>checked <?php } ?>/> 关闭<?php tips('如有任一模块绑定二级域名时必须启用绝对地址');?>
</td>
</tr>
<tr>
<td class="tl">版权信息</td>
<td><textarea name="setting[copyright]" id="copyright" style="width:500px;height:50px;"><?php echo $copyright;?></textarea><br/>支持HTML语法，常用代码：版权&copy; &amp;copy; 空格 &amp;nbsp; 换行  &lt;br/&gt;
</td> 
</tr>
<tr>
<td class="tl">网站公告</td>
<td><textarea name="setting[webann]" id="webann" style="width:500px;height:50px;"><?php echo $webann;?></textarea><br/>支持HTML语法
</td> 
</tr>
<tr>
<td class="tl">ICP备案序号</td>
<td><input name="setting[icpno]" type="text" value="<?php echo $icpno;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">网站状态</td>
<td>
<input type="radio" name="setting[close]" value="0"  <?php if(!$close){ ?>checked <?php } ?> onclick="Dh('dclose');"/> 开启&nbsp;&nbsp;
<input type="radio" name="setting[close]" value="1"  <?php if($close){ ?>checked <?php } ?> onclick="Ds('dclose');"/> 关闭
</td>
</tr>
<tr id="dclose" style="display:<?php if(!$close) echo 'none';?>">
<td class="tl">关闭原因</td>
<td><textarea name="setting[close_reason]" id="close_reason" style="width:500px;height:50px;overflow:visible;"><?php echo $close_reason;?></textarea><br/>支持HTML语法，网站关闭不影响后台管理
</td> 
</tr>
<tr>
<td class="tl">网站默认语言</td>
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
<td class="tl">网站默认风格</td>
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
tips('位于./style/目录,一个目录即为一套风格');
?>
</td> 
</tr>
<tr>
<td class="tl">网站默认模板</td>
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
tips('位于./templates/目录,一个目录即为一套模板');
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
<th>联系方式</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">联系电话</td>
<td><input name="setting[webphone]" type="text" value="<?php echo $webphone;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">联系传真</td>
<td><input name="setting[webfax]" type="text" value="<?php echo $webfax;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">联系手机</td>
<td><input name="setting[webtel]" type="text" value="<?php echo $webtel;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">联 系 人</td>
<td><input name="setting[webplpoer]" type="text" value="<?php echo $webplpoer;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">联系QQ</td>
<td><input name="setting[webqq]" type="text" value="<?php echo $webqq;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">联系e-mail</td>
<td><input name="setting[webmail]" type="text" value="<?php echo $webmail;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">联系地址</td>
<td><input name="setting[webadd]" type="text" value="<?php echo $webadd;?>" size="40"/></td>
</tr>
<tr>
<td class="tl">邮政编码</td>
<td><input name="setting[webcode]" type="text" value="<?php echo $webcode;?>" size="20"/></td>
</tr>
<tr>
<td class="tl">漂浮QQ</td>
<td><input name="setting[webfqq]" type="text" value="<?php echo $webfqq;?>" size="80"/> <input type="radio" name="setting[isfqq]"  value="1" <?php if($isfqq){echo 'checked';}?> /> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[isfqq]" value="0" <?php if(!$isfqq){echo 'checked';}?>/> 关闭&nbsp;&nbsp;<?php tips('格式:名称|QQ号码,填写多个请用,隔开');?></td>
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
<th>SEO优化</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">标题分隔符</td>
<td><input name="setting[seo_delimiter]" type="text" value="<?php echo $seo_delimiter;?>" size="10"/></td>
</tr>
<tr>
<td class="tl">Title(网站标题)</td>
<td><input name="setting[seo_title]" type="text" value="<?php echo $seo_title;?>" size="61"><?php tips('针对搜索引擎设置的网页标题');?></td>
</tr>
<tr>
<td class="tl">Meta Keywords<br/>(网页关键词)</td>
<td><textarea name="setting[seo_keywords]" cols="60" rows="3"><?php echo $seo_keywords;?></textarea><?php tips('针对搜索引擎设置的关键词');?></td>
</tr>
<tr>
<td class="tl">Meta Description<br/>(网页描述)</td>
<td><textarea name="setting[seo_description]" cols="60" rows="3"><?php echo $seo_description;?></textarea><?php tips('针对搜索引擎设置的网页描述');?></td>
</tr>


<tr>
<td class="tl">目录首页文件名</td>
<td><input name="setting[index]" type="text" value="<?php echo $index;?>" size="8"/>
</td>
</tr>
<tr>
<td class="tl">生成文件扩展名</td>
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
<td class="tl">网站首页生成html</td>
<td>
<input type="radio" name="setting[index_html]" value="1"  <?php if($index_html){ ?>checked <?php } ?>/> 开启&nbsp;&nbsp;
<input type="radio" name="setting[index_html]" value="0"  <?php if(!$index_html){ ?>checked <?php } ?>/> 关闭
</td>
</tr>
<tr>
<td class="tl">服务器中文路径编码</td>
<td>
<input type="radio" name="setting[pcharset]" value="0"  <?php if(!$pcharset){ ?>checked <?php } ?>/> 未用&nbsp;&nbsp;
<input type="radio" name="setting[pcharset]" value="gbk"  <?php if($pcharset == 'gbk'){ ?>checked <?php } ?>/> GBK&nbsp;&nbsp;
<input type="radio" name="setting[pcharset]" value="utf-8"  <?php if($pcharset == 'utf-8'){ ?>checked <?php } ?>/> UTF-8 <?php tips('当生成包含中文文件名的文件出现乱码或者下载带有中文名文件提示找不到文件时，可尝试设置此项');?>
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
<th>上传设置</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">允许上传的文件类型</td>
<td><input name="setting[uploadtype]" type="text" value="<?php echo $uploadtype;?>" size="60"/> <?php tips('用|号隔开文件后缀');?></td>
</tr>
<tr>
<td class="tl">允许上传大小限制</td>
<td><input name="setting[uploadsize]" type="text" value="<?php echo $uploadsize;?>" size="10"/> Kb (1024Kb=1M)</td>
</tr>
<tr>
<td class="tl">文件保存目录</td>
<td>
<select name="setting[uploaddir]">
<option value="Ym/d" <?php if($uploaddir == 'Ym/d') echo 'selected';?>>年月/日</option>
<option value="Ym/d/H" <?php if($uploaddir == 'Ym/d/H') echo 'selected';?>>年月/日/时</option>
<option value="Ym/d/H/i" <?php if($uploaddir == 'Ym/d/H/i') echo 'selected';?>>年月/日/时/分</option>
<option value="Ym/d/H/i/s" <?php if($uploaddir == 'Ym/d/H/i/s') echo 'selected';?>>年月/日/时/分/秒</option>
</select>
<?php tips('上传文件保存于 upfiles 目录');?>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>

<table class="tb">
<thead>
<th>图片水印</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">水印图片</td>
<td><input name="setting[water_image]" type="text" value="<?php echo $water_image;?>" size="40"/><br/>
<img src="<?php echo $water_image;?>"/></td>
</tr>
<tr>
<td class="tl">水印透明度</td>
<td><input name="setting[water_transition]" type="text" value="<?php echo $water_transition;?>" size="5"><?php tips('如果水印图为gif格式，请设置范围为 1~100 的整数,数值越小水印图片越透明。PNG 类型水印本身具有真彩透明效果，无须此设置');?></td>
</tr>
<tr>
<td class="tl">JPEG 水印质量</td>
<td><input name="setting[water_jpeg_quality]" type="text" value="<?php echo $water_jpeg_quality;?>" size="5"><?php tips('范围为 0~100 的整数,数值越大结果图片效果越好,但尺寸也越大');?></td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>

<table class="tb">
<thead>
<th>文字水印</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">水印文字</td>
<td><input name="setting[water_text]" type="text" id="water_text" value="<?php echo $water_text;?>" size="30" style="color:<?php echo $water_fontcolor;?>;font-size:<?php echo $water_fontsize;?>px;"></td>
</tr>
<tr>
<td class="tl">中文字体</td>
<td><input name="setting[water_font]" type="text" value="<?php echo $water_font;?>" size="30"> <?php if($water_font && !is_file(XQ_ROOT."/data/".$water_font)){ ?><span class="f_red">字体不存在,请上传字体到./data/目录</span><?php } ?></td>
</tr>
<tr>
<td class="tl">文字大小</td>
<td><input name="setting[water_fontsize]" type="text" value="<?php echo $water_fontsize;?>" size="8" style="font-size:<?php echo $water_fontsize;?>px;" onblur="this.style.fontSize=this.value+'px';$('water_text').style.fontSize=this.value+'px';"> px</td>
</tr>
<tr>
<td class="tl">文字颜色</td>
<td><input name="setting[water_fontcolor]" type="text" value="<?php echo $water_fontcolor;?>" size="8" style="color:<?php echo $water_fontcolor;?>" onblur="this.style.color=this.value;$('water_text').style.color=this.value;"></td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>

<table class="tb">
<thead>
<th>图片处理</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">水印类型</td>
<td>
<input type="radio" name="setting[water_type]" value="0"  <?php if($water_type==0){ ?>checked <?php } ?> /> 禁用&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[water_type]" value="1"  <?php if($water_type==1){ ?>checked <?php } ?> /> 文字水印&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[water_type]" value="2"  <?php if($water_type==2){ ?>checked <?php } ?> /> 图片水印
</td>
</tr>

<tr>
<td class="tl">水印图片或文字边距</td>
<td><input name="setting[water_margin]" type="text" value="<?php echo $water_margin;?>" size="5"> px <?php tips('水印图片或文字在原图的边距');?>
</td>
</tr>
<tr>
<td class="tl">图片处理条件</td>
<td><input name="setting[water_min_wh]" type="text" value="<?php echo $water_min_wh;?>" size="5"> px <?php tips('图片宽度或者高度小于此值将不做水印处理');?>
</td>
</tr>
<tr>
<td class="tl">水印位置</td>
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
	<td onmouseover="this.style.backgroundColor='#E2F3FE'" onmouseout="this.style.backgroundColor='#F1F2F3'" colspan="3">随机 <input type="radio" name="setting[water_pos]" value="0" <?php if($water_pos==0){ ?>checked <?php } ?>/></td>
	</tr>
	</table>
</tr>
<tr>
<td class="tl">BMP图片转JPG格式</td>
<td>
<input type="radio" name="setting[bmp_jpg]" value="1"  <?php if($bmp_jpg==1){ ?>checked <?php } ?> /> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[bmp_jpg]" value="0"  <?php if($bmp_jpg==0){ ?>checked <?php } ?> /> 关闭
<?php tips('BMP格式图片体积较大，且不能生成缩略图，建议开启');?>
</td>
</tr>

<tr>
<td class="tl">中图加水印</td>
<td>
<input type="radio" name="setting[water_middle]" value="1"  <?php if($water_middle==1){ ?>checked <?php } ?> /> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[water_middle]" value="0"  <?php if($water_middle==0){ ?>checked <?php } ?> /> 关闭
</td>
</tr>
<tr>
<td class="tl">中图缩略大小</td>
<td><input name="setting[middle_w]" type="text" value="<?php echo $middle_w;?>" size="3"/> X <input name="setting[middle_h]" type="text" value="<?php echo $middle_h;?>" size="3"/> px
</td>
</tr>
<tr>
<td class="tl">图片缩略模式</td>
<td>
<input type="radio" name="setting[thumb_album]" value="0"  <?php if($thumb_album==0){ ?>checked <?php } ?> /> 裁剪&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[thumb_album]" value="1"  <?php if($thumb_album==1){ ?>checked <?php } ?> /> 压缩
<?php tips('裁剪模式，图片显示清晰，缩略图可能会被裁多余部分<br/>压缩模式，图片显示完整，缩略图可能会留白边');?>
</td>
</tr>
<tr>
<td class="tl">标题图片缩略模式</td>
<td>
<input type="radio" name="setting[thumb_title]" value="0"  <?php if($thumb_title==0){ ?>checked <?php } ?> /> 裁剪&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[thumb_title]" value="1"  <?php if($thumb_title==1){ ?>checked <?php } ?> /> 压缩
</td>
</tr>
<tr>
<td class="tl">图片文件最大宽度</td>
<td><input name="setting[max_image]" type="text" value="<?php echo $max_image;?>" size="5"/> px
<?php tips('由于显示器宽度有限，超过此宽度的图片将被等比调整为此宽度以节省存储空间');?>
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
<th>计数器设置</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">是否开启计数器</td>
<td><input type="radio" name="setting[iscount]" value="1" <?php if($iscount){echo "checked";}?> /> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[iscount]"  value="0" <?php if(!$iscount){echo "checked";}?>/> 关闭</td>
</tr>
<tr>
<td class="tl">计数器初始值</td>
<td>  <input type="text" size="10" name="setting[countval]" value="<?php echo $countval; ?>" />&nbsp;当前值：<font color="red"><?php echo $webcount;?><input  type="hidden" name="setting[webcount]" value="<?php echo $webcount;?>" /></font></td>
</tr>
<tr>
<td class="tl">计数器左边文字</td>
<td><input type="text" name="setting[countl]" value="<?php echo $countl;?>" /></td>
</tr>
<tr>
<td class="tl">计数器风格</td>
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
<td class="tl">计数器右边文字</td>
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
<th>服务器优化</th>
</thead>
<tbody>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">首页自动更新时间</td>
<td>
<input name="setting[task_index]" type="text" value="<?php echo $task_index;?>" size="5"/> 秒 <?php tips('仅对生成的静态网页有效');?>
</td>
</tr>
<tr>
<td class="tl">列表页自动更新时间</td>
<td>
<input name="setting[task_list]" type="text" value="<?php echo $task_list;?>" size="5"/> 秒 <?php tips('仅对生成的静态网页有效');?>
</td>
</tr>
<tr>
<td class="tl">内容页自动更新时间</td>
<td>
<input name="setting[task_item]" type="text" value="<?php echo $task_item;?>" size="5"/> 秒 <?php tips('仅对生成的静态网页有效');?>
</td>
</tr>
<tr>
<td class="tl">网站首页使用相对地址</td>
<td>
<input type="radio" name="setting[index_rela]" value="1"  <?php if($index_rela){ ?>checked <?php } ?>/> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[index_rela]" value="0"  <?php if(!$index_rela){ ?>checked <?php } ?>/> 关闭 <?php tips('此项仅在网站首页生成html时有效<br/>网站首页不需要使用绝对地址，开启此项可节省10Kb以上的网页体积');?>
</td>
</tr>
<tr>
<td class="tl">模板缓存自动更新</td>
<td>
<input type="radio" name="config[template_refresh]" value="1" <?php if($template_refresh){ ?>checked <?php } ?>/> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="config[template_refresh]" value="0" <?php if(!$template_refresh){ ?>checked <?php } ?>/> 关闭 <?php tips('如果网站模板无需修改，建议您关闭此功能');?></td>
</tr>
<tr title="将页面内容以gzip压缩后传输，可以加快传输速度，需PHP 4.0.4以上且支持Zlib模块才能使用">
<td class="tl">页面Gzip压缩</td>
<td>
<input type="radio" name="setting[gzip_enable]" value="1" <?php if($gzip_enable){ ?>checked <?php } ?>/> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[gzip_enable]" value="0" <?php if(!$gzip_enable){ ?>checked <?php } ?>/> 关闭 <?php tips(function_exists('ob_gzhandler') ? '当前服务器支持Gzip，建议开启' : '当前服务器不支持Gzip，请关闭');?>
</td>
</tr>
<tr>
<td class="tl">分页显示方式</td>
<td>
<input type="radio" name="setting[pages_mode]" value="0" <?php if(!$pages_mode){ ?>checked <?php } ?>/> 默认&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[pages_mode]" value="1" <?php if($pages_mode){ ?>checked <?php } ?>/> 简洁
</td>
</tr>
<tr>
<td class="tl">列表每页默认信息条数</td>
<td><input name="setting[pagesize]" type="text" value="<?php echo $pagesize;?>" size="3"/> 条</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="sbt">
<input type="submit" name="submit" value="确 定" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="展 开" id="ShowAll" class="btn" title="展开/收缩所有"/>
</div>
</form>
</body>
</html>