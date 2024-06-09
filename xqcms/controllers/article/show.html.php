<?php 
defined('IN_XQCMS') or exit('Access Denied');
if(!$MOD['show_html'] || !$id) return false;
$item = $db->get_one("SELECT * FROM {$table} WHERE id=$id AND status=3 AND islink=0");
if(!$item) return false;
extract($item);
if($fromurl) $fromurl = fix_link($fromurl);
$fileurl = $url;
$pages = '';
$total = 1;
if(strpos($content, '[pagebreak]') !== false) {
	$contents = explode('[pagebreak]', $content);
	$total = count($contents);
}
include XQ_ROOT.'/app/seo.php';
$seo_title = $seo_showtitle.$seo_delimiter.$seo_catname.$seo_modulename.$seo_delimiter.$seo_sitename;
$head_keywords = $keyword;
$head_description = $introduce ? $introduce : $title;
$template = 'show';
if($MOD['template_show']) $template = $MOD['template_show'];
for(; $page <= $total; $page++) {
	$xqcms_task = "moduleid=$moduleid&html=show&id=$id&page=$page";
	$filename = $total == 1 ? XQ_ROOT.'/'.$MOD['moduledir'].'/'.$fileurl : XQ_ROOT.'/'.$MOD['moduledir'].'/'.itemurl($item, $page);
	if($total > 1) {
		$pages = showpages($item, $total, $page);
		$content = $contents[$page-1];
	}
	ob_start();
	include template($template, $module);
	$data = ob_get_contents();
	ob_clean();
	if($XQ['pcharset']) $filename = convert($filename, XQ_CHARSET, $XQ['pcharset']);
	file_put($filename, $data);
	if($page == 1 && $total > 1) {
		$indexname = XQ_ROOT.'/'.$MOD['moduledir'].'/'.itemurl($item, 0);
		if($XQ['pcharset']) $indexname = convert($indexname, XQ_CHARSET, $XQ['pcharset']);
		file_copy($filename, $indexname);
	}
}
return true;
?>