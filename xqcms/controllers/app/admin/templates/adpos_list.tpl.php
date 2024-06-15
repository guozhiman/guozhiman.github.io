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
<th colspan="8">广告位搜索</th>
</thead>
<tr>
<td>
&nbsp;<?php echo $type_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="关键词"/>
&nbsp;

<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2"/> 条/页
<input type="submit" value="搜 索" class="btn"/>&nbsp;
<input type="button" value="重 置" class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>';"/>
</td>
</tr>
</table>
</form>
<form method="post">
<table class="tb">
<thead>
<th colspan="10">管理广告位</th>
</thead>
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>ID</th>
<th>广告类型</th>
<th>广告位名称</th>
<th>规格(px)</th>
<th>显示</th>
<th>广告</th>
<th>调用代码</th>
<th>操作</th>
</tr>
<?php foreach($adpos as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center" name="更新时间:<?php echo $v['editdate'];?>">
<td><input type="checkbox" name="pids[]" value="<?php echo $v['pid'];?>"/></td>
<td><?php echo $v['pid'];?></td>
<td><?php echo $v['typename'];?></td>
<td align="left" title="添加时间:<?php echo $v['adddate'];?>&#10;修改时间:<?php echo $v['editdate'];?>"><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&pid=<?php echo $v['pid'];?>"><?php echo $v['name'];?></td>
<td><?php echo $v['width'];?> x <?php echo $v['height'];?></td>
<td><?php echo $v['open'] ? '显示' : '<span class="f_blue">隐藏</span>';?></td>
<td><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&pid=<?php echo $v['pid'];?>"><?php echo $v['ads'];?></a></td>
<td><input type="text" size="12" <?php if($v['typeid'] == 6 || $v['typeid'] == 7) { ?>value="{ad($moduleid,$catid,$kw,<?php echo $v['typeid'];?>)}"<?php } else { ?>value="{ad(<?php echo $v['pid'];?>)}"<?php } ?> onmouseover="this.select();"/></td>

<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=add&pid=<?php echo $v['pid'];?>"><img src="data/style/new.png" width="16" height="16" title="向此广告位添加广告" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&pid=<?php echo $v['pid'];?>"><img src="data/style/child.png" width="16" height="16" title="此广告位广告列表" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&job=check&pid=<?php echo $v['pid'];?>"><img src="data/style/import.png" width="16" height="16" title="此广告位广告待审核列表" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=adpos_edit&pid=<?php echo $v['pid'];?>"><img src="data/style/edit.png" width="16" height="16" title="修改此广告位" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=adpos_del&pids=<?php echo $v['pid'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="删除此广告位" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
<div class="btns">
<input type="submit" value=" 删 除 " class="btn" onclick="if(confirm('确定要删除选中广告位吗？\n\n广告位下的所有广告也将被删除\n\n此操作不可撤销')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=adpos_del'}else{return false;}"/>&nbsp;&nbsp;&nbsp;
提示：想要立即看到效果，请更新广告
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>