<?php
defined('IN_XQCMS') or exit('Access Denied');
$menu_system = array(
	array('网站设置', '?file=webconfig'),
	array('模块管理', '?file=module'),
	array('管理员管理', '?file=admin'),
);
if(!$_founder) unset($menu_system[1]);
?>