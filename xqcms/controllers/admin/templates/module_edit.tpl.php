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
<th colspan="10">�޸�ģ��</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">ģ������</td>
<td class="f_red"><?php echo $islink ? '���' : 'ģ��('.$modulename.$module.')'?></td>
</tr>
<tr>
<td class="tl">ģ������ <span class="f_red">*</span></td>
<td><input name="post[name]" type="text" id="name" size="10" value="<?php echo $name;?>"/> <span id="dname" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">�����˵�����</td>
<td><input name="post[menuname]" type="text" id="menuname" size="10" value="<?php echo $menuname;?>"/> <?php echo color('post[color]', $color);?></td>
</tr>
<tr>
<td class="tl">������ʾ</td>
<td><input type="radio" name="post[ismenu]" value="1"  <?php if($ismenu) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="post[ismenu]" value="0"  <?php if(!$ismenu) echo 'checked';?>/> ��</td>
</tr>
<tr>
<td class="tl">�´��ڴ�</td>
<td><input type="radio" name="post[isblank]" value="1"  <?php if($isblank) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="post[isblank]" value="0"  <?php if(!$isblank) echo 'checked';?>/> ��</td>
</tr>
<?php if($islink) { ?>
<tr>
<td class="tl">���ӵ�ַ</td>
<td><input name="post[url]" type="text" id="url" size="40" value="<?php echo $url;?>"/> <span id="durl" class="f_red"></span></td>
</tr>
<?php } else { ?>
<tr>
<td class="tl">��װĿ¼</td>
<td><input name="post[moduledir]" type="text" id="moduledir" size="30"  value="<?php echo $moduledir;?>"/> <input type="button" class="btn" value="Ŀ¼���" onclick="ckDir();"><?php tips('ֻ��Ӣ�ġ����֡��л��ߡ��»������');?> <span id="dmoduledir" class="f_red"></span>
<br/>��ʾ:���ޱ�Ҫ����ҪƵ������Ŀ¼
</td>
</tr>
<?php } ?>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value="ȷ ��" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="�� ��" class="btn"></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'name';
	l = $("#"+f).val();
	if(l == '') {
		Dmsg('����дģ������', f);
		return false;
	}
	f = 'url';
	l = $("#"+f).val().length;
	if(l < 2) {
		Dmsg('����д���ӵ�ַ', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(1);</script>
</body>
</html>