<?php 
defined('IN_XQCMS') or exit('Access Denied');
require 'common.inc.php';
$MOD['link_enable'] or dheader(XQ_PATH);
XQcms::load_xq_func('post');
XQcms::load_models('link');
$TYPE = get_type('link', 1);
$do = new flink();
$tid = isset($tid) ? intval($tid) : 0;
if($tid&&!isset($TYPE[$tid])) dalert($L['type_no_exist'], XQ_PATH);
if($action == 'submit') {
	($TYPE && $MOD['link_reg']) or message($L['link_reg_close']);
	if($submit) {
		captcha($captcha, 1);
		$post = dhtmlspecialchars($post);
		$r = $db->get_one("SELECT id FROM {$XQ_PRE}link WHERE url='$post[url]'");
		if($r) dalert($L['link_url_repeat'], XQ_PATH);
		$post['status'] = 2;
		$do->add($post);
		dalert($L['link_check'], XQ_PATH);
	} else {
		$type_select = type_select('link', 1, 'post[tid]', $L['link_choose_type'], 0, 'id="tid"');
		$head_title = $L['link_reg'].$XQ['seo_delimiter'].$L['link_title'];
		include template('link', $module);
	}
} else {
	$head_title = $L['link_title'];
	if($tid) $head_title = $TYPE[$tid]['name'].$XQ['seo_delimiter'].$head_title;
	$head_keywords = $head_description = '';
	include template('link', $module);
}
?>