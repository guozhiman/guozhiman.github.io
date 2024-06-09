<?php
defined('IN_XQCMS') or exit('Access Denied');
XQcms::load_xq_class('admin');
$do = new admin;
$menus = array (
    array('我的面板', '?file='.$file),
);
if($submit) {
	if($do->update($_userid, $right, $_admin)) dmsg('更新成功', '?file='.$file.'&update=1');
	msg();
} else {
	$dmenus = $do->get_menu($_userid);
	include tpl('mymenu');
}
?>