<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form action="?" method="post">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="order"/>

<table class="tb">
<thead>
<th colspan="9">���ڿ�����ģ��</th>
</thead>
<tbody>
<tr>
<th width="50">����</th>
<th width="50">ID</th>
<th>����</th>
<th width="100">�˵�����</th>
<th width="70">����</th>
<th width="70">������ʾ</th>
<th width="70">ģ��</th>
<th width="100">��װ����</th>
<th width="120">����</th>
</tr>
<?php foreach($modules as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><input type="text" size="2" name="listorder[<?php echo $v['moduleid'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><?php echo $v['moduleid'];?></td>
<td><?php echo $v['name'];?></td>
<td><a href="<?php echo $v['url'];?>" target="_blank"><?php echo set_style($v['menuname'], $v['color']);?></a></td>
<td><?php echo $v['islink'] ? '<span class="f_red">����</span>' : '����';?></td>
<td><?php echo $v['ismenu'] ? '��' : '<span class="f_red">��</span>';?></td>
<td title="<?php echo $v['module'];?>"><?php echo $v['modulename'];?></td>
<td><?php echo $v['setuptime'];?></td>
<td><a href="?file=<?php echo $file;?>&action=edit&modid=<?php echo $v['moduleid'];?>"><img src="data/style/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;&nbsp;<a href="?file=<?php echo $file;?>&action=delete&modid=<?php echo $v['moduleid'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>&nbsp;&nbsp;
<a href="javascript:Dconfirm('ȷ��Ҫ�ر�[<?php echo $v['name'];?>]ģ����?', '?file=<?php echo $file;?>&action=disable&value=1&modid=<?php echo $v['moduleid'];?>');">���رա�</a>
</td>

</tr>
<?php }?>
</tbody>
</table>
<?php if($_modules) { ?>
<table class="tb">
<thead>
<th colspan="9"><font class="f_red">�Ѿ��رյ�ģ��</font></th>
</thead>
<tr>
<th width="50">����</th>
<th width="50">ID</th>
<th>����</th>
<th width="100">�˵�����</th>
<th width="70">����</th>
<th width="70">����</th>
<th width="120">ģ��</th>
<th width="100">��װ����</th>
<th width="120">����</th>
</tr>
<?php foreach($_modules as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><input type="text" size="2" name="listorder[<?php echo $v['moduleid'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><?php echo $v['moduleid'];?></td>
<td><?php echo set_style($v['name'], $v['color']);?></td>
<td><a href="<?php echo $v['url'];?>" target="_blank"><?php echo set_style($v['menuname'], $v['color']);?></a></td>
<td><?php echo $v['islink'] ? '<span class="f_red">����</span>' : '����';?></td>
<td><?php echo $v['ismenu'] ? '��' : '<span class="f_red">��</span>';?></td>
<td title="<?php echo $v['module'];?>"><?php echo $v['modulename'];?></td>
<td><?php echo $v['setuptime'];?></td>
<td><a href="?file=<?php echo $file;?>&action=edit&modid=<?php echo $v['moduleid'];?>"><img src="data/style/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;&nbsp;<a href="?file=<?php echo $file;?>&action=delete&modid=<?php echo $v['moduleid'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>&nbsp;&nbsp;
<a href="?file=<?php echo $file;?>&action=disable&value=0&modid=<?php echo $v['moduleid'];?>">��������</a>
</td>

</tr>
<?php }?>
</table>
<?php } ?>
<div class="btns">
<input type="submit" value=" �������� " class="btn"/>&nbsp;
</div>
</form>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>