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
<th colspan="2">�޸�����</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">�µ�¼���� <span class="f_red">*</span></td>
<td><input type="password" name="password" size="30" id="password"/> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">�ظ������� <span class="f_red">*</span></td>
<td><input type="password" name="cpassword" size="30" id="cpassword"/> <span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> </td>
<td><input type="submit" name="submit" value="�� ��" class="btn"/></td>
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
		Dmsg('�µ�¼��������6λ����ǰ������'+l+'λ', f);
		return false;
	}
	f = 'cpassword';
	l = $("#"+f).val();
	if(l != $('#password').val()) {
		Dmsg('�ظ����������µ�¼���벻һ��', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>