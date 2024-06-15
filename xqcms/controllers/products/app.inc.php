<?php 
defined('IN_XQCMS') or exit('Access Denied');
require 'common.inc.php';
if($html == 'show') {
	$id or exit;
	$item = $db->get_one("SELECT * FROM {$table} WHERE id=$id AND status>2");
	$item or exit;
	extract($item);
	$update = '';
	include XQ_ROOT.'/app/update.php';
	echo 'Inner("hits", \''.$item['hits'].'\');';
	if($MOD['show_html'] && $task_item && $XQ_TIME - @filemtime(XQ_ROOT.'/'.$MOD['moduledir'].'/'.$item['url']) > $task_item) tohtml('show', $module);
} else if($html == 'list') {
	if($MOD['list_html'] && $task_list && $XQ_TIME - @filemtime(XQ_ROOT.'/'.$MOD['moduledir'].'/'.listurl($moduleid, $catid, $page, $CATEGORY, $MOD)) > $task_list) {
	    $catid=$catid;
		$fid = $page;
		$num = 3;
		tohtml('list', $module);
	}
}
?>