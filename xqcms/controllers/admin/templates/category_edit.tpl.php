<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="catid" value="<?php echo $catid;?>"/>
<table class="tb">
<thead>
<th colspan="10">分类修改</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">上级分类</td>
<td><?php echo category_select('category[parentid]', '请选择', $parentid, $mid);?><?php tips('如果不选择，则为顶级分类');?></td>
</tr>
<tr>
<td class="tl">分类名称 <span class="f_red">*</span></td>
<td><input name="category[catname]" type="text" id="catname" size="20" value="<?php echo $catname;?>"/> <?php echo color('category[color]', $color);?> <span id="dcatname" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">显示</td>
<td><input name="category[ismenu]" type="text" size="2" value="<?php echo $ismenu;?>"/><?php tips('0 - 不显示 1 - 显示 ');?></td>
</tr>
</table>

<div class="sbt"><input type="submit" name="submit" value="确 定" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重 置" class="btn"/></div>
</form>
<script type="text/javascript">
function check() {
	if($('#catname').val() == '') {
		Dmsg('请填写分类名称', 'catname');
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>