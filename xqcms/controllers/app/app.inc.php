<?php 
defined('IN_XQCMS') or exit('Access Denied');
require 'common.inc.php';
$task_item or $task_item = 3600;
if($html == 'onepage') {
	$id or exit;
	$r = $db->get_one("SELECT url FROM {$XQ_PRE}onepage WHERE id=$id AND islink=0");
	$r or exit;
	$db->query("UPDATE {$XQ_PRE}onepage SET hits=hits+1 WHERE id=$id");
	if($XQ_TIME - @filemtime(XQ_ROOT.'/'.$r['url']) > $task_item) tohtml('onepage', $module);
}
?>