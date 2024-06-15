<?php
defined('IN_XQCMS') or exit('Access Denied');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo XQ_CHARSET;?>"/>
<title>管理中心 - <?php echo $XQ['sitename']; ?></title>
<meta name="robots" content="noindex,nofollow"/>
<meta http-equiv="x-ua-compatible" content="ie=7"/>
<?php if(!XQ_DEBUG) { ?><script type="text/javascript">window.onerror= function(){return true;}</script><?php } ?>
<link rel="stylesheet" href="data/style/style.css" type="text/css"/>
<script type="text/javascript" src="data/js/lang.js"></script>
<script type="text/javascript" src="data/js/config.js"></script>
<script type="text/javascript" src="data/js/jquery.min.js"></script>
<script type="text/javascript" src="data/js/xqcms.js"></script>
<script type="text/javascript" src="data/js/admin.js"></script>
<?php if($file=="webconfig" || $file=="config" ){?>
<script type="text/javascript">
jQuery(document).ready(function(){
  $("#ShowAll").toggle(
     function(){
	  $("#Tabs div").css("display","block"); 
	  $("#ShowAll").val("收 缩");
	 },
	 function(){
	  $("#Tabs div").css("display","none");
	  $("#Tabs"+$("#tab").val()).css("display","block");
	  $("#ShowAll").val("展 开"); 
	 }
  )
  if($("#tab").val()) Tab($("#tab").val());
});
</script>
<?php }?>
</head>
<body>
<?php dmsg();?>