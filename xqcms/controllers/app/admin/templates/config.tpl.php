<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="tab" id="tab" value="<?php echo $tab;?>"/>
<div id="Tabs0" style="display:">
<table class="tb">
<thead>
<th colspan="2">��������</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">�������ӹ���</td>
<td>
<input type="radio" name="setting[link_enable]" value="1"  <?php if($link_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[link_enable]" value="0"  <?php if(!$link_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">����������������</td>
<td>
<input type="radio" name="setting[link_reg]" value="1"  <?php if($link_reg) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[link_reg]" value="0"  <?php if(!$link_reg) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">����˵��</td>
<td><textarea name="setting[link_request]" id="link_request" style="width:500px;height:50px;"><?php echo $link_request;?></textarea><br/>֧��HTML�﷨�� �ո� &amp;nbsp; ����  &lt;br/&gt;
</td> 
</tr>
</table>
</td>
</tr>
</table>
<table class="tb">
<thead>
<th colspan="2">��������</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">���Թ���</td>
<td>
<input type="radio" name="setting[guestbook_enable]" value="1"  <?php if($guestbook_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[guestbook_enable]" value="0"  <?php if(!$guestbook_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">���������ʾ</td>
<td>
<input type="radio" name="setting[guestbook_enstatus]" value="1"  <?php if($guestbook_enstatus) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[guestbook_enstatus]" value="0"  <?php if(!$guestbook_enstatus) echo 'checked';?>/> ��
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<div class="sbt">
<input type="submit" name="submit" value="ȷ ��" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</form>
</body>
</html>