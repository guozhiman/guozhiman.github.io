<?php
@set_time_limit(0);
@ignore_user_abort(true);
require '../global.php';
isset($html) or $html = '';
if($html) {
	$task_index = $XQ['task_index'] ? $XQ['task_index'] : 600;
	$task_list = $XQ['task_list'];
	$task_item = $XQ['task_item'];
	if($moduleid == 1) {
		if($XQ['index_html'] && $XQ_TIME - @filemtime(XQ_ROOT.'/'.$XQ['index'].'.'.$XQ['file_ext']) > $task_index) tohtml('index');
	} else {
		$task_file = XQ_SYSROOT.'/controllers/'.$module.'/app.inc.php';
		if(is_file($task_file)) @include $task_file;
	}
}
?>