<?php 
defined('IN_XQCMS') or exit('Access Denied');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo XQ_CHARSET; ?>" />
<title>��ʾ��Ϣ - <?php echo $XQ['sitename']; ?></title>
<link rel="stylesheet" href="data/style/style.css" type="text/css" />
<script type="text/javascript" src="data/js/lang.js"></script>
<script type="text/javascript" src="data/js/config.js"></script>
<script type="text/javascript" src="data/js/xqcms.js"></script>
<script type="text/javascript" src="data/js/admin.js"></script>
</head>
</body>
<div id="box">
<?php echo $dcontent; ?>
</div>
<script type="text/javascript">
try{parent.$('#dload').css('display','none');parent.$('#diframe').css('height',document.getElementById('box').scrollHeight+'px');} catch(e){}
</script>
</body>
</html>