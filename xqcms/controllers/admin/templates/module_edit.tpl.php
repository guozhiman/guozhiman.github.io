<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="edit"/>
<input type="hidden" name="modid" value="<?php echo $modid;?>"/>
<table class="tb">
<thead>
<th colspan="10">修改模块</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">模块类型</td>
<td class="f_red"><?php echo $islink ? '外接' : '模型('.$modulename.$module.')'?></td>
</tr>
<tr>
<td class="tl">模块名称 <span class="f_red">*</span></td>
<td><input name="post[name]" type="text" id="name" size="10" value="<?php echo $name;?>"/> <span id="dname" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">导航菜单名称</td>
<td><input name="post[menuname]" type="text" id="menuname" size="10" value="<?php echo $menuname;?>"/> <?php echo color('post[color]', $color);?></td>
</tr>
<tr>
<td class="tl">导航显示</td>
<td><input type="radio" name="post[ismenu]" value="1"  <?php if($ismenu) echo 'checked';?>/> 是&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="post[ismenu]" value="0"  <?php if(!$ismenu) echo 'checked';?>/> 否</td>
</tr>
<tr>
<td class="tl">新窗口打开</td>
<td><input type="radio" name="post[isblank]" value="1"  <?php if($isblank) echo 'checked';?>/> 是&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="post[isblank]" value="0"  <?php if(!$isblank) echo 'checked';?>/> 否</td>
</tr>
<?php if($islink) { ?>
<tr>
<td class="tl">链接地址</td>
<td><input name="post[url]" type="text" id="url" size="40" value="<?php echo $url;?>"/> <span id="durl" class="f_red"></span></td>
</tr>
<?php } else { ?>
<tr>
<td class="tl">安装目录</td>
<td><input name="post[moduledir]" type="text" id="moduledir" size="30"  value="<?php echo $moduledir;?>"/> <input type="button" class="btn" value="目录检测" onclick="ckDir();"><?php tips('只限英文、数字、中划线、下划线组合');?> <span id="dmoduledir" class="f_red"></span>
<br/>提示:如无必要，不要频繁更改目录
</td>
</tr>
<?php } ?>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value="确 定" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="重 置" class="btn"></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'name';
	l = $("#"+f).val();
	if(l == '') {
		Dmsg('请填写模块名称', f);
		return false;
	}
	f = 'url';
	l = $("#"+f).val().length;
	if(l < 2) {
		Dmsg('请填写链接地址', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>