<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="userid" value="<?php echo $userid;?>"/>
<table class="tb">
<thead>
<th colspan="2">修改密码</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">新登录密码 <span class="f_red">*</span></td>
<td><input type="password" name="password" size="30" id="password"/> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">重复新密码 <span class="f_red">*</span></td>
<td><input type="password" name="cpassword" size="30" id="cpassword"/> <span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> </td>
<td><input type="submit" name="submit" value="修 改" class="btn"/></td>
</tr>
</table>
</td>
</tr>
</table>
</form>
</table>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'password';
	l = $("#"+f).val().length;
	if(l < 6) {
		Dmsg('新登录密码最少6位，当前已输入'+l+'位', f);
		return false;
	}
	f = 'cpassword';
	l = $("#"+f).val();
	if(l != $('#password').val()) {
		Dmsg('重复新密码与新登录密码不一致', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>