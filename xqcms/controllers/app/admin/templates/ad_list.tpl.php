<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="job" value="<?php echo $job;?>"/>
<input type="hidden" name="pid" value="<?php echo $pid;?>"/>
<table class="tb">
<thead>
<th colspan="2">�������</th>
</thead>
<tr>
<td>
&nbsp;<?php echo $fields_select;?>&nbsp;
<input type="text" size="25" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<?php echo $order_select;?>&nbsp;
���λID�� <input type="text" name="pid" value="<?php echo $pid;?>" size="2" class="t_c"/>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c"/> ��/ҳ
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&job=<?php echo $job;?>';"/>
</td>
</tr>
</table>
</form>
<form method="post">
<table class="tb">
<thead>
<th colspan="8"><?php echo $pid ? $P[$pid]['name'] : '����б�';?></th>
</thead>
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th width="40">����</th>
<th>ID</th>
<?php if($pid == 0) { ?>
<th>�������</th>
<?php } ?>
<th>�������</th>
<th>���ʱ��</th>
<th>���</th>
<th width="80">����</th>
</tr>
<?php foreach($ads as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="aids[]" value="<?php echo $v['aid'];?>"/></td>
<td><input type="text" size="2" name="listorder[<?php echo $v['aid'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><?php echo $v['aid'];?></td>
<?php if($pid == 0) { ?>
<td><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&job=<?php echo $job;?>&typeid=<?php echo $v['typeid'];?>"><?php echo $TYPE[$v['typeid']];?></a></td>
<?php } ?>
<td align="left">&nbsp;<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&aid=<?php echo $v['aid'];?>&pid=<?php echo $v['pid'];?>"><?php echo $v['title'];?></a></td>
<td  title="�༭:<?php echo $v['editor'];?>&#10;���ʱ��:<?php echo $v['adddate'];?>&#10;����ʱ��:<?php echo $v['editdate'];?>"><?php echo $v['adddate'];?></td>
<td><?php echo $v['status']==3 ? '��ͨ��' : '<span class="f_red">�����</span>';?></td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&aid=<?php echo $v['aid'];?>&pid=<?php echo $v['pid'];?>"><img src="data/style/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&aids=<?php echo $v['aid'];?>&pid=<?php echo $v['pid'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
<div class="btns">
<input type="submit" value=" �������� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=order_ad&pid=<?php echo $pid;?>';"/>&nbsp;
<input type="submit" value=" ɾ �� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�й���𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&pid=<?php echo $pid;?>'}else{return false;}"/>&nbsp;
<?php if($pid) { ?>
<?php if($job == 'check') { ?>
<input type="button" value=" ����б� " class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&job=&pid=<?php echo $pid;?>';"/>&nbsp;
<?php } else { ?>
<input type="button" value=" ��˹�� " class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&job=check&pid=<?php echo $pid;?>';"/>&nbsp;
<?php } ?>
<input type="button" value=" ��ӹ�� " class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=add&pid=<?php echo $pid;?>';"/>
<?php } ?>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">posmenu(<?php echo $job == 'check' ? 3 : 2;?>);</script>
</body>
</html>