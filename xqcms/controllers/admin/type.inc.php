<?php
defined('IN_XQCMS') or exit('Access Denied');
isset($item) or msg();
XQcms::load_xq_class('type');
$menus = array();
$do = new dtype;
$do->item = $item;
$do->cache = 1;
if($submit) {
	$do->update($post);
	dmsg('���³ɹ�', '?file='.$file.'&item='.$item);
} else {
	$lists = $do->flist();
	include tpl('type');
}
?>