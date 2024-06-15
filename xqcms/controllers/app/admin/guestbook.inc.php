<?php
defined('IN_XQCMS') or exit('Access Denied');
XQcms::load_models('guestbook');
$do = new guestbook();
$menus = array (
    array('留言列表', '?moduleid='.$moduleid.'&file='.$file),
);
$condition = '1';
if($kw) $condition .= " AND title LIKE '%$kw%'";
switch($action) {
	case 'edit':
		$id or msg();
		$do->id = $id;
		if($submit) {
			$do->edit($post);
			dmsg('修改成功', $forward);

		} else {
			extract($do->fone());
			$addtime = timetodate($addtime);
			include tpl('guestbook_edit', $module);
		}
	break;
	case 'check':
		$id or msg('请选择留言');
		$do->check($id, $status);
		dmsg('设置成功', $forward);
	break;
	case 'delete':
		$id or msg('请选择留言');
		$do->delete($id);
		dmsg('删除成功', $forward);
	break;
	default:
		$lists = $do->flist($condition, 'id DESC');
		include tpl('guestbook', $module);
	break;
}
?>