<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table class="tb">
<thead>
<th><?php echo $MOD['name'];?>����</th>
</thead>
<tr>
<td>
&nbsp;
<?php echo $_admin == 1 ? category_select('catid', '���޷���', $catid, $moduleid) : ajax_category_select('catid', '���޷���', $catid, $moduleid);?>&nbsp;
<?php echo $posid_select;?>&nbsp;
<input type="text" size="25" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c"/> ��/ҳ
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>';"/>
</td>
</tr>
</table>
</form>
<form method="post">
<table class="tb">
<thead>
<th colspan="9"><?php echo $menus[$menuid][0];?></th>
</thead>
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th width="50">����</th>
<th>����</th>
<th>�� ��</th>
<th>�����</th>
<th width="100">���ʱ��</th>
<th>���</th>
<th width="50">����</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="id[]" value="<?php echo $v['id'];?>"/></td>
<td><input type="text" size="3" name="listorder[<?php echo $v['id'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><a href="<?php echo $MOD['url'].$CATEGORY[$v['catid']]['url'];?>" target="_blank"><?php echo $CATEGORY[$v['catid']]['catname'];?></a></td>
<td align="left">&nbsp;<a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['title'];?></a> &nbsp;<?php if($v['posid']) echo '<font class="f_orange px11">'.posid_select_s($v['posid']).'</font>';?>
</td>
<td>
<?php echo $v['username'];?>
</td>
<td class="px11" title="����ʱ��<?php echo timetodate($v['edittime'], 5);?>"><?php echo timetodate($v['addtime'], 5);?></td>
<td class="px11"><?php echo $v['hits'];?></td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&id=<?php echo $v['id'];?>"><img src="data/style/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&id=<?php echo $v['id'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>
</td>
</tr>
<?php } ?>
</table>
<div class="btns">
<?php if($action == 'check') { ?>

<input type="submit" value=" ͨ����� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=check';"/>&nbsp;
<input type="submit" value=" ����վ " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&recycle=1';"/>&nbsp;
<input type="submit" value=" ����ɾ�� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ��<?php echo $MOD['name'];?>�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;

<?php } else if($action == 'recycle') { ?>

<input type="submit" value=" ����ɾ�� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ��<?php echo $MOD['name'];?>�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;
<input type="submit" value=" �� ԭ " class="btn" onclick="if(confirm('ȷ��Ҫ��ԭѡ��<?php echo $MOD['name'];?>��״̬��������Ϊ��ͨ��')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=restore'}else{return false;}"/>&nbsp;
<input type="submit" value=" �� �� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=clear';"/>

<?php } else { ?>
<input type="submit" value=" �������� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=order';"/>&nbsp;
<input type="submit" value=" ������Ϣ " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=update';"/>&nbsp;
<input type="submit" value=" ������ҳ " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=tohtml';"/>&nbsp;
<input type="submit" value=" ����վ " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&recycle=1';"/>&nbsp;
<input type="submit" value=" ����ɾ�� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ��<?php echo $MOD['name'];?>�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;
<input type="submit" value=" һ������ " class="btn" onclick="this.form.action='?mid=<?php echo $moduleid;?>&file=html&action=all';" title="���ɸ�ģ��������ҳ"/>&nbsp;
<input type="submit" value=" �������� " class="btn" onclick="this.form.action='?mid=<?php echo $moduleid;?>&file=html&action=show&update=1';" title="���¸�ģ��������Ϣ��ַ����Ŀ"/><br />
<?php echo posid_select_c('posid',0, '&nbsp;<input type="submit" value="��������" class="btn" onclick="this.form.action=\'?moduleid='.$moduleid.'&file='.$file.'&action=posid\';this.form.submit();">');?> ��ʾ��ȡ��������Ҫѡ���ύ���ɡ�
<?php } ?>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">posmenu(<?php echo $menuid;?>);</script>
</body>
</html>