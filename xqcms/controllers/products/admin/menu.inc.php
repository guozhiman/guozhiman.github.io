<?php
defined('IN_XQCMS') or exit('Access Denied');
$menu = array(
	array("添加".$name, "?moduleid=$moduleid&action=add"),
	array($name."列表", "?moduleid=$moduleid"),
	array("审核".$name, "?moduleid=$moduleid&action=check"),
	array($name."分类", "?file=category&mid=$moduleid"),
	array("更新网页", "?file=html&mid=$moduleid"),
	array("模块设置", "?moduleid=$moduleid&file=config"),
);
if(!$_founder) unset($menu[5]);  
?>