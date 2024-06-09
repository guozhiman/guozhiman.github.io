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
<th colspan="2">友情链接</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">友情链接功能</td>
<td>
<input type="radio" name="setting[link_enable]" value="1"  <?php if($link_enable) echo 'checked';?>/> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[link_enable]" value="0"  <?php if(!$link_enable) echo 'checked';?>/> 关闭
</td>
</tr>
<tr>
<td class="tl">友情链接在线申请</td>
<td>
<input type="radio" name="setting[link_reg]" value="1"  <?php if($link_reg) echo 'checked';?>/> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[link_reg]" value="0"  <?php if(!$link_reg) echo 'checked';?>/> 关闭
</td>
</tr>
<tr>
<td class="tl">链接说明</td>
<td><textarea name="setting[link_request]" id="link_request" style="width:500px;height:50px;"><?php echo $link_request;?></textarea><br/>支持HTML语法， 空格 &amp;nbsp; 换行  &lt;br/&gt;
</td> 
</tr>
</table>
</td>
</tr>
</table>
<table class="tb">
<thead>
<th colspan="2">留言设置</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">留言功能</td>
<td>
<input type="radio" name="setting[guestbook_enable]" value="1"  <?php if($guestbook_enable) echo 'checked';?>/> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[guestbook_enable]" value="0"  <?php if(!$guestbook_enable) echo 'checked';?>/> 关闭
</td>
</tr>
<tr>
<td class="tl">留言审核显示</td>
<td>
<input type="radio" name="setting[guestbook_enstatus]" value="1"  <?php if($guestbook_enstatus) echo 'checked';?>/> 是&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[guestbook_enstatus]" value="0"  <?php if(!$guestbook_enstatus) echo 'checked';?>/> 否
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<div class="sbt">
<input type="submit" name="submit" value="确 定" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</form>
</body>
</html>