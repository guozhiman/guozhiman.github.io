<?php
defined('IN_XQCMS') or exit('Access Denied');
XQcms::load_models('guestbook');
$do = new guestbook();
$menus = array (
    array('�����б�', '?moduleid='.$moduleid.'&file='.$file),
);
$condition = '1';
if($kw) $condition .= " AND title LIKE '%$kw%'";
switch($action) {
	case 'edit':
		$id or msg();
		$do->id = $id;
		if($submit) {
			$do->edit($post);
			dmsg('�޸ĳɹ�', $forward);

		} else {
			extract($do->fone());
			$addtime = timetodate($addtime);
			include tpl('guestbook_edit', $module);
		}
	break;
	case 'check':
		$id or msg('��ѡ������');
		$do->check($id, $status);
		dmsg('���óɹ�', $forward);
	break;
	case 'delete':
		$id or msg('��ѡ������');
		$do->delete($id);
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$lists = $do->flist($condition, 'id DESC');
		include tpl('guestbook', $module);
	break;
}
?>