<?php
defined('IN_XQCMS') or exit('Access Denied');
XQcms::load_xq_func('module');
if(!$forward) $forward = '?';
if($_admin && $_userid) dheader($forward);
if($submit) {
	captcha($captcha);
	if(!$username) message('请输入用户名');
	if(!$password) message('请输入密码');
	XQcms::load_xq_class('admin');
	$admin = new admin;
	$user = $admin->login($username, $password);
	if($user) {
		if($user['groupid'] != 1 || $user['admin'] < 1) msg('您无权限访问后台', XQ_PATH);
		$_SESSION['xqcms_admin'] = $user['userid'];
		$_SESSION['admin'] = $user['admin'];
		$_SESSION['username'] = $username;
		$admin->cache_right($user['userid']);
		$admin->cache_menu($user['userid']);
		dheader($forward);
	} else {
		msg($do->errmsg);
	}
} else {
	if(strpos($XQ_URL, XQ_URL) === false) dheader(XQ_URL.substr(get_env('self'), 1));
	include tpl('login');
}
?>