<?php 
defined('IN_XQCMS') or exit('Access Denied');
require 'common.inc.php';
$MOD['guestbook_enable'] or dheader(XQ_PATH);
XQcms::load_xq_func('post');
XQcms::load_models('guestbook');
$do = new guestbook();
if($submit) {
	captcha($captcha);
	$do->add($post);
	dalert($MOD['guestbook_enable']?$L['igbook_success']:$L['gbook_success'], XQ_PATH);

} else {
	$head_title = $L['gbook_title'];
	isset($title) or $title = '';
	isset($content) or $content = '';
	include template('guestbook', $module);
}
?>