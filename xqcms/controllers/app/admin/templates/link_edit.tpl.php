<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<table class="tb">
<thead>
<th colspan="2"><?php echo $action == 'add' ? '���' : '�޸�';?>����</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">��վ���� <span class="f_red">*</span></td>
<td><?php echo type_select('link', 1, 'post[tid]', '��ѡ�����', $tid, 'id="tid"');?> <span id="dtid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��վ���� <span class="f_red">*</span></td>
<td><input name="post[title]" type="text" id="title" size="40" value="<?php echo $title;?>"/>  <?php echo color('post[color]', $color);?> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��վ��ַ <span class="f_red">*</span></td>
<td><input name="post[url]" type="text" id="url" size="40" value="<?php echo $url;?>"/> <span id="durl" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��վLOGO</td>
<td><input name="post[thumb]" type="text" id="thumb" size="40" value="<?php echo $thumb;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,88,31, $('#thumb').val());" class="jt">�ϴ�</span>&nbsp;&nbsp;<span onclick="_preview($('#thumb').val());" class="jt">Ԥ��</span>&nbsp;&nbsp;<span onclick="$('#thumb').val('');" class="jt">ɾ��</span></td>
</tr>
<tr>
<td class="tl">��վ����</td>
<td><textarea name="post[introduce]" style="width:400px;height:40px;"><?php echo $introduce;?></textarea>
</td>
</tr>
<tr>
<td class="tl">����״̬</td>
<td>
<input type="radio" name="post[status]" value="3" <?php if($status==3) echo 'checked';?>/> ͨ��
<input type="radio" name="post[status]" value="2" <?php if($status==2) echo 'checked';?>/> ����
</td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'tid';
	l = $("#"+f).val();
	if(l == 0) {
		Dmsg('��ѡ�����', f);
		return false;
	}
	f = 'title';
	l = $("#"+f).val().length;
	if(l < 2) {
		Dmsg('��������վ����', f);
		return false;
	}
	f = 'url';
	l = $("#"+f).val().length;
	if(l < 12) {
		Dmsg('��������վ��ַ', f);
		return false;
	}
}
</script>
<script type="text/javascript">posmenu(0);</script>
</body>
</html>