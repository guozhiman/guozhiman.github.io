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
<input type="hidden" name="pid" value="<?php echo $pid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table class="tb">
<thead>
<th colspan="2">�޸Ĺ��λ</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">���λID</td>
<td><?php echo $pid;?>
</td>
</tr>
<tr>
<td class="tl">���λ���� <span class="f_red">*</span></td>
<td><input name="place[name]" id="name" type="text" size="30" value="<?php echo $name;?>"/>  <span id="dname" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���λ���� <span class="f_red">*</span></td>
<td>
<?php foreach($TYPE as $k=>$v) {
	if($k) echo '<input name="place[typeid]" type="radio" value="'.$k.'" '.($k == $typeid ? 'checked' : '').' id="p'.$k.'" onclick="sh('.$k.');"/> <label for="p'.$k.'">'.$v.'&nbsp;</label>';
}
?>
<br/><span class="f_gray"> �޸��˹��λ���ͣ������޸Ĵ˹��λ�����й��</span>
</td>
</tr>
<tr id="wh" style="display:<?php echo $typeid == 3 || $typeid == 4 || $typeid == 5 ? '' : 'none';?>">
<td class="tl">���λ��С <span class="f_red">*</span></td>
<td><input name="place[width]" id="width" type="text" size="5" value="<?php echo $width;?>"/> X <input name="place[height]" id="height" type="text" size="5" value="<?php echo $height;?>"/> <span class="f_gray">[�� X �� px]</span> <span id="dsize" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">�Ƿ���ʾ</td>
<td>
<input type="radio" name="place[open]" value="1" <?php if($open) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="place[open]" value="0" <?php if(!$open) echo 'checked';?>/> ��
</td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<script type="text/javascript">
function sh(id) {
    if(id == 3 || id == 4 || id == 5) {
		Ds('wh');
	} else {
		Dh('wh');
	}
}
function check() {
	var l;
	var f;
	f = 'name';
	l = $("#"+f).val().length;
	if(l < 1) {
		Dmsg('����д���λ����', f);
		return false;
	}
	if($('#p3').attr("checked") || $('#p4').attr("checked") || $('#p5').attr("checked")) {
		if($('#width').val().length < 2 || $('#height').val().length < 2) {
			Dmsg('����д���λ��С', 'size');
			return false;
		}
	}
}
</script>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>