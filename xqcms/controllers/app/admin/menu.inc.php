<?php
defined('IN_XQCMS') or exit('Access Denied');
$menu = array(
	array('������', '?moduleid=3&file=ad'),
	array('��ҳ����', '?moduleid=3&file=onepage'),
	array('��������', '?moduleid=3&file=link'),
	array('���Թ���', '?moduleid=3&file=guestbook'),
	array('ģ������', '?moduleid=3&file=config'),
);
if(!$_founder) unset($menu[4]);
?>