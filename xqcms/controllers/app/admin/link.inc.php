<?php
defined('IN_XQCMS') or exit('Access Denied');
$TYPE = get_type('link', 1);
$TYPE or msg('����������ӷ���', '?file=type&item=link');
XQcms::load_models('link');
$do = new flink();
$menus = array (
    array('�������', '?moduleid='.$moduleid.'&file='.$file.'&action=add'),
    array('�����б�', '?moduleid='.$moduleid.'&file='.$file),
    array('�������', '?moduleid='.$moduleid.'&file='.$file.'&action=check'),
    array('���ӷ���', '?file=type&item=link'),
);
if(in_array($action, array('', 'check'))) {
	$stype  = array('����', '����', 'LOGO');
	$XQype  = array('0', '1', '2');
	$tid = isset($tid) ? intval($tid) : 0;
	$type = isset($type) ? intval($type) : 0;
	$type_select = type_select('link', 1, 'tid', '��ѡ�����', $tid);
	$_type_select  = dselect($stype, 'type', '', $type);
	$condition = '';
	if($kw) $condition .= " AND title LIKE '%$keyword%'";
	if($tid) $condition .= " AND tid=$tid";
	if($type) $condition .= $type == 1 ? " AND thumb=''" : " AND thumb!=''";
}
switch($action) {
	case 'add':
		if($submit) {
			$do->add($post);
			dmsg('��ӳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&tid='.$post['tid']);
		} else {
			foreach($do->fields as $v) {
				isset($$v) or $$v = '';
			}
			$url = 'http://';
			$status = 3;
			$addtime = timetodate($XQ_TIME);
			$menuid = 0;
			include tpl('link_edit', $module);
		}
	break;
	case 'edit':
		$id or msg();
		$do->id = $id;
		if($submit) {
			$do->edit($post);
			dmsg('�޸ĳɹ�', $forward);
		} else {
			$item = $do->fone();
			if(!$item) msg('��������');
			extract($item);
			include tpl('link_edit', $module);
		}
	break;
	case 'check':
		if($id) {
			$do->check($id);
			dmsg('��˳ɹ�', $forward);
		} else {
			$lists = $do->flist("status=2".$condition, 'listorder DESC,id DESC');
			include tpl('link_check', $module);
		}
	break;
	case 'order':
		$do->order($listorder); 
		dmsg('����ɹ�', $forward);
	break;
	case 'delete':
		$id or msg('��ѡ������');
		$do->delete($id);
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$lists = $do->flist("status=3".$condition, 'listorder DESC,id DESC');
		include tpl('link', $module);
	break;
}
?>