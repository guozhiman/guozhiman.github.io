<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table class="tb">
<thead>
<th colspan="10">��������</th>
</thead>
<tr>
<td>
&nbsp;<?php echo $type_select;?>&nbsp;
<input type="text" size="30" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<select name="type">
<option value="0"<?php if($type == 0) echo ' selected';?>>����</option>
<option value="1"<?php if($type == 1) echo ' selected';?>>����</option>
<option value="2"<?php if($type == 2) echo ' selected';?>>LOGO</option>
</select>
&nbsp;
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>';"/>
</td>
</tr>
</table>
</form>
<form method="post">
<table class="tb">
<thead>
<th colspan="10">�������</th>
</thead>
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>����</th>
<th>��վ����</th>
<th>��վLOGO</th>
<th>��������</th>
<th>����ʱ��</th>
<th width="50">����</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center" title="��վ����:<?php echo $v['introduce'];?>">
<td><input type="checkbox" name="id[]" value="<?php echo $v['id'];?>"/></td>
<td><a href="<?php echo $v['typeurl'];?>" target="_blank"><?php echo $v['name'];?></a></td>
<td><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['title'];?></a></td>
<td><?php if($v['thumb']) {?><img src="<?php echo $v['thumb'];?>" width="88" height="31"/><?php } ?></td>
<td><?php echo $v['thumb'] ? 'LOGO' : '����';?></td>
<td><?php echo $v['adddate'];?></td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&id=<?php echo $v['id'];?>"><img src="data/style/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&id=<?php echo $v['id'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
<div class="btns">
<input type="submit" value=" ͨ����� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=check';"/>&nbsp;
<input type="submit" value=" ɾ �� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�������𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">posmenu(2);</script>
</body>
</html>