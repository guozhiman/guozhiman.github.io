<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" id="runcode_form" target="_blank">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="runcode"/>
<input type="hidden" name="codes" value=""/>
</form>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="aid" value="<?php echo $aid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="pid" value="<?php echo $p['pid'];?>"/>
<input type="hidden" name="ad[typeid]" value="<?php echo $p['typeid'];?>"/>
<table class="tb">
<thead>
<th colspan="2">�޸Ĺ��</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">���λ</td>
<td class="f_b">&nbsp;<?php echo $p['name'];?></td>
</tr>
<tr>
<td class="tl">�������</td>
<td class="f_gray">&nbsp;<?php echo $TYPE[$p['typeid']];?></td>
</tr>
<tr>
<td class="tl">������� <span class="f_red">*</span></td>
<td><input name="ad[title]" id="title" type="text" size="30" value="<?php echo $title;?>"/> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">������</td>
<td><input name="ad[introduce]" type="text" size="60" value="<?php echo $introduce;?>"/></td>
</tr>
<?php if($p['typeid'] == 1) { ?>
<tr>
<td class="tl">������ <span class="f_red">*</span></td>
<td><textarea name="ad[code]" id="code" style="width:98%;height:150px;overflow:visible;font-family:Fixedsys,verdana;"><?php echo $code;?></textarea><br/>
<input type="button" value=" ���д��� " class="btn" onclick="runcode();"/> <span id="dcode" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">�ϴ��ļ�</td>
<td class="f_gray"><input type="text" size="60" id="upload"/>&nbsp;&nbsp;<span onclick="Dfile(<?php echo $moduleid;?>, $('#upload').val(), 'upload');" class="jt">�ϴ�</span>&nbsp;&nbsp;<span onclick="if($('#upload').val()) window.open($('#upload').val());" class="jt">Ԥ��</span>&nbsp;&nbsp;<span onclick="$('#upload').val('');" class="jt">ɾ��</span><?php tips('�������ϴ��ļ��󣬰ѵ�ַ���Ƶ������Ｔ��ʹ��');?></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 2) { ?>
<tr>
<td class="tl">�������� <span class="f_red">*</span></td>
<td class="f_gray"><input type="text" size="60" name="ad[text_name]" id="text_name" value="<?php echo $text_name;?>"/> [֧��HTML�﷨] <span id="dtext_name" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���ӵ�ַ <span class="f_red">*</span></td>
<td><input type="text" size="60" name="ad[text_url]" id="text_url" value="<?php echo $text_url;?>"/> <span id="dtext_url" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">Title��ʾ</td>
<td><input type="text" size="60" name="ad[text_title]" value="<?php echo $text_title;?>"/></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 3 || $p['typeid'] == 5) { ?>
<tr>
<td class="tl">ͼƬ��ַ <span class="f_red">*</span></td>
<td class="f_gray"><input type="text" size="60" name="ad[image_src]" id="thumb" value="<?php echo $image_src;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,<?php echo $p['width'];?>,<?php echo $p['height'];?>, $('#thumb').val());" class="jt">�ϴ�</span>&nbsp;&nbsp;<span onclick="_preview($('#thumb').val());" class="jt">Ԥ��</span>&nbsp;&nbsp;<span onclick="$('#thumb').val('');" class="jt">ɾ��</span> <span id="dthumb" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���ӵ�ַ</td>
<td><input type="text" size="60" name="ad[image_url]" value="<?php echo $image_url;?>" id="image_url"/> <span id="dimage_url" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">����</td>
<td><input type="text" size="60" name="ad[image_alt]" value="<?php echo $image_alt;?>"/></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 4) { ?>
<tr>
<td class="tl">Flash��ַ <span class="f_red">*</span></td>
<td class="f_gray"><input type="text" size="60" name="ad[flash_src]" id="flash" value="<?php echo $flash_src;?>"/>&nbsp;&nbsp;<span onclick="Dfile(<?php echo $moduleid;?>, $('#flash').val(), 'flash');" class="jt">�ϴ�</span>&nbsp;&nbsp;<span onclick="if($('#flash').val()) window.open($('#flash').val());" class="jt">Ԥ��</span>&nbsp;&nbsp;<span onclick="$('#flash').val('');" class="jt">ɾ��</span> <span id="dflash" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���ӵ�ַ</td>
<td><input type="text" size="60" name="ad[flash_url]" value="<?php echo $flash_url;?>"/></td>
</tr>
<?php } ?>
<tr>
<td class="tl">���״̬</td>
<td>
<input type="radio" name="ad[status]" value="3" <?php if($status==3) echo 'checked';?>/> ��ͨ��
<input type="radio" name="ad[status]" value="2" <?php if($status==2) echo 'checked';?>/> �����
</td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	var t = <?php echo $p['typeid'];?>;
	f = 'title';
	l = $("#"+f).val().length;
	if(l < 1) {
		Dmsg('����д�������', f);
		return false;
	}

	if(t == 1) {
		f = 'code';
		l = $("#"+f).val().length;
		if(l < 5) {
			Dmsg('����д������', f);
			return false;
		}
	} else if(t == 2) {
		f = 'text_name';
		l = $("#"+f).val().length;
		if(l < 2) {
			Dmsg('����д��������', f);
			return false;
		}
		f = 'text_url';
		l = $("#"+f).val().length;
		if(l < 12) {
			Dmsg('����д���ӵ�ַ', f);
			return false;
		}
	} else if(t == 3 || t == 5) {
		f = 'thumb';
		l = $("#"+f).val().length;
		if(l < 2) {
			Dmsg('����дͼƬ��ַ', f);
			return false;
		}
		if(t == 5 && ext($("#"+f).val()) != 'jpg') {
			Dmsg('��֧��JPG��ʽͼƬ', f);
			return false;
		}
	} else if(t == 4) {
		f = 'flash';
		l = $("#"+f).val().length;
		if(l < 5) {
			Dmsg('����дFlash��ַ', f);
			return false;
		}
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(<?php echo $status == 2 ? 3 : 2;?>);</script>
</body>
</html>