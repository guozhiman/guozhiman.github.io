<?php defined('IN_XQCMS') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo XQ_CHARSET;?>" />
<title>��ʾ��Ϣ<?php echo $XQ['seo_delimiter'];?><?php echo $XQ['sitename'];?></title>
<script type="text/javascript" src="<?php echo XQ_JS;?>config.js"></script>
</head>
<body>
<script type="text/javascript">
<?php if($dmessage) { ?>alert('<?php echo $dmessage;?>');<?php } ?>
<?php if($dforward) { ?>
	<?php if($dforward == 'goback') { ?>
		window.history.back();
	<?php } else { ?>
		window.location='<?php echo $dforward;?>';
	<?php } ?>
<?php } ?>
<?php echo $extend;?>
</script>
</body>
</html>