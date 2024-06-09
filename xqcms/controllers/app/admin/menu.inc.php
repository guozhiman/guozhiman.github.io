<?php
defined('IN_XQCMS') or exit('Access Denied');
$menu = array(
	array('广告管理', '?moduleid=3&file=ad'),
	array('单页管理', '?moduleid=3&file=onepage'),
	array('友情链接', '?moduleid=3&file=link'),
	array('留言管理', '?moduleid=3&file=guestbook'),
	array('模块设置', '?moduleid=3&file=config'),
);
if(!$_founder) unset($menu[4]);
?>