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
<th colspan="2">��ӹ���Ա</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">�û��� <span class="f_red">*</span></td>
<td><input type="text" size="20" name="users[username]" id="username" />&nbsp;<span id="dusername" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��¼���� <span class="f_red">*</span></td>
<td><input type="password" size="20" name="users[password]" id="password" />&nbsp;<span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">�ظ��������� <span class="f_red">*</span></td>
<td><input type="password" size="20" name="users[cpassword]" id="cpassword"/>&nbsp;<span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">����Ա��� <span class="f_red">*</span></td>
<td>
<div class="b10">&nbsp;</div>
<input type="radio" name="admin" value="1" id="admin_1" onclick="Dh('ro');" checked/><label for="admin_1"> ��������Ա</label> <span class="f_gray">ӵ�г���ʼ����Ȩ�������Ȩ��</span>
<div class="b10">&nbsp;</div>
<input type="radio" name="admin" value="2" id="admin_2" onclick="Ds('ro');"/><label for="admin_2"> ��ͨ����Ա</label> <span class="f_gray">ӵ��ϵͳ�����Ȩ��</span>
<div class="b10">&nbsp;</div>
<style type="text/css">
#ro {padding:5px 10px 10px 10px;border-top:#FFFFFF 1px solid;}
#ro div {width:25%;float:left;height:30px;}
#ro p {margin:2px;color:#FF6600;}
</style>
<div id="ro" style="display:none;">
<p>�����ѡ��һ�������ɫ(�Ǳ�ѡ)</p>
<?php 
foreach($MODULE as $m) {
	if($m['moduleid'] == 1 || $m['moduleid'] == 3 || $m['islink']) continue;
?>
<div><input type="checkbox" name="roles[<?php echo $m['moduleid'];?>]" value="1" id="ro_<?php echo $m['moduleid'];?>"/><label for="ro_<?php echo $m['moduleid'];?>"> <?php echo $m['name'];?>ģ�����Ա</label></div>
<?php } ?>
</div>
</td>
</tr>
<tr>
<td class="tl">��ɫ����</td>
<td><input type="text" size="20" name="role" id="role"/> <span class="f_gray">����Ϊ�ù���Ա�ı�ע</span></td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value="��һ��" class="btn"></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'username';
	l = $("#"+f).val();
	if(l == '') {
		Dmsg('����д��Ա��', f);
		return false;
	}
	if($('#password').val() == '') {
		Dmsg('����д��Ա��¼����', 'password');
		return false;
	}
	if($('#cpassword').val() == '') {
		Dmsg('���ظ���������', 'cpassword');
		return false;
	}
	if($('#password').val() != $('#cpassword').val()) {
		Dmsg('������������벻һ��', 'password');
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(0);</script>
</body>
</html>