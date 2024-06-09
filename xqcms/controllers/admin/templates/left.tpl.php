<?php
defined('IN_XQCMS') or exit('Access Denied');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo XQ_CHARSET;?>"/>
<title>�������� - <?php echo $XQ['sitename']; ?> - Powered By V<?php echo XQ_VERSION; ?></title>
<link rel="stylesheet" href="<?php echo XQ_PATH;?>data/style/style.css" type="text/css"/>
<?php if(!XQ_DEBUG) { ?><script type="text/javascript">window.onerror= function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo XQ_PATH;?>data/js/jquery.min.js"></script>
<base target="main"/>
<!--[if IE]>
<style type="text/css">html{overflow-x:hidden;overflow-y:auto;}</style>
<![endif]-->
</head>
<body>
<?php
include XQ_SYSROOT.'/controllers/admin/menu.inc.php';
if($_admin == 2) {
?>
<table cellpadding="0" cellspacing="0" width="160" height="100%">
<tr>
<td valign="top" class="barmain">
<div id="menu">
	<dl>
	<dt>�ҵ����</dt>
	<dd onclick="_G(this,'?action=main');"><a href="javascript:void(0);">ϵͳ��ҳ</a></dd>
	<?php
		foreach($mymenu as $menu) {
	?>
	<dd onclick="_G(this,'<?php echo $menu['url'];?>');"><a href="javascript:void(0);"><?php echo set_style($menu['title'], $menu['color']);?></a></dd>
	<?php
		}
	?>
	</dl>
</div>
</td>
</tr>
</table>
<?php } else { ?>
<table cellpadding="0" cellspacing="0" width="160" height="100%">
<tr>
<td valign="top" class="barmain">
<div id="menu">&nbsp;</div>
</td>
</tr>
</table>
<div id="m_1">
	<dl>
	<dt>�ҵ����</dt>
	<dd onclick="_G(this,'?action=main');return false;"><a href="javascript:void(0);" hidefocus="true">ϵͳ��ҳ</a></dd>
	<?php if($_admin<3){?> 
	<dd  onclick="_G(this,'?file=mymenu');return false;"><a href="javascript:void(0);" hidefocus="true">�������</a></dd>
	<?php
		}
	?>
	<?php
		foreach($mymenu as $menu) {
	?>
	<dd onclick="_G(this,'<?php echo $menu['url'];?>');return false;"><a href="javascript:void(0);" hidefocus="true"><?php echo set_style($menu['title'], $menu['style']);?></a></dd>
	<?php
		}
	?>
	</dl>
</div>
<div id="m_2" >
	<dl> 
	<dt>ϵͳ����</dt> 
	<?php
		foreach($menu_system as $m) {
			echo '<dd onclick="_G(this,\''.$m[1].'\');return false;"><a href="javascript:void(0);" hidefocus="true">'.$m[0].'</a></dd>';
		}
	?>
	</dl>
	<dl> 
	<dt>���²���</dt>
	<dd onclick="_G(this,'?action=html');return false;"><a href="javascript:void(0);" hidefocus="true">������ҳ</a></dd>
	<dd onclick="_G(this,'?action=cache');return false;"><a href="javascript:void(0);" hidefocus="true">���»���</a></dd>
	<dd onclick="if(confirm('ȷ��Ҫ��ʼ����ȫվҳ���𣿴˲����ȽϺķѷ�������Դ��ʱ��')){_G(this,'?file=update');return false;}else{return false;}"><a href="javascript:void(0);" hidefocus="true">����ȫվ</a></dd>
	</dl>
</div>
<div id="m_3">
	<?php
	foreach($MODULE as $v) {
		if($v['moduleid'] > 4) {
			$menuinc = XQ_SYSROOT.'/controllers/'.$v['module'].'/admin/menu.inc.php';
			if(is_file($menuinc)) {
				extract($v);
				include $menuinc;
				echo '<dl>';
				echo '<dt>'. $name.'����'.'</dt>';
				foreach($menu as $m) {
					echo '<dd onclick="_G(this,\''.$m[1].'\');return false;" style="display:none"><a href="javascript:void(0);" hidefocus="true">'.$m[0].'</a></dd>';
				}
				echo '</dl>';
			}
		}
	}
	?>
</div>
<div id="m_4">
	<?php
			$menuinc = XQ_SYSROOT.'/controllers/app/admin/menu.inc.php';
			if(is_file($menuinc)) {
				include $menuinc;
				echo '<dl> <dt>��������</dt>';
				foreach($menu as $m) {
					echo '<dd onclick="_G(this,\''.$m[1].'\');return false;"><a href="javascript:void(0);" hidefocus="true">'.$m[0].'</a></dd>';
				}
				echo '</dl>';
			}
	?>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
  $("div:not(#menu)").hide();
  $("#menu").html($("#m_1").html());
  XQcms.hover();
  XQcms.toggle();
});
XQcms={};
XQcms.hover=function(){
  	$("dt").hover(
		function(){
		  $(this).addClass("XQ_on");
		},
		function(){
		  $(this).removeClass("XQ_on");
		}
  );
}
XQcms.toggle=function(){
	$("dt").toggle(
		function(){
		    $(this).siblings("dd").hide();
		
		},
		function(){
			$(this).siblings("dd").show();
		}
	);
}
XQcms.hide=function(lid){
  $("#menu").html($("#m_"+lid).html());
  XQcms.hover();
  if(lid!=3){
      XQcms.toggle();
   }else{
	  $("dt:first").siblings("dd").show();
	  var lastdd=$("dt:first").siblings("dd");
	  $("dt").click(function(){
		  var dd=$(this).siblings("dd");
		  if(dd.css("display")=="block"){
			 dd.hide();
			 lastdd = null;
		   }else{
			 dd.show();
			 if(lastdd != null) lastdd.hide();
			 lastdd=dd;
		   }
	  });
  }
}
</script>
<?php } ?>
<script type="text/javascript">
function _G(e,url){
	$("dd").removeClass("dd_on");
	$(e).addClass("dd_on");
	window.top.frames["main"].location= url;
}
</script>
</body>
</html>