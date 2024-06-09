<?php
defined('IN_XQCMS') or exit('Access Denied');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo XQ_CHARSET;?>"/>
<title>管理中心 - <?php echo $XQ['sitename']; ?></title>
<link rel="stylesheet" href="data/style/style.css" type="text/css"/>
<?php if(!XQ_DEBUG) { ?><script type="text/javascript">window.onerror= function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo XQ_PATH;?>data/js/jquery.min.js"></script>
<base target="main"/>
</head>
<table cellpadding="0" cellspacing="0" width="100%" height="100%">
<tr>
<td class="side" title="点击关闭/打开侧栏">
<div id="side" class="side_on">&nbsp;</div>
</td>
</tr>
</table>
<script type="text/javascript">
jQuery(document).ready(function(){
    $(".side").toggle(
	function(){
	    $("#side").removeClass("side_on");
	    $("#side").addClass("side_off");
	    top.document.getElementsByName("fra")[0].cols = '0,15,*';
	},
	function(){
	    $("#side").removeClass("side_off");
		$("#side").addClass("side_on");
		top.document.getElementsByName("fra")[0].cols = '160,15,*';
	}
  );
});
</script>
</body>
</html>