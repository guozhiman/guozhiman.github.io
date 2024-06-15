<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<table class="tb">
<thead>
<th colspan="10">管理员搜索</th>
</thead>
<tr>
<td>&nbsp;
<?php echo $fields_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<select name="type">
<option value="0">管理员类型</option>
<option value="1"<?php echo $type == 1 ? ' selected' : '';?>>超级管理员</option>
<option value="2"<?php echo $type == 2 ? ' selected' : '';?>>普通管理员</option>
</select>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c"/> 条/页
<input type="submit" value="搜 索" class="btn"/>&nbsp;
<input type="button" value="重 置" class="btn" onclick="window.location='?file=<?php echo $file;?>';"/>
</td>
</tr>
</table>
</form>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="add"/>
<table class="tb">
<thead>
<th colspan="10">管理员管理</th>
</thead>
<tr>
<th>用户名</th>
<th>管理级别</th>
<th>管理角色</th>
<th>上次登录时间</th>
<th>登录IP</th>
<th>登录次数</th>
<th width="150">管理</th>
</tr>
<?php foreach($lists as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><?php echo $v['username'];?></td>
<td><a href="javascript:Dconfirm('确定要改变此管理员管理级别吗？', '?file=<?php echo $file;?>&action=move&username=<?php echo $v['username'];?>');"><?php echo $v['adminname'];?></a></td>
<td><input type="text" style="width:120px;" value="<?php echo $v['role'];?>" onblur="role_name('<?php echo $v['userid'];?>', this.value);"/></td>
<td class="px11"><?php echo $v['lasttime'];?></td>
<td class="px11"><?php echo $v['lastip'];?></td>
<td><?php echo $v['logins'];?></td>
<td>
<a href="?file=<?php echo $file;?>&action=right&userid=<?php echo $v['userid'];?>" title="分配权限 / 管理面板">分配权限</a> |
<a href="?file=<?php echo $file;?>&action=password&userid=<?php echo $v['userid'];?>">修改密码</a>  | 
<a href="?file=<?php echo $file;?>&action=delete&username=<?php echo $v['username'];?>" onclick="return _delete();" title="删除管理员">删除</a>
</td>
</tr>
<?php }?>
</table>
<div class="btns">提示：点击管理级别可以改变管理员的管理级别。 </div>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">
function role_name(userid, name) {
	$.post("?",{file:"<?php echo $file;?>",action:"role",userid:userid,name:name},showmsg('角色名称更新成功！'));
}
</script>
<script type="text/javascript">posmenu(1);</script>
<br/>
</body>
</html>