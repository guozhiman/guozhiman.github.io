<?php
defined('IN_XQCMS') or exit('Access Denied');
$menus = array (
    array('基本设置'),
    array('静态设置'),
);
$tab = isset($tab) ? intval($tab) : 0;
$all = isset($all) ? intval($all) : 0;
if($submit) {
	update_setting($moduleid, $setting);
	cache_module($moduleid);
	if($setting['htm_list_prefix'] != $MOD['htm_list_prefix'] || $setting['list_html'] != $MOD['list_html']) {
		foreach($CATEGORY as $c) {
			update_category($moduleid, $c['catid'], $CATEGORY, $setting);
		}
		cache_category($moduleid);
	}
	if($setting['htm_item_prefix'] != $MOD['htm_item_prefix'] || $setting['show_html'] != $MOD['show_html']) {
		msg('设置保存成功，开始更新地址', '?mid='.$moduleid.'&file=html&action=show&update=1&num=1000');
	}
	dmsg('更新成功', '?moduleid='.$moduleid.'&file='.$file.'&tab='.$tab);
} else {
	$r = $db->get_one("SELECT MAX(id) AS maxid FROM {$table}");
	$maxid = $r['maxid'];
	extract(dhtmlspecialchars($MOD));
	include tpl('config', $module);
}
?>