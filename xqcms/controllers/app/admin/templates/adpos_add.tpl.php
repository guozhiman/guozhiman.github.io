<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table class="tb">
<thead>
<th colspan="2">添加广告位</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">广告位名称 <span class="f_red">*</span></td>
<td><input name="place[name]" id="name" type="text" size="30" />  <span id="dname" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">广告位类型 <span class="f_red">*</span></td>
<td>
<?php foreach($TYPE as $k=>$v) {
	if($k) echo '<input name="place[typeid]" type="radio" value="'.$k.'" '.($k == 1 ? 'checked' : '').' id="p'.$k.'" onclick="sh('.$k.');"/> <label for="p'.$k.'">'.$v.'&nbsp;</label>';
}
?>
</td>
</tr>
<tr id="wh" style="display:none">
<td class="tl">广告位大小 <span class="f_red">*</span></td>
<td class="f_gray"><input name="place[width]" id="width" type="text" size="5" /> X <input name="place[height]" id="height" type="text" size="5" /> [宽 X 高 px] <span id="dsize" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">是否显示</td>
<td>
<input type="radio" name="place[open]" value="1" checked/> 是&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="place[open]" value="0"/> 否
</td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" 重 置 " class="btn"/></div>
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
		Dmsg('请填写广告位名称', f);
		return false;
	}
	if($('#p3').attr("checked") || $('#p4').attr("checked") || $('#p5').attr("checked")) {
		if($('#width').val().length < 2 || $('#height').val().length < 2) {
			Dmsg('请填写广告位大小', 'size');
			return false;
		}
	}
}	
</script>
<script type="text/javascript">posmenu(0);</script>
</body>
</html>