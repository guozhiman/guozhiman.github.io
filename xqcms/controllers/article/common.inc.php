<?php 
defined('IN_XQCMS') or exit('Access Denied');
XQcms::load_xq_func('module');
$CATEGORY = cache_read('category-'.$moduleid.'.php');
$ITEMS = cache_read('cateitem-'.$moduleid.'.php');
$table = $XQ_PRE.$module.'_'.$moduleid;
?>