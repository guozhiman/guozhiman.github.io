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
<th><?php echo $MOD['name'];?>搜索</th>
</thead>
<tr>
<td>
&nbsp;
<?php echo $_admin == 1 ? category_select('catid', '不限分类', $catid, $moduleid) : ajax_category_select('catid', '不限分类', $catid, $moduleid);?>&nbsp;
<?php echo $posid_select;?>&nbsp;
<input type="text" size="25" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c"/> 条/页
<input type="submit" value="搜 索" class="btn"/>&nbsp;
<input type="button" value="重 置" class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>';"/>
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
<th width="50">排序</th>
<th>分类</th>
<th>标 题</th>
<th>添加人</th>
<th width="100">添加时间</th>
<th>浏览</th>
<th width="50">操作</th>
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
<td class="px11" title="更新时间<?php echo timetodate($v['edittime'], 5);?>"><?php echo timetodate($v['addtime'], 5);?></td>
<td class="px11"><?php echo $v['hits'];?></td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&id=<?php echo $v['id'];?>"><img src="data/style/edit.png" width="16" height="16" title="修改" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&id=<?php echo $v['id'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="删除" alt=""/></a>
</td>
</tr>
<?php } ?>
</table>
<div class="btns">
<?php if($action == 'check') { ?>

<input type="submit" value=" 通过审核 " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=check';"/>&nbsp;
<input type="submit" value=" 回收站 " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&recycle=1';"/>&nbsp;
<input type="submit" value=" 彻底删除 " class="btn" onclick="if(confirm('确定要删除选中<?php echo $MOD['name'];?>吗？此操作将不可撤销')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;

<?php } else if($action == 'recycle') { ?>

<input type="submit" value=" 彻底删除 " class="btn" onclick="if(confirm('确定要删除选中<?php echo $MOD['name'];?>吗？此操作将不可撤销')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;
<input type="submit" value=" 还 原 " class="btn" onclick="if(confirm('确定要还原选中<?php echo $MOD['name'];?>吗？状态将被设置为已通过')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=restore'}else{return false;}"/>&nbsp;
<input type="submit" value=" 清 空 " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=clear';"/>

<?php } else { ?>
<input type="submit" value=" 更新排序 " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=order';"/>&nbsp;
<input type="submit" value=" 更新信息 " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=update';"/>&nbsp;
<input type="submit" value=" 生成网页 " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=tohtml';"/>&nbsp;
<input type="submit" value=" 回收站 " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&recycle=1';"/>&nbsp;
<input type="submit" value=" 彻底删除 " class="btn" onclick="if(confirm('确定要删除选中<?php echo $MOD['name'];?>吗？此操作将不可撤销')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;
<input type="submit" value=" 一键生成 " class="btn" onclick="this.form.action='?mid=<?php echo $moduleid;?>&file=html&action=all';" title="生成该模块所有网页"/>&nbsp;
<input type="submit" value=" 更新所有 " class="btn" onclick="this.form.action='?mid=<?php echo $moduleid;?>&file=html&action=show&update=1';" title="更新该模块所有信息地址等项目"/><br />
<?php echo posid_select_c('posid',0, '&nbsp;<input type="submit" value="设置属性" class="btn" onclick="this.form.action=\'?moduleid='.$moduleid.'&file='.$file.'&action=posid\';this.form.submit();">');?> 提示：取消属性则不要选中提交即可。
<?php } ?>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">posmenu(<?php echo $menuid;?>);</script>
</body>
</html>