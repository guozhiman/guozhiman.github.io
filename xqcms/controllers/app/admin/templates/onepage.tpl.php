<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post">
<input type="hidden" name="cid" value="<?php echo $cid;?>"/>
<table class="tb">
<thead>
<th colspan="9">����ҳ</th>
</thead>
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th width="25">ID</th>
<th width="50">����</th>
<th>�� ��</th>
<th>�� ַ</th>
<th>�������</th>
<th width="40">��ʾ</th>
<th width="120">����ʱ��</th>
<th width="50">����</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="id[]" value="<?php echo $v['id'];?>"/></td>
<td><?php echo $v['id'];?></td>
<td><input type="text" size="2" name="listorder[<?php echo $v['id'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td align="left">&nbsp;<a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['title'];?></a></td>
<td align="left">&nbsp;<a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['url'];?></a></td>
<td class="px11"><?php echo $v['hits'];?></td>
<td><?php echo $v['status'] == 3 ? '��' : '<span class="f_red">��</span>';?></td>
<td class="px11"><?php echo $v['editdate'];?></td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&id=<?php echo $v['id'];?>"><img src="data/style/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&id=<?php echo $v['id'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
<div class="btns">
<input type="submit" value=" �������� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=order';"/>&nbsp;
<input type="submit" value=" ɾ �� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�е�ҳ�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>