<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<table class="tb">
<thead>
<th colspan="10">�ҵ�������</th>
</thead>
<tr>
<th width="40">ɾ��</th>
<th>����</th>
<th>����</th>
<th>��ַ</th>
</tr>
<?php foreach($dmenus as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input name="right[<?php echo $v['adminid'];?>][delete]" type="checkbox" value="1"/></td>
<td><input name="right[<?php echo $v['adminid'];?>][listorder]" type="text" size="3" value="<?php echo $v['listorder'];?>"/></td>
<td><input name="right[<?php echo $v['adminid'];?>][title]" type="text" size="12" value="<?php echo $v['title'];?>"/> <?php echo color('right['.$v['adminid'].'][color]', $v['color']);?></td>
<td><input name="right[<?php echo $v['adminid'];?>][url]" type="text" size="60" value="<?php echo $v['url'];?>"/></td>
</tr>
<?php }?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td class="f_red">����</td>
<td><input name="right[0][listorder]" type="text" size="3" value=""/></td>
<td><input name="right[0][title]" type="text" size="12" value=""/> <?php echo color('right[0][color]');?></td>
<td><input name="right[0][url]" type="text" size="60" value=""/>
</td>
</tr>
<tr>
<td> </td>
<td height="30" colspan="4"><input type="submit" name="submit" value="�� ��" class="btn"/></td>
</tr>
</table>
</form>
<?php if(isset($update)) { ?>
<script type="text/javascript">window.parent.frames[1].location.reload();</script>
<?php } ?>
<script type="text/javascript">posmenu(0);</script>
<br/>
</body>
</html>