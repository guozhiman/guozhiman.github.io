<?php
defined('IN_XQCMS') or exit('Access Denied');
XQcms::load_models('article');
$do = new article($moduleid);
$menus = array (
    array('添加'.$MOD['name'], '?moduleid='.$moduleid.'&action=add'),
    array($MOD['name'].'列表', '?moduleid='.$moduleid),
    array('审核'.$MOD['name'], '?moduleid='.$moduleid.'&action=check'),
    array('回收站', '?moduleid='.$moduleid.'&action=recycle'),
);

if(in_array($action, array('', 'check', 'recycle'))) {
	$posid = isset($posid) ? intval($posid) : 0;
	$posid_select = posid_select('posid', '位置属性', $posid);
	$condition = '';
	if($_childs) $condition .= " AND catid IN (".$_childs.")";
	if($kw) $condition .= " AND title LIKE '%$kw%'";
	if($catid) $condition .= ($CATEGORY[$catid]['child']) ? " AND catid IN (".$CATEGORY[$catid]['arrchildid'].")" : " AND catid=$catid";
	if($posid) $condition .= " AND posid LIKE '%$posid%'";
}
switch($action) {
	case 'add':
		if($submit) {
			$do->add($post);
			dmsg('添加成功', '?moduleid='.$moduleid.'&action='.$action.'&catid='.$post['catid']);
		} else {
			$status = 3;
			$username = $_username;
			$addtime = timetodate($XQ_TIME);
			$item = array();
			$menuid = 0;
			$tname = $menus[$menuid][0];
			include tpl('edit', $module);
		}
	break;
	case 'edit':
		$id or msg();
		$do->id = $id;
		if($submit) {
			$do->edit($post);
			dmsg('修改成功', $forward);
		} else {
			$item = $do->fone();
			if(!$item) msg('参数错误');
			extract($item);
			$addtime = timetodate($addtime);
			$menuon = array('4', '3', '2', '1');
			$menuid = $menuon[$status];
			$tname = '修改'.$MOD['name'];
			include tpl($action, $module);
		}
	break;
	case 'update':
		is_array($id) or msg('请选择'.$MOD['name']);
		foreach($id as $v) {
			$do->update($v);
		}
		dmsg('更新成功', $forward);
	break;
	case 'order':
		$do->order($listorder);
		dmsg('排序成功', $forward);
	break;
	case 'tohtml':
		is_array($id) or msg('请选择'.$MOD['name']);
		$html_ids = $id;
		foreach($html_ids as $id) {
			tohtml('show', $module);
		}
		dmsg('更新成功', $forward);
	break;
	case 'delete':
		$id or msg('请选择'.$MOD['name']);
		isset($recycle) ? $do->recycle($id) : $do->delete($id);
		dmsg('删除成功', $forward);
	break;
	case 'restore':
		$id or msg('请选择'.$MOD['name']);
		$do->restore($id);
		dmsg('还原成功', $forward);
	break;
	case 'clear':
		$do->clear();
		dmsg('清空成功', $forward);
	break;
	case 'posid':
		$id or msg('请选择'.$MOD['name']);
		$posid = @implode(",",$posid);
		$do->posid($id, $posid);
		dmsg('设置成功', $forward);
	break;
	case 'recycle':
		$lists = $do->flist('status=0'.$condition, 'listorder DESC,addtime DESC');
		$menuid = 3;
		include tpl('index', $module);
	break;
	case 'check':
		if($id) {
			$do->check($id);
			dmsg('审核成功', $forward);
		} else {
			$lists = $do->flist('status=2'.$condition, 'listorder DESC,addtime DESC');
			$menuid = 2;
			include tpl('index', $module);
		}
	break;
	default:
		$lists = $do->flist('status=3'.$condition, 'listorder DESC,addtime DESC');
		$menuid = 1;
		include tpl('index', $module);
	break;
}
?>