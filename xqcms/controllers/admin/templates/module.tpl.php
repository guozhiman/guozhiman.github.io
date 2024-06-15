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
<th colspan="9">正在开启的模块</th>
</thead>
<tbody>
<tr>
<th width="50">排序</th>
<th width="50">ID</th>
<th>名称</th>
<th width="100">菜单名称</th>
<th width="70">类型</th>
<th width="70">导航显示</th>
<th width="70">模型</th>
<th width="100">安装日期</th>
<th width="120">操作</th>
</tr>
<?php foreach($modules as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><input type="text" size="2" name="listorder[<?php echo $v['moduleid'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><?php echo $v['moduleid'];?></td>
<td><?php echo $v['name'];?></td>
<td><a href="<?php echo $v['url'];?>" target="_blank"><?php echo set_style($v['menuname'], $v['color']);?></a></td>
<td><?php echo $v['islink'] ? '<span class="f_red">外链</span>' : '内置';?></td>
<td><?php echo $v['ismenu'] ? '是' : '<span class="f_red">否</span>';?></td>
<td title="<?php echo $v['module'];?>"><?php echo $v['modulename'];?></td>
<td><?php echo $v['setuptime'];?></td>
<td><a href="?file=<?php echo $file;?>&action=edit&modid=<?php echo $v['moduleid'];?>"><img src="data/style/edit.png" width="16" height="16" title="修改" alt=""/></a>&nbsp;&nbsp;<a href="?file=<?php echo $file;?>&action=delete&modid=<?php echo $v['moduleid'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="删除" alt=""/></a>&nbsp;&nbsp;
<a href="javascript:Dconfirm('确定要关闭[<?php echo $v['name'];?>]模块吗?', '?file=<?php echo $file;?>&action=disable&value=1&modid=<?php echo $v['moduleid'];?>');">【关闭】</a>
</td>

</tr>
<?php }?>
</tbody>
</table>
<?php if($_modules) { ?>
<table class="tb">
<thead>
<th colspan="9"><font class="f_red">已经关闭的模块</font></th>
</thead>
<tr>
<th width="50">排序</th>
<th width="50">ID</th>
<th>名称</th>
<th width="100">菜单名称</th>
<th width="70">类型</th>
<th width="70">导航</th>
<th width="120">模型</th>
<th width="100">安装日期</th>
<th width="120">操作</th>
</tr>
<?php foreach($_modules as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><input type="text" size="2" name="listorder[<?php echo $v['moduleid'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><?php echo $v['moduleid'];?></td>
<td><?php echo set_style($v['name'], $v['color']);?></td>
<td><a href="<?php echo $v['url'];?>" target="_blank"><?php echo set_style($v['menuname'], $v['color']);?></a></td>
<td><?php echo $v['islink'] ? '<span class="f_red">外链</span>' : '内置';?></td>
<td><?php echo $v['ismenu'] ? '是' : '<span class="f_red">否</span>';?></td>
<td title="<?php echo $v['module'];?>"><?php echo $v['modulename'];?></td>
<td><?php echo $v['setuptime'];?></td>
<td><a href="?file=<?php echo $file;?>&action=edit&modid=<?php echo $v['moduleid'];?>"><img src="data/style/edit.png" width="16" height="16" title="修改" alt=""/></a>&nbsp;&nbsp;<a href="?file=<?php echo $file;?>&action=delete&modid=<?php echo $v['moduleid'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="删除" alt=""/></a>&nbsp;&nbsp;
<a href="?file=<?php echo $file;?>&action=disable&value=0&modid=<?php echo $v['moduleid'];?>">【开启】</a>
</td>

</tr>
<?php }?>
</table>
<?php } ?>
<div class="btns">
<input type="submit" value=" 更新排序 " class="btn"/>&nbsp;
</div>
</form>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>