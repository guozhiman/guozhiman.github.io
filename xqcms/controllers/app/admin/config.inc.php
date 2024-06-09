<?php
defined('IN_XQCMS') or exit('Access Denied');
$menus = array (
    array('模块设置'),
);
$tab = isset($tab) ? intval($tab) : 0;
$all = isset($all) ? intval($all) : 0;
if($submit) {
	update_setting($moduleid, $setting);
	cache_module($moduleid);
	dmsg('更新成功', '?moduleid='.$moduleid.'&file='.$file.'&tab='.$tab);
} else {
	extract(dhtmlspecialchars($MOD));
	include tpl('config', $module);
}
?>