<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<table class="tb">
<thead>
<th colspan="10">������ҳ</th>
</thead>
<tr>
<td height="30">&nbsp;
<form method="post">
<input type="submit" value=" һ������ " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=all';" title="���ɸ�ģ��������ҳ"/>&nbsp;&nbsp;
<input type="submit" value=" �����б� " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=list';" title="���ɸ�ģ�����з���"/>&nbsp;&nbsp;
<input type="submit" value=" �������� " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=show';" title="���ɸ�ģ����������ҳ"/>&nbsp;&nbsp;
<input type="submit" value=" ������Ϣ " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=show&update=1';" title="���¸�ģ��������Ϣ��ַ����Ŀ"/><br /><br />
</form>
<form method="post">
<b>����ID���ɣ�</b>
��ʼID: <input type="text" size="6" name="fid" value="<?php echo $fid;?>"/>&nbsp;&nbsp;����ID��<input type="text" size="6" name="tid" value="<?php echo $tid;?>"/>&nbsp;&nbsp;ÿ������������ <input type="text" size="5" name="num" value="100"/>&nbsp;<input type="submit" value=" �������� " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=show';"/>&nbsp;
<input type="submit" value=" ������Ϣ " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=show&update=1';"/>
</form><br />
<form method="post">
<b>���շ������ɣ�</b>
<?php echo category_select('catid', 'ѡ�����', 0, $mid);?>&nbsp;&nbsp;�� <input type="text" size="3" name="fpage" value="1"/> ҳ �� <input type="text" size="3" name="tpage" value=""/> ҳ&nbsp;&nbsp;ÿ������������ <input type="text" size="5" name="num" value="100"/>&nbsp;<input type="submit" value=" �����б� " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=cate';"/>&nbsp;
<input type="submit" value=" �������� " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=item';"/>
</form>
<br />
</td>
</tr>
</table>
<script type="text/javascript">posmenu(0);</script>
</body>
</html>