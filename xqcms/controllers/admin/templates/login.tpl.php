<?php 
defined('IN_XQCMS') or exit('Access Denied');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo XQ_CHARSET; ?>" />
<meta name="robots" content="noindex,nofollow"/>
<title>管理中心 - <?php echo $XQ['sitename']; ?></title>
<link rel="stylesheet" href="data/style/login.css" type="text/css" />
<script type="text/javascript" src="data/js/lang.js"></script>
<script type="text/javascript" src="data/js/config.js"></script>
<script type="text/javascript" src="data/js/jquery.min.js"></script>
<script type="text/javascript" src="data/js/xqcms.js"></script>
</head>
</body>
<noscript><br/><br/><br/><center><h1>您的浏览器不支持JavaScript,请更换支持JavaScript的浏览器</h1></center></noscript>
<noframes><br/><br/><br/><center><h1>您的浏览器不支持框架,请更换支持框架的浏览器</h1></center></noframes>
<table cellpadding="0" cellspacing="0" width="580"  align="center">
<tr>
<td height="100"></td>
</tr>
<tr>
<td>
	<div class="msg">
		<div class="head"></div>
		<div class="content">
		<form method="post" action="?"  onsubmit="return Dcheck();">
		<input type="hidden" name="file" value="<?php echo $file;?>"/>
		<input name="forward" type="hidden" value="<?php echo $forward;?>"/>
		<table cellpadding="5" cellspacing="5" width="80%" align="center" >
        <tr>
		<td colspan="2" height="50" align="center" style="FONT-FAMILY: '微软雅黑','黑体'; font-size:22px;"><font style="FONT-FAMILY: '微软雅黑','黑体'; font-size:22px; color:red"><?php echo $XQ['sitename']; ?></font>—管理员登录</td>
		</tr>
        <tr>
        <td class="loginbg">&nbsp;</td>
        <td align="left" >
        <table cellpadding="3" cellspacing="3" width="100%" >
		<tr>
		<td align="right" height="25" width="50px;">&nbsp;户&nbsp;&nbsp;&nbsp;名</td>
		<td><input name="username" type="text" id="username" class="inp" style="width:140px;" value="<?php echo $username;?>"/></td>
		</tr>
		<tr>
		<td align="right" height="25">&nbsp;密&nbsp;&nbsp;&nbsp;码</td>
		<td><input name="password" type="password" class="inp" style="width:140px;" id="password"/></td>
		</tr>
		<tr>
		<td align="right" height="25">&nbsp;验证码</td>
		<td>
        <input name="captcha" id="captcha" type="text" size="6" onfocus="showcaptcha();" value="点击显示" style="float:left; margin-right:10px"  /><img src="data/style/loading.gif" title="点击刷新&#10;不区分大小写" alt="" align="absmiddle" id="captchapng" onclick="reloadcaptcha();" style="display:none;cursor:pointer;float:left"/>
        </td>
		</tr>
		<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="登 录" class="btn" tabindex="4"/>&nbsp;&nbsp;<input type="button" value="退 出" class="btn" onclick="top.window.location='<?php echo XQ_PATH;?>';"/>
		</td>
		</tr>
        </table>
        </td>
        </tr>
		</table>
		</form>
		</div>
		<div class="bottom"></div>
	</div>
</td>
</tr>
</table>
<script type="text/javascript">
$(document).ready(function(){
	if($('#username').val() == '') {
		$('#username').focus();
	} else {
		$('#password').focus();
	}
});	
function Dcheck() {
	if($('#username').val() == '') {
		confirm('请填写用户名');
		$('#username').focus();
		return false;
	}
	if($('#password').val() == '') {
		confirm('请填写密码');
		$('#password').focus();
		return false;
	}
	if($('#captcha').val().length!=4) {
		confirm('请填写4位验证码');
		$('#captcha').focus();
		return false;
	}
	return true;
}
</script>
</body>
</html>