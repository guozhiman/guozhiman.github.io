<?php
defined('IN_XQCMS') or exit('Access Denied');
$TYPE = get_type('link', 1);
$TYPE or msg('请先添加链接分类', '?file=type&item=link');
XQcms::load_models('link');
$do = new flink();
$menus = array (
    array('添加链接', '?moduleid='.$moduleid.'&file='.$file.'&action=add'),
    array('链接列表', '?moduleid='.$moduleid.'&file='.$file),
    array('审核链接', '?moduleid='.$moduleid.'&file='.$file.'&action=check'),
    array('链接分类', '?file=type&item=link'),
);
if(in_array($action, array('', 'check'))) {
	$stype  = array('类型', '文字', 'LOGO');
	$XQype  = array('0', '1', '2');
	$tid = isset($tid) ? intval($tid) : 0;
	$type = isset($type) ? intval($type) : 0;
	$type_select = type_select('link', 1, 'tid', '请选择分类', $tid);
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
			dmsg('添加成功', '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&tid='.$post['tid']);
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
			dmsg('修改成功', $forward);
		} else {
			$item = $do->fone();
			if(!$item) msg('参数错误');
			extract($item);
			include tpl('link_edit', $module);
		}
	break;
	case 'check':
		if($id) {
			$do->check($id);
			dmsg('审核成功', $forward);
		} else {
			$lists = $do->flist("status=2".$condition, 'listorder DESC,id DESC');
			include tpl('link_check', $module);
		}
	break;
	case 'order':
		$do->order($listorder); 
		dmsg('排序成功', $forward);
	break;
	case 'delete':
		$id or msg('请选择链接');
		$do->delete($id);
		dmsg('删除成功', $forward);
	break;
	default:
		$lists = $do->flist("status=3".$condition, 'listorder DESC,id DESC');
		include tpl('link', $module);
	break;
}
?>