<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="add"/>
<table class="tb">
<thead>
<th colspan="10">添加模块【<font color="red">注意：免费版只能添加外链，不能复制系统内置模块</font>】</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">模块类型</td>
<td><input type="radio" name="post[islink]" value="1"  checked/> 外部链接</td>
</tr>
<tr>
<td class="tl">模块名称 <span class="f_red">*</span></td>
<td><input name="post[name]" type="text" id="name" size="10" /> <span id="dname" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">导航菜单名称</td>
<td><input name="post[menuname]" type="text" id="menuname" size="10"/> <?php echo color('post[color]');?>  </td>
</tr>
<tr>
<td class="tl">导航菜单</td>
<td><input type="radio" name="post[ismenu]" value="1" checked/> 是&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="post[ismenu]" value="0" /> 否</td>
</tr>
<tr>
<td class="tl">新窗口打开</td>
<td><input type="radio" name="post[isblank]" value="1"/> 是&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="post[isblank]" value="0" checked /> 否</td>
</tr>
<tr>
<td class="tl">链接地址 <span class="f_red">*</span></td>
<td><input name="post[url]" type="text" id="url" size="40" /> <span id="durl" class="f_red"></span></td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value="确 定" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重 置" class="btn"></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'name';
	l = $("#"+f).val();
	if(l == '') {
		Dmsg('请填写模块名称', f);
		return false;
	}
	f = 'url';
	l = $("#"+f).val().length;
	if(l < 2) {
		Dmsg('请填写链接地址', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(0);</script>
</body>
</html>