<?php
defined('IN_XQCMS') or exit('Access Denied');
$menu = array(
	array("���".$name, "?moduleid=$moduleid&action=add"),
	array($name."�б�", "?moduleid=$moduleid"),
	array("���".$name, "?moduleid=$moduleid&action=check"),
	array($name."����", "?file=category&mid=$moduleid"),
	array("������ҳ", "?file=html&mid=$moduleid"),
	array("ģ������", "?moduleid=$moduleid&file=config"),
);
if(!$_founder) unset($menu[5]);  
?>