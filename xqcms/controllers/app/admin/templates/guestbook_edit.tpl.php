<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" id="dform">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table class="tb">
<thead>
<th colspan="2">�鿴����</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">������</td>
<td><?php echo $truename;?> IP:<?php echo $ip;?></td>
</tr>
<tr>
<td class="tl">���Ա��� <span class="f_red">*</span></td>
<td><input name="post[title]" type="text" id="title" size="50" value="<?php echo $title;?>"/> </td>
</tr>

<tr>
<td class="tl">�������� <span class="f_red">*</span></td>
<td><textarea name="post[content]" id="content"  rows="8" cols="70"><?php echo $content;?></textarea></td>
</tr>
<tr>
<td class="tl">��ϵ�绰</td>
<td><?php echo $telephone;?></td>
</tr>
<tr>
<td class="tl">�����ʼ�</td>
<td><?php echo $email;?></td>
</tr>
<tr>
<td class="tl">QQ</td>
<td><?php echo $qq;?></td>
</tr>
<tr>
<td class="tl">�ظ�����</td>
<td><textarea name="post[reply]" id="reply" rows="8" cols="70"><?php echo $reply;?></textarea></td>
</tr>

<tr>
<td class="tl">ǰ̨��ʾ</td>
<td>
<input type="radio" name="post[status]" value="3" <?php if($status == 3) echo 'checked';?>/> ��
<input type="radio" name="post[status]" value="2" <?php if($status == 2) echo 'checked';?>/> ��
</td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
</body>
</html>