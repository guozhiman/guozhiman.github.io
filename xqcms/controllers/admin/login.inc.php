<?php
defined('IN_XQCMS') or exit('Access Denied');
XQcms::load_xq_func('module');
if(!$forward) $forward = '?';
if($_admin && $_userid) dheader($forward);
if($submit) {
	captcha($captcha);
	if(!$username) message('�������û���');
	if(!$password) message('����������');
	XQcms::load_xq_class('admin');
	$admin = new admin;
	$user = $admin->login($username, $password);
	if($user) {
		if($user['groupid'] != 1 || $user['admin'] < 1) msg('����Ȩ�޷��ʺ�̨', XQ_PATH);
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