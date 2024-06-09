<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="userid" value="<?php echo $userid;?>"/>
<table class="tb">
<thead>
<th colspan="10">管理员[<?php echo $username;?>]面板管理</th>
</thead>
<tr>
<th width="40">删除</th>
<th>排序</th>
<th>名称</th>
<th>地址</th>
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
<td class="f_red">新增</td>
<td><input name="right[0][listorder]" type="text" size="3" value=""/></td>
<td><input name="right[0][title]" type="text" size="12" value="" id="p_title"/> <?php echo color('right[0][color]');?></td>
<td><input name="right[0][url]" type="text" size="60" value="" id="p_url"/>
</td>
</tr>
<tr>
<td height="30"> </td>
<td colspan="4">
&nbsp;
<input type="submit" name="submit" value="更 新" class="btn"/>&nbsp;
<select onchange="if(this.value){$('#p_title').val(this.options[selectedIndex].innerHTML);$('#p_url').val(this.value);}" style="width:120px;">
<option value="">常用操作</option>
<?php
foreach($MODULE as $m) {
	if($m['islink']) continue;
	$mid = $m['moduleid'];
?>
<?php if($mid == 1) { ?>
<?php } else if($mid == 3) { ?>
<?php
	include XQ_SYSROOT.'/controllers/app/admin/menu.inc.php';
	foreach($menu as $m) {
		if(strpos($m[1], 'config') !== false) continue;
		echo '<option value="'.$m[1].'">'.$m[0].'</option>';
	}
?>
<?php } else { ?>
<option value="?moduleid=<?php echo $mid;?>"><?php echo $m['name'];?>管理</option>
<?php } ?>
<?php } ?>
</select>
&nbsp;&nbsp;
<strong>提示</strong>：添加常用操作可以分配对应权限
</td>
</tr>
</table>
</form>
<?php if($user['admin'] != 1) { ?>

<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="userid" value="<?php echo $userid;?>"/>
<table class="tb">
<thead>
<th colspan="10">管理员[<?php echo $username;?>]权限分配</th>
</thead>
<tr>
<td valign="top">
<table class="tb"  style="background:#F2F9FD;"><tr>
<?php $i=0; foreach($MODULE as $k=>$v) { if(!$v['islink'] && $k>1) {?>
<?php @include XQ_ROOT.'/'.($k == 1 ? 'xqcms/controllers/admin' : 'xqcms/controllers/'.$MODULE[$k]['module'].'/admin/setup').'/config.inc.php';?>
  <td valign="top" style="width:20%; vertical-align:top">
 <h5> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['name'];?></h5>
  <?php if(isset($PW)) {?>
  <?php foreach($PW['file'] as $kf=>$vf) {?>  
     <b><input name="right[<?php echo $k;?>][file][]" type="checkbox" id="<?php echo $kf.$k;?>"  value="<?php echo $kf;?>" <?php 
	 foreach($drights as $kd=>$vd) {
	    if($vd['moduleid']==$k && in_array($kf,$drights[$kd])) echo 'checked';
	 }
	 ?> /> <?php echo $vf;?></b><br />
     <?php if(isset($PW['action'][$kf])){?>
        <?php foreach($PW['action'][$kf] as $ka=>$va) {?>   
        &nbsp;&nbsp;&nbsp; |-<input name="right[<?php echo $k;?>][<?php echo $kf;?>][action][]" type="checkbox" onclick="check_f('<?php echo $kf.$k;?>');"  value="<?php echo $ka;?>" <?php 
	 foreach($drights as $kd=>$vd) {
	    if($vd['moduleid']==$k && $drights[$kd]['file']==$kf && in_array($ka,explode('|', trim($drights[$kd]['action'])))) echo 'checked';
	 }
	 ?>/> <?php echo $va;?><br /> 
   
<?php }} }}?>
<?php $CATEGORY = cache_read('category-'.$k.'.php');?>
	<?php if($CATEGORY){?>
   <b><input type="checkbox" disabled="disabled" /> 分类权限</b><br />
        <?php foreach($CATEGORY as $c) {if($c['parentid'] == 0){?>
          &nbsp;&nbsp;&nbsp; |-<input name="right[<?php echo $k;?>][catid][]" type="checkbox" onclick="check_f('<?php echo 'index'.$k;?>');"  value="<?php echo $c['catid'];?>" <?php 
	 foreach($drights as $kd=>$vd) {
	    if($vd['moduleid']==$k && in_array($c['catid'],explode('|', trim($drights[$kd]['catid'])))) echo 'checked';
	 }
	 ?>/> <?php echo $c['catname'];?><br />       
        <?php }}?>
    <?php }?>   
     </td> 
<?php  $i++;}if($i%5==0){echo "</tr><tr>";} }?>
</tr></table>
</td>
</tr>
<tr>
<td height="30" align="center"><input type="submit" name="submit" value="更 新" class="btn"/> </td>
</tr>
</table>
</form>
<?php } ?>
<script type="text/javascript">
function check_f(f) {
    if(!$("#"+f).checked){
	   $("#"+f).attr("checked",true);
	}

}
</script>
<script type="text/javascript">posmenu(2);</script>
<br/>
</body>
</html>