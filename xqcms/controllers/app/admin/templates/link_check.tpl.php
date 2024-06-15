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
<th colspan="10">链接搜索</th>
</thead>
<tr>
<td>
&nbsp;<?php echo $type_select;?>&nbsp;
<input type="text" size="30" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<select name="type">
<option value="0"<?php if($type == 0) echo ' selected';?>>类型</option>
<option value="1"<?php if($type == 1) echo ' selected';?>>文字</option>
<option value="2"<?php if($type == 2) echo ' selected';?>>LOGO</option>
</select>
&nbsp;
<input type="submit" value="搜 索" class="btn"/>&nbsp;
<input type="button" value="重 置" class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>';"/>
</td>
</tr>
</table>
</form>
<form method="post">
<table class="tb">
<thead>
<th colspan="10">审核链接</th>
</thead>
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>分类</th>
<th>网站名称</th>
<th>网站LOGO</th>
<th>链接类型</th>
<th>申请时间</th>
<th width="50">操作</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center" title="网站介绍:<?php echo $v['introduce'];?>">
<td><input type="checkbox" name="id[]" value="<?php echo $v['id'];?>"/></td>
<td><a href="<?php echo $v['typeurl'];?>" target="_blank"><?php echo $v['name'];?></a></td>
<td><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['title'];?></a></td>
<td><?php if($v['thumb']) {?><img src="<?php echo $v['thumb'];?>" width="88" height="31"/><?php } ?></td>
<td><?php echo $v['thumb'] ? 'LOGO' : '文字';?></td>
<td><?php echo $v['adddate'];?></td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&id=<?php echo $v['id'];?>"><img src="data/style/edit.png" width="16" height="16" title="修改" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&id=<?php echo $v['id'];?>" onclick="return _delete();"><img src="data/style/delete.png" width="16" height="16" title="删除" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
<div class="btns">
<input type="submit" value=" 通过审核 " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=check';"/>&nbsp;
<input type="submit" value=" 删 除 " class="btn" onclick="if(confirm('确定要删除选中链接吗？此操作将不可撤销')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">posmenu(2);</script>
</body>
</html>