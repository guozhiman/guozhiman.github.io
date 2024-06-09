<?php
defined('IN_XQCMS') or exit('Access Denied');
$data='';
$data .= 'var XQPath = "'.XQ_PATH.'";';
file_put(XQ_ROOT.'/data/js/config.js', $data);
$filename = XQ_ROOT.'/'.$XQ['index'].'.'.$XQ['file_ext'];
if(!$XQ['index_html']) {
	if(is_file($filename)) unlink($filename);
	return false;
}
$xqcms_task = "moduleid=1&html=index";
$seo_title = $XQ['seo_title'];
$head_keywords = $XQ['seo_keywords'];
$head_description = $XQ['seo_description'];
ob_start();
include template('index');
$data = ob_get_contents();
ob_clean();
if($XQ['index_rela']) $data = str_replace($WEB['url'], $WEB['path'], $data);
file_put($filename, $data);
return true;
?>