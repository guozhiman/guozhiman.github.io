<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<table class="tb">
<thead>
<th colspan="8">���λ����</th>
</thead>
<tr>
<td>
&nbsp;<?php echo $type_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>
&nbsp;

<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2"/> ��/ҳ
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>';"/>
</td>
</tr>
</table>
</form>
<form method="post">
<table class="tb">
<thead>
<th colspan="10">������λ</th>
</thead>
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>ID</th>
<th>�������</th>
<th>���λ����</th>
<th>���(px)</th>
<th>��ʾ</th>
<th>���</th>
<th>���ô���</th>
<th>����</th>
</tr>
<?php foreach($adpos as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center" name="����ʱ��:<?php echo $v['editdate'];?>">
<td><input type="checkbox" name="pids[]" value="<?php echo $v['pid'];?>"/></td>
<td><?php echo $v['pid'];?></td>
<td><?php echo $v['typename'];?></td>
<td align="left" title="���ʱ��:<?php echo $v['adddate'];?>&#10;�޸�ʱ��:<?php echo $v['editdate'];?>"><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&pid=<?php echo $v['pid'];?>"><?php echo $v['name'];?></td>
<td><?php echo $v['width'];?> x <?php echo $v['height'];?></td>
<td><?php echo $v['open'] ? '��ʾ' : '<span class="f_blue">����</span>';?></td>
<td><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&pid=<?php echo $v['pid'];?>"><?php echo $v['ads'];?></a></td>
<td><input type="text" size="12" <?php if($v['typeid'] == 6 || $v['typeid'] == 7) { ?>value="{ad($moduleid,$catid,$kw,<?php echo $v['typeid'];?>)}"<?php } else { ?>value="{ad(<?php echo $v['pid'];?>)}"<?php } ?> onmouseover="this.select();"/></td>

<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=add&pid=<?php echo $v['pid'];?>"><img src="data/style/new.png" width="16" height="16" title="��˹��λ��ӹ��" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&pid=<?php echo $v['pid'];?>"><img src="data/style/child.png" width="16" height="16" title="�˹��λ����б�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&job=check&pid=<?php echo $v['pid'];?>"><img src="data/style/import.png" width="16" height="16" title="�˹��λ��������б�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=adpos_edit&pid=<?php echo $v['pid'];?>"><img src="data/style/edit.png" width="16" height="16" title="�޸Ĵ˹��λ" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=adpos_del&pids=<?php echo $v['pid'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="ɾ���˹��λ" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
<div class="btns">
<input type="submit" value=" ɾ �� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�й��λ��\n\n���λ�µ����й��Ҳ����ɾ��\n\n�˲������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=adpos_del'}else{return false;}"/>&nbsp;&nbsp;&nbsp;
��ʾ����Ҫ��������Ч��������¹��
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>