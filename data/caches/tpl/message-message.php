<?php defined('IN_XQCMS') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo XQ_CHARSET;?>" />
<title>��ʾ��Ϣ<?php echo $XQ['seo_delimiter'];?><?php echo $XQ['sitename'];?></title>
<style type="text/css">
*{font-size:12px;color:#2B61BA;}
body{font-family: Verdana, Arial, Helvetica, sans-serif;background:#F0F2F7;margin:0;}
input{color:#333333;}
a:link,a:visited,a:active {color:#ABBBD6;text-decoration:none;}
.msg{width:400px;background:#FFFFFF url('<?php echo XQ_STYLE;?>images/messagebg.gif') repeat-x;margin:auto;}
.head{letter-spacing:2px;line-height:29px;height:26px;overflow:hidden;font-weight:bold;}
.content{padding:10px 20px 5px 20px;line-height:200%;word-break:break-all;border:#7998B7 1px solid;border-top:none;}
.ml{color:#FFFFFF;background:url('<?php echo XQ_STYLE;?>images/message.gif') no-repeat 0 0;padding-left:10px;}
.mr{float:right;background:#000 url('<?php echo XQ_STYLE;?>images/message.gif') no-repeat 0 -34px;width:4px;font-size:1px;}
</style>
<script type="text/javascript">try {document.execCommand("BackgroundImageCache", false, true);} catch(e) {}</script>
</head>
<body onkeydown="if(event.keyCode==13) window.history.back();">
<table cellpadding="0" cellspacing="0" width="400"  align="center">
<tr>
<td height="150"></td>
</tr>
<tr>
<td>
	<div class="msg">
		<div class="head"><div class="mr">&nbsp;</div><div class="ml">��ʾ��Ϣ</div></div>
		<div class="content">
		<?php echo $dmessage;?><br/>
		<?php if($dforward == 'goback') { ?>
		<a href="javascript:window.history.back();">[ �����ﷵ����һҳ ]</a><br/>
		<?php } else { ?>
		<a href="<?php echo $dforward;?>">������������û���Զ���ת����������</a><br/>
		<meta http-equiv="refresh" content="<?php echo $XQime;?>;URL=<?php echo $dforward;?>">
		<?php } ?>
		</div>
	</div>
</td>
</tr>
</table>
</body>
</html>