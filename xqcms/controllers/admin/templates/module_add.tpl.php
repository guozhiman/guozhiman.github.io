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
<th colspan="10">���ģ�顾<font color="red">ע�⣺��Ѱ�ֻ��������������ܸ���ϵͳ����ģ��</font>��</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">ģ������</td>
<td><input type="radio" name="post[islink]" value="1"  checked/> �ⲿ����</td>
</tr>
<tr>
<td class="tl">ģ������ <span class="f_red">*</span></td>
<td><input name="post[name]" type="text" id="name" size="10" /> <span id="dname" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">�����˵�����</td>
<td><input name="post[menuname]" type="text" id="menuname" size="10"/> <?php echo color('post[color]');?>  </td>
</tr>
<tr>
<td class="tl">�����˵�</td>
<td><input type="radio" name="post[ismenu]" value="1" checked/> ��&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="post[ismenu]" value="0" /> ��</td>
</tr>
<tr>
<td class="tl">�´��ڴ�</td>
<td><input type="radio" name="post[isblank]" value="1"/> ��&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="post[isblank]" value="0" checked /> ��</td>
</tr>
<tr>
<td class="tl">���ӵ�ַ <span class="f_red">*</span></td>
<td><input name="post[url]" type="text" id="url" size="40" /> <span id="durl" class="f_red"></span></td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value="ȷ ��" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="�� ��" class="btn"></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'name';
	l = $("#"+f).val();
	if(l == '') {
		Dmsg('����дģ������', f);
		return false;
	}
	f = 'url';
	l = $("#"+f).val().length;
	if(l < 2) {
		Dmsg('����д���ӵ�ַ', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(0);</script>
</body>
</html>