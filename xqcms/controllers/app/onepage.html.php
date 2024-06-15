<?php 
defined('IN_XQCMS') or exit('Access Denied');
if(!$id) return false;
$item = $db->get_one("SELECT * FROM {$XQ_PRE}onepage WHERE id=$id AND islink=0");
if(!$item) return false;
$_cid = $item['cid'];
unset($item['cid']);
extract($item);
$head_title = $seo_title ? $seo_title : $title;
$head_keywords = $seo_keywords;
$head_description = $seo_description;
$xqcms_task = "moduleid=$moduleid&html=onepage&id=$id";
ob_start();
include template('onepage', $module);
$data = ob_get_contents();
ob_clean();
file_put(XQ_ROOT.'/'.$url, $data);
return true;
?>