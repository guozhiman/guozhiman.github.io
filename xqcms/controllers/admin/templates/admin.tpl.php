<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<table class="tb">
<thead>
<th colspan="10">����Ա����</th>
</thead>
<tr>
<td>&nbsp;
<?php echo $fields_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<select name="type">
<option value="0">����Ա����</option>
<option value="1"<?php echo $type == 1 ? ' selected' : '';?>>��������Ա</option>
<option value="2"<?php echo $type == 2 ? ' selected' : '';?>>��ͨ����Ա</option>
</select>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c"/> ��/ҳ
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="window.location='?file=<?php echo $file;?>';"/>
</td>
</tr>
</table>
</form>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="add"/>
<table class="tb">
<thead>
<th colspan="10">����Ա����</th>
</thead>
<tr>
<th>�û���</th>
<th>������</th>
<th>�����ɫ</th>
<th>�ϴε�¼ʱ��</th>
<th>��¼IP</th>
<th>��¼����</th>
<th width="150">����</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><?php echo $v['username'];?></td>
<td><a href="javascript:Dconfirm('ȷ��Ҫ�ı�˹���Ա��������', '?file=<?php echo $file;?>&action=move&username=<?php echo $v['username'];?>');"><?php echo $v['adminname'];?></a></td>
<td><input type="text" style="width:120px;" value="<?php echo $v['role'];?>" onblur="role_name('<?php echo $v['userid'];?>', this.value);"/></td>
<td class="px11"><?php echo $v['lasttime'];?></td>
<td class="px11"><?php echo $v['lastip'];?></td>
<td><?php echo $v['logins'];?></td>
<td>
<a href="?file=<?php echo $file;?>&action=right&userid=<?php echo $v['userid'];?>" title="����Ȩ�� / �������">����Ȩ��</a> |
<a href="?file=<?php echo $file;?>&action=password&userid=<?php echo $v['userid'];?>">�޸�����</a>  | 
<a href="?file=<?php echo $file;?>&action=delete&username=<?php echo $v['username'];?>" onclick="return _delete();" title="ɾ������Ա">ɾ��</a>
</td>
</tr>
<?php }?>
</table>
<div class="btns">��ʾ�������������Ըı����Ա�Ĺ����� </div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">
function role_name(userid, name) {
	$.post("?",{file:"<?php echo $file;?>",action:"role",userid:userid,name:name},showmsg('��ɫ���Ƹ��³ɹ���'));
}
</script>
<script type="text/javascript">posmenu(1);</script>
<br/>
</body>
</html>