<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
?>
<script type="text/javascript">
var _del = 0;
</script>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="item" value="<?php echo $item;?>"/>
<table class="tb">
<thead>
<th colspan="10">�������</th>
</thead>
<tr>
<th width="40">ɾ��</th>
<th>ID</th>
<th>����</th>
<th>����</th>
</tr>
<?php foreach($lists as $k=>$v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input name="post[<?php echo $v['tid'];?>][delete]" type="checkbox" value="1" onclick="if(this.checked){_del++;}else{_del--;}"/></td>
<td><?php echo $v['tid'];?></td>
<td><input name="post[<?php echo $v['tid'];?>][listorder]" type="text" size="5" value="<?php echo $v['listorder'];?>" maxlength="3"/></td>
<td align="left">&nbsp;&nbsp;<input name="post[<?php echo $v['tid'];?>][name]" type="text" size="20" value="<?php echo $v['name'];?>" maxlength="20" style="width:200px;color:<?php echo $v['color'];?>"/> <?php echo color('post['.$v['tid'].'][color]', $v['color']);?></td>
</tr>
<?php } ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td></td>
<td class="f_red">����</td>
<td><input name="post[0][listorder]" type="text" size="5" value="" maxlength="3"/></td>
<td align="left">&nbsp;&nbsp;<input name="post[0][name]" type="text" size="20" value="" maxlength="20" style="width:200px;"/> <?php echo color('post[0][color]');?></td>
</tr>
<tr>
<td> </td>
<td height="30" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="�� ��" onclick="if(_del && !confirm('��ʾ:��ѡ��ɾ��'+_del+'�����ࣿȷ��Ҫɾ����')) return false;" class="btn"/></td>
</tr>
</table>
</form>
<script type="text/javascript">posmenu(0);</script>
</body>
</html>