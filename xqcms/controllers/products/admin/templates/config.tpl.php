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
<th colspan="10">��������</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">�б�Ĭ��ģ��</td>
<td><?php echo tpl_select('index', $module, 'setting[template_index]', 'Ĭ��ģ��', $template_index);?></td>
</tr>
<tr>
<td class="tl">����Ĭ��ģ��</td>
<td><?php echo tpl_select('show', $module, 'setting[template_show]', 'Ĭ��ģ��', $template_show);?></td>
</tr>
<tr>
<td class="tl">Ĭ������ͼ[��X��]</td>
<td>
<input type="text" size="3" name="setting[thumb_width]" value="<?php echo $thumb_width;?>"/>
X
<input type="text" size="3" name="setting[thumb_height]" value="<?php echo $thumb_height;?>"/> px
</td>
</tr>
<tr>
<td class="tl">�Զ���ȡ���������</td>
<td><input type="text" size="3" name="setting[introduce_length]" value="<?php echo $introduce_length;?>"/> �ַ�</td>
</tr>
<tr>
<td class="tl">��������Զ��ͼƬ</td>
<td>
<input type="radio" name="setting[save_remotepic]" value="1"  <?php if($save_remotepic) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[save_remotepic]" value="0"  <?php if(!$save_remotepic) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">�����������</td>
<td>
<input type="radio" name="setting[clear_link]" value="1"  <?php if($clear_link) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[clear_link]" value="0"  <?php if(!$clear_link) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">λ������</td>
<td>
<input type="text" name="setting[posid]" style="width:98%;" value="<?php echo $posid;?>"/>
<br/>��ʽ��<font color=red>λ����������|λ�����Ա�ʶ��</font>,����ö��Ÿ�������ʶ��ȡֵ���Ϊ1-9���֣�
</td>
</tr>

<tr>
<td class="tl">�б���Ϣ��ҳ����</td>
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
<th colspan="10">��̬����</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">�б�ҳ�Ƿ����ɾ�̬</td>
<td>
<input type="radio" name="setting[list_html]" value="1"  <?php if($list_html){ ?>checked <?php } ?> onclick="$('#list_html').css('display','');$('#list_php').css('display','none');"/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[list_html]" value="0"  <?php if(!$list_html){ ?>checked <?php } ?> onclick="$('#list_html').css('display','none');$('#list_php').css('display','');"/> ��
</td>
</tr>
<tbody id="list_html" style="display:<?php echo $list_html ? '' : 'none'; ?>">
<tr>
<td class="tl">�б�ҳǰ׺</td>
<td><input name="setting[htm_list_prefix]" type="text" id="htm_list_prefix" value="<?php echo $htm_list_prefix;?>" size="10"></td>
</tr>
</tbody>
<td class="tl">����ҳ�Ƿ����ɾ�̬</td>
<td>
<input type="radio" name="setting[show_html]" value="1"  <?php if($show_html){ ?>checked <?php } ?> onclick="$('#show_html').css('display','');$('#show_php').css('display','none');"/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[show_html]" value="0"  <?php if(!$show_html){ ?>checked <?php } ?> onclick="$('#show_html').css('display','none');$('#show_php').css('display','');"/> ��
</td>
</tr>
<tbody id="show_html" style="display:<?php echo $show_html ? '' : 'none'; ?>">
<tr>
<td class="tl">����ҳǰ׺</td>
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
<input type="submit" name="submit" value="ȷ ��" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="չ ��" id="ShowAll" class="btn" title="չ��/��������"/>
</div>
</form>
</body>
</html>