<?php
defined('IN_XQCMS') or exit('Access Denied');
$menu_system = array(
	array('��վ����', '?file=webconfig'),
	array('ģ�����', '?file=module'),
	array('����Ա����', '?file=admin'),
);
if(!$_founder) unset($menu_system[1]);
?>