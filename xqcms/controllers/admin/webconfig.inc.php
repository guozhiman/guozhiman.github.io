<?php
defined('IN_XQCMS') or exit('Access Denied');
$menus = array (
    array('��������'),
	array('��ϵ��ʽ'),
    array('SEO�Ż�'),
	array('�����ϴ�����'),
	array('����������'),
    array('�������Ż�'),
);
$tab = isset($tab) ? intval($tab) : 0;
if($submit) {
	if(isset($_SESSION['uploads'])) unset($_SESSION['uploads']);
	if(!is_writable(XQ_ROOT.'/web.config.php')) msg('Please chmod ./web.config.php to '.XQ_CHMOD);
	$tmp = file_get(XQ_ROOT.'/web.config.php');
	foreach($config as $k=>$v)	{
		$tmp = preg_replace("/[$]WEB\['$k'\]\s*\=\s*[\"'].*?[\"']/is", "\$WEB['$k'] = '$v'", $tmp);
	}
	file_put(XQ_ROOT.'/web.config.php', $tmp);
	update_setting($moduleid, $setting);
	cache_module(1);
	cache_module();
	if($setting['countval']>$setting['webcount']) $db->query("UPDATE LOW_PRIORITY {$db->pre}config SET value={$setting['countval']} WHERE name='webcount'");
	$filename = XQ_ROOT.'/'.$setting['index'].'.'.$setting['file_ext'];
	if(!$setting['ishtml'] && $setting['file_ext'] != 'php') @unlink($filename);
	dmsg('���³ɹ�', '?moduleid='.$moduleid.'&file='.$file.'&tab='.$tab);
} else {
	$tab = isset($tab) ? intval($tab) : 0;
	$all = isset($all) ? intval($all) : 0;
	extract(dhtmlspecialchars($WEB));
	extract(dhtmlspecialchars($XQ));
	$r = $db->get_one("SELECT value FROM {$db->pre}config WHERE name='webcount'");
	$webcount=$r['value'];
	include tpl('webconfig');
}
?>