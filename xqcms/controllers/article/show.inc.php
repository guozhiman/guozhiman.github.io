<?php 
defined('IN_XQCMS') or exit('Access Denied');
require 'common.inc.php';
$id or dheader($MOD['url']);
$item = $db->get_one("SELECT * FROM {$table} WHERE id=$id AND status=3");
if($item) {
	if($item['islink']) dheader($item['url']);
	if($MOD['show_html'] && is_file(XQ_ROOT.'/'.$MOD['moduledir'].'/'.$item['url'])) {
		@header("HTTP/1.1 301 Moved Permanently");
		dheader($MOD['url'].$item['url']);
	}
	extract($item);
} else {
	$head_title = lang('message->item_not_exists');
	@header("HTTP/1.1 404 Not Found");
	exit(include template('404', 'message'));
}
if($fromurl) $fromurl = fix_link($fromurl);
$update = '';
$pages = '';
if(strpos($content, '[pagebreak]') !== false) {
	$content = explode('[pagebreak]', $content);
	$total = count($content);
	$pages = showpages($item, $total, $page);
	$content = $content[$page-1];
}
include XQ_ROOT.'/app/update.php';
include XQ_ROOT.'/app/seo.php';
$seo_title = $seo_showtitle.$seo_delimiter.$seo_catname.$seo_modulename.$seo_delimiter.$seo_sitename;
$head_keywords = $keyword;
$head_description = $introduce ? $introduce : $title;
$template = 'show';
if($MOD['template_show']) $template = $MOD['template_show'];
include template($template, $module);
?>