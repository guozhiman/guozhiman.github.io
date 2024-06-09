<?php
require 'global.php';
	if($XQ['index_html']) {
		$html_file = XQ_ROOT.'/'.$XQ['index'].'.'.$XQ['file_ext'];
		if(!is_file($html_file)) tohtml('index');
		include($html_file);
		exit;
	}
    $seo_title = $XQ['seo_title'];
	include template('index');
?>