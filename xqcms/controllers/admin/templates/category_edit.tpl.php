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
<th colspan="10">�����޸�</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">�ϼ�����</td>
<td><?php echo category_select('category[parentid]', '��ѡ��', $parentid, $mid);?><?php tips('�����ѡ����Ϊ��������');?></td>
</tr>
<tr>
<td class="tl">�������� <span class="f_red">*</span></td>
<td><input name="category[catname]" type="text" id="catname" size="20" value="<?php echo $catname;?>"/> <?php echo color('category[color]', $color);?> <span id="dcatname" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��ʾ</td>
<td><input name="category[ismenu]" type="text" size="2" value="<?php echo $ismenu;?>"/><?php tips('0 - ����ʾ 1 - ��ʾ ');?></td>
</tr>
</table>

<div class="sbt"><input type="submit" name="submit" value="ȷ ��" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="�� ��" class="btn"/></div>
</form>
<script type="text/javascript">
function check() {
	if($('#catname').val() == '') {
		Dmsg('����д��������', 'catname');
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>