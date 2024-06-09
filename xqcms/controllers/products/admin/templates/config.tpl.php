<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="tab" id="tab" value="<?php echo $tab;?>"/>
<div id="Tabs">
<div id="Tabs0" style="display:">
<table class="tb">
<thead>
<th colspan="10">基本设置</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">列表默认模板</td>
<td><?php echo tpl_select('index', $module, 'setting[template_index]', '默认模板', $template_index);?></td>
</tr>
<tr>
<td class="tl">内容默认模板</td>
<td><?php echo tpl_select('show', $module, 'setting[template_show]', '默认模板', $template_show);?></td>
</tr>
<tr>
<td class="tl">默认缩略图[宽X高]</td>
<td>
<input type="text" size="3" name="setting[thumb_width]" value="<?php echo $thumb_width;?>"/>
X
<input type="text" size="3" name="setting[thumb_height]" value="<?php echo $thumb_height;?>"/> px
</td>
</tr>
<tr>
<td class="tl">自动截取内容至简介</td>
<td><input type="text" size="3" name="setting[introduce_length]" value="<?php echo $introduce_length;?>"/> 字符</td>
</tr>
<tr>
<td class="tl">下载内容远程图片</td>
<td>
<input type="radio" name="setting[save_remotepic]" value="1"  <?php if($save_remotepic) echo 'checked';?>/> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[save_remotepic]" value="0"  <?php if(!$save_remotepic) echo 'checked';?>/> 关闭
</td>
</tr>
<tr>
<td class="tl">清除内容链接</td>
<td>
<input type="radio" name="setting[clear_link]" value="1"  <?php if($clear_link) echo 'checked';?>/> 开启&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[clear_link]" value="0"  <?php if(!$clear_link) echo 'checked';?>/> 关闭
</td>
</tr>
<tr>
<td class="tl">位置属性</td>
<td>
<input type="text" name="setting[posid]" style="width:98%;" value="<?php echo $posid;?>"/>
<br/>格式：<font color=red>位置属性名称|位置属性标识符</font>,多个用逗号隔开，标识符取值最好为1-9数字！
</td>
</tr>

<tr>
<td class="tl">列表信息分页数量</td>
<td><input type="text" size="3" name="setting[pagesize]" value="<?php echo $pagesize;?>"/></td>
</tr>
</table>
</td>
</tr>
</table>
</div>

<div id="Tabs1" style="display:none">
<table class="tb">
<thead>
<th colspan="10">静态设置</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">列表页是否生成静态</td>
<td>
<input type="radio" name="setting[list_html]" value="1"  <?php if($list_html){ ?>checked <?php } ?> onclick="$('#list_html').css('display','');$('#list_php').css('display','none');"/> 是&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[list_html]" value="0"  <?php if(!$list_html){ ?>checked <?php } ?> onclick="$('#list_html').css('display','none');$('#list_php').css('display','');"/> 否
</td>
</tr>
<tbody id="list_html" style="display:<?php echo $list_html ? '' : 'none'; ?>">
<tr>
<td class="tl">列表页前缀</td>
<td><input name="setting[htm_list_prefix]" type="text" id="htm_list_prefix" value="<?php echo $htm_list_prefix;?>" size="10"></td>
</tr>
</tbody>
<td class="tl">内容页是否生成静态</td>
<td>
<input type="radio" name="setting[show_html]" value="1"  <?php if($show_html){ ?>checked <?php } ?> onclick="$('#show_html').css('display','');$('#show_php').css('display','none');"/> 是&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[show_html]" value="0"  <?php if(!$show_html){ ?>checked <?php } ?> onclick="$('#show_html').css('display','none');$('#show_php').css('display','');"/> 否
</td>
</tr>
<tbody id="show_html" style="display:<?php echo $show_html ? '' : 'none'; ?>">
<tr>
<td class="tl">内容页前缀</td>
<td><input name="setting[htm_item_prefix]" type="text" id="htm_item_prefix" value="<?php echo $htm_item_prefix;?>" size="10"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</table>
</div>
</div>
<div class="sbt">
<input type="submit" name="submit" value="确 定" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="展 开" id="ShowAll" class="btn" title="展开/收缩所有"/>
</div>
</form>
</body>
</html>