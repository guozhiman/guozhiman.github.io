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
<th colspan="2">添加管理员</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">用户名 <span class="f_red">*</span></td>
<td><input type="text" size="20" name="users[username]" id="username" />&nbsp;<span id="dusername" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">登录密码 <span class="f_red">*</span></td>
<td><input type="password" size="20" name="users[password]" id="password" />&nbsp;<span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">重复输入密码 <span class="f_red">*</span></td>
<td><input type="password" size="20" name="users[cpassword]" id="cpassword"/>&nbsp;<span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">管理员类别 <span class="f_red">*</span></td>
<td>
<div class="b10">&nbsp;</div>
<input type="radio" name="admin" value="1" id="admin_1" onclick="Dh('ro');" checked/><label for="admin_1"> 超级管理员</label> <span class="f_gray">拥有除创始人特权外的所有权限</span>
<div class="b10">&nbsp;</div>
<input type="radio" name="admin" value="2" id="admin_2" onclick="Ds('ro');"/><label for="admin_2"> 普通管理员</label> <span class="f_gray">拥有系统分配的权限</span>
<div class="b10">&nbsp;</div>
<style type="text/css">
#ro {padding:5px 10px 10px 10px;border-top:#FFFFFF 1px solid;}
#ro div {width:25%;float:left;height:30px;}
#ro p {margin:2px;color:#FF6600;}
</style>
<div id="ro" style="display:none;">
<p>↓快捷选择一个管理角色(非必选)</p>
<?php 
foreach($MODULE as $m) {
	if($m['moduleid'] == 1 || $m['moduleid'] == 3 || $m['islink']) continue;
?>
<div><input type="checkbox" name="roles[<?php echo $m['moduleid'];?>]" value="1" id="ro_<?php echo $m['moduleid'];?>"/><label for="ro_<?php echo $m['moduleid'];?>"> <?php echo $m['name'];?>模块管理员</label></div>
<?php } ?>
</div>
</td>
</tr>
<tr>
<td class="tl">角色名称</td>
<td><input type="text" size="20" name="role" id="role"/> <span class="f_gray">可以为该管理员的备注</span></td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value="下一步" class="btn"></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'username';
	l = $("#"+f).val();
	if(l == '') {
		Dmsg('请填写会员名', f);
		return false;
	}
	if($('#password').val() == '') {
		Dmsg('请填写会员登录密码', 'password');
		return false;
	}
	if($('#cpassword').val() == '') {
		Dmsg('请重复输入密码', 'cpassword');
		return false;
	}
	if($('#password').val() != $('#cpassword').val()) {
		Dmsg('两次输入的密码不一致', 'password');
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(0);</script>
</body>
</html>