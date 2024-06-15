<?php 
defined('IN_XQCMS') or exit('Access Denied');
require 'common.inc.php';
$id or dheader($MOD['url']);
$item = $db->get_one("SELECT * FROM {$table} WHERE id=$id AND status>2");
if($item) {
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

if($thumb){
	$thumb_m = str_replace('.thumb.', '.middle.', $thumb);
	$thumbname = explode(file_ext($thumb),$thumb) ;
	$thumb_l=$thumbname[0].file_ext($thumb);
}else{
	$thumb=$thumb_m=$thumb_l=XQ_STYLE.'images/nopic.gif';
}
$update = '';
include XQ_ROOT.'/app/update.php';
include XQ_ROOT.'/app/seo.php';
$seo_title = $seo_showtitle.$seo_delimiter.$seo_catname.$seo_modulename.$seo_delimiter.$seo_sitename;
$head_keywords = $keyword;
$head_description = $introduce ? $introduce : $title;
$template = 'show';
if($MOD['template_show']) $template = $MOD['template_show'];
include template($template, $module);
?>