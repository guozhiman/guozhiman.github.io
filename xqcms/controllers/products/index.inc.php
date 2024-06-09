<?php
defined('IN_XQCMS') or exit('Access Denied');
require 'common.inc.php';
if($catid && !isset($CATEGORY[$catid])) {
	$head_title = lang('message->cate_not_exists');
	@header("HTTP/1.1 404 Not Found");
	exit(include template('404', 'message'));
}	
if($MOD['list_html']&&!$kw) {
	$html_file = $catid ? listurl($moduleid, $catid, $page, $CATEGORY, $MOD) : $XQ['index'].'.'.$XQ['file_ext'];
	if(!is_file(XQ_ROOT.'/'.$MOD['moduledir'].'/'.$html_file)) tohtml('list', $module);
	@header("HTTP/1.1 301 Moved Permanently");
	dheader($MOD['url'].$html_file);
}
if($catid){
	$CAT = get_cat($catid);
	unset($CAT['moduleid']);
	extract($CAT);
}
include XQ_ROOT.'/app/seo.php';
$seo_title = $catid ? $seo_cattitle.$seo_page.$seo_modulename.$seo_delimiter.$seo_sitename : $seo_modulename.$seo_delimiter.$seo_sitename;
$template = $MOD['template_index'] ? $MOD['template_index'] : 'index';
include template($template, $module);
?>