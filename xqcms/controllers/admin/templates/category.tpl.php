<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post">
<table class="tb">
<thead>
<th colspan="10"><?php if($parentid) echo $CATEGORY[$parentid]['catname'];?>�������</th>
</thead>
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>����</th>
<th>ID</th>
<th>�ϼ�ID</th>
<th width="250">������</th>
<th>��ʾ</th>
<th>��Ϣ����</th>
<th>�ӷ���</th>
<th width="100">����</th>
</tr>
<?php foreach($XQCAT as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="catids[]" value="<?php echo $v['catid'];?>"/></td>
<td><input name="category[<?php echo $v['catid'];?>][listorder]" type="text" size="3" value="<?php echo $v['listorder'];?>"/></td>
<td>&nbsp;<a href="<?php echo $MODULE[$mid]['url'].$v['url'];?>" target="_blank"><?php echo $v['catid'];?></a>&nbsp;</td>
<td><input name="category[<?php echo $v['catid'];?>][parentid]" type="text" size="5" value="<?php echo $v['parentid'];?>"/></td>
<td>
<input name="category[<?php echo $v['catid'];?>][catname]" type="text" value="<?php echo $v['catname'];?>" style="width:100px;color:<?php echo $v['color'];?>"/>
<?php echo color('category['.$v['catid'].'][color]', $v['color']);?>
</td>
<td>
<input name="category[<?php echo $v['catid'];?>][ismenu]" type="text" value="<?php echo $v['ismenu'];?>" size="1"/>
</td>
<td><?php echo $v['items'];?></td>
<td><a href="?file=<?php echo $file;?>&mid=<?php echo $mid;?>&parentid=<?php echo $v['catid'];?>"><?php echo $v['childs'];?></a></td>
<td>
<a href="?file=<?php echo $file;?>&mid=<?php echo $mid;?>&parentid=<?php echo $v['catid'];?>"><img src="data/style/child.png" width="16" height="16" title="�����ӷ��࣬��ǰ��<?php echo $v['childs'];?>���ӷ���" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=add&mid=<?php echo $mid;?>&parentid=<?php echo $v['catid'];?>"><img src="data/style/new.png" width="16" height="16" title="����ӷ���" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=edit&mid=<?php echo $mid;?>&catid=<?php echo $v['catid'];?>"><img src="data/style/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=delete&mid=<?php echo $mid;?>&catid=<?php echo $v['catid'];?>&parentid=<?php echo $parentid;?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="ɾ��" alt=""/></a></td>
</tr>
<?php }?>
</table>
<div class="btns">
<span class="f_r">
��������:<strong class="f_red"><?php echo count($CATEGORY);?></strong>&nbsp;&nbsp;
��ǰĿ¼:<strong class="f_blue"><?php echo count($XQCAT);?></strong>&nbsp;&nbsp;
</span>
<input type="submit" name="submit" value="���·���" class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&parentid=<?php echo $parentid;?>&action=update'"/>&nbsp;
<input type="submit" value="ɾ��ѡ��" class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�з����𣿴˲��������ɳ���')){this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&parentid=<?php echo $parentid;?>&action=delete'}else{return false;}"/>
<?php if($parentid) {?>&nbsp;
<input type="button" value="�ϼ�����" class="btn" onclick="window.location='?file=<?php echo $file;?>&mid=<?php echo $mid;?>&parentid=<?php echo $CATEGORY[$parentid]['parentid'];?>';"/>
<?php }?>
</div>
</form>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>