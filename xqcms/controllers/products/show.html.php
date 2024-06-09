<?php 
defined('IN_XQCMS') or exit('Access Denied');
if(!$MOD['show_html'] || !$id) return false;
$item = $db->get_one("SELECT * FROM {$table} WHERE id=$id AND status>2");
if(!$item) return false;
extract($item);
if($thumb){
	$thumb_m = str_replace('.thumb.', '.middle.', $thumb);
	$thumbname = explode(file_ext($thumb),$thumb) ;
	$thumb_l=$thumbname[0].file_ext($thumb);
}else{
	$thumb=$thumb_m=$thumb_l=XQ_STYLE.'images/nopic.gif';
}
include XQ_ROOT.'/app/seo.php';
$seo_title = $seo_showtitle.$seo_delimiter.$seo_catname.$seo_modulename.$seo_delimiter.$seo_sitename;
$head_keywords = $keyword;
$head_description = $introduce ? $introduce : $title;
$template = 'show';
if($MOD['template_show']) $template = $MOD['template_show'];
$xqcms_task = "moduleid=$moduleid&html=show&id=$id";
ob_start();
include template($template, $module);
$data = ob_get_contents();
ob_clean();
$filename = XQ_ROOT.'/'.$MOD['moduledir'].'/'.$url;
if($XQ['pcharset']) $filename = convert($filename, XQ_CHARSET, $XQ['pcharset']);
file_put($filename, $data);
return true;
?>