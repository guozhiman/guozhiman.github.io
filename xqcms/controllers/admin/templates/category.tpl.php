<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post">
<table class="tb">
<thead>
<th colspan="10"><?php if($parentid) echo $CATEGORY[$parentid]['catname'];?>分类管理</th>
</thead>
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>排序</th>
<th>ID</th>
<th>上级ID</th>
<th width="250">分类名</th>
<th>显示</th>
<th>信息数量</th>
<th>子分类</th>
<th width="100">操作</th>
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
<a href="?file=<?php echo $file;?>&mid=<?php echo $mid;?>&parentid=<?php echo $v['catid'];?>"><img src="data/style/child.png" width="16" height="16" title="管理子分类，当前有<?php echo $v['childs'];?>个子分类" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=add&mid=<?php echo $mid;?>&parentid=<?php echo $v['catid'];?>"><img src="data/style/new.png" width="16" height="16" title="添加子分类" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=edit&mid=<?php echo $mid;?>&catid=<?php echo $v['catid'];?>"><img src="data/style/edit.png" width="16" height="16" title="修改" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=delete&mid=<?php echo $mid;?>&catid=<?php echo $v['catid'];?>&parentid=<?php echo $parentid;?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="删除" alt=""/></a></td>
</tr>
<?php }?>
</table>
<div class="btns">
<span class="f_r">
分类总数:<strong class="f_red"><?php echo count($CATEGORY);?></strong>&nbsp;&nbsp;
当前目录:<strong class="f_blue"><?php echo count($XQCAT);?></strong>&nbsp;&nbsp;
</span>
<input type="submit" name="submit" value="更新分类" class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&parentid=<?php echo $parentid;?>&action=update'"/>&nbsp;
<input type="submit" value="删除选中" class="btn" onclick="if(confirm('确定要删除选中分类吗？此操作将不可撤销')){this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&parentid=<?php echo $parentid;?>&action=delete'}else{return false;}"/>
<?php if($parentid) {?>&nbsp;
<input type="button" value="上级分类" class="btn" onclick="window.location='?file=<?php echo $file;?>&mid=<?php echo $mid;?>&parentid=<?php echo $CATEGORY[$parentid]['parentid'];?>';"/>
<?php }?>
</div>
</form>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>