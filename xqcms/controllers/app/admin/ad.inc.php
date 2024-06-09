<?php
defined('IN_XQCMS') or exit('Access Denied');
$TYPE = $L['ad_type'];
XQcms::load_models('ad');
isset($pid) or $pid = 0;
isset($aid) or $aid = 0;
$menus = array (
    array('添加广告位', '?moduleid='.$moduleid.'&file='.$file.'&action=adpos_add'),
    array('广告位管理', '?moduleid='.$moduleid.'&file='.$file),
    array('广告管理', '?moduleid='.$moduleid.'&file='.$file.'&action=list'),
    array('广告审核', '?moduleid='.$moduleid.'&file='.$file.'&action=list&job=check'),
    array('更新广告', '?moduleid='.$moduleid.'&file='.$file.'&action=tohtml'),
);
$do = new ad();
$do->pid = $pid;
$do->aid = $aid;
$this_forward = '?moduleid='.$moduleid.'&file='.$file.'&action=list&pid='.$pid.'&page='.$page;
$this_place_forward = '?moduleid='.$moduleid.'&file='.$file.'&page='.$page;
switch($action) {
	case 'add':
		$pid or msg();
		if($submit) {
			$do->add($ad);
			$aid = $do->aid;
			tohtml('ad', $module);
			dmsg('添加成功', $this_forward);
		} else {
			$p = $do->fone_adpos();
			$fromtime = timetodate($XQ_TIME, 3);
			include tpl('ad_add', $module);
		}
	break;
	case 'edit':
		$aid or msg();
		if($submit) {
			$do->edit($ad);
			tohtml('ad', $module);
			dmsg('修改成功', $forward);
		} else {
		    $item = $do->fone();
			if(!$item) msg('参数错误');
			extract($item);
			$do->pid = $pid;
			$p = $do->fone_adpos();
			include tpl('ad_edit', $module);
		}
	break;
	case 'delete':
		$aids or msg('请选择广告');
		$do->delete($aids);
		dmsg('删除成功', $forward);
	break;
	case 'order_ad':
		$do->order_ad($listorder);
		tohtml('ad', $module);
		dmsg('排序成功', $forward);
	break;
	case 'list':
		$job = isset($job) ? $job : '';
		$P = $do->fadpos();
		$sfields = array('按条件', '广告名称', '广告介绍');
		$dfields = array('title', 'title', 'introduce');
		$sorder  = array('结果排序方式', '添加时间降序', '添加时间升序');
		$dorder  = array('pid DESC,listorder ASC,addtime ASC', 'addtime DESC', 'addtime ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		isset($order) && isset($dorder[$order]) or $order = 0;
		isset($typeid) or $typeid = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$order_select  = dselect($sorder, 'order', '', $order);
		$condition = $job == 'check' ? "status=2" : "status=3";
		if($pid) $condition .= " AND pid=$pid";
		if($typeid) $condition .= " AND typeid=$typeid";
		$type_select  = dselect($TYPE, 'typeid', '广告类型', $typeid);
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		$ads = $do->list_ad($condition, $dorder[$order]);
		include tpl('ad_list', $module);
	break;
	case 'adpos_add':
		if($submit) {
			$do->adpos_add($place);
			dmsg('添加成功', $forward);
		} else {
			include tpl('adpos_add', $module);
		}
	break;
	case 'adpos_edit':
		$pid or msg();
		if($submit) {
			$do->adpos_edit($place);
			dmsg('修改成功', $forward);
		} else {
			$r = $do->fone_adpos();
			$mid = $r['moduleid'];
			unset($r['moduleid']);
			extract($r);
			include tpl('adpos_edit', $module);
		}
	break;
	case 'adpos_del':
	    if(!$_founder) msg('操作错误！');
		$pids or msg('请选择广告位');
		$do->adpos_del($pids);
		dmsg('删除成功', $this_place_forward);
	break;
	case 'tohtml':
		if(!isset($num)) $num = 50;
		if(!isset($fid)) {
			$r = $db->get_one("SELECT min(aid) AS fid FROM {$XQ_PRE}ad");
			$fid = $r['fid'] ? $r['fid'] : 0;
		}
		isset($sid) or $sid = $fid;
		if(!isset($tid)) {
			$r = $db->get_one("SELECT max(aid) AS tid FROM {$XQ_PRE}ad");
			$tid = $r['tid'] ? $r['tid'] : 0;
		}
		$_moduleid = $moduleid;
		if($fid <= $tid) {
			$_result = $db->query("SELECT * FROM {$XQ_PRE}ad WHERE aid>=$fid ORDER BY aid LIMIT 0,$num");
			if($db->affected_rows($_result)) {
				while($a = $db->fetch_array($_result)) {
					$aid = $a['aid'];
					tohtml('ad', $module);
				}
				$aid += 1;
			} else {
				$aid = $fid + $num;
			}
		} else {
			dmsg('生成成功', "?moduleid=$_moduleid&file=$file");
		}
		msg('ID从'.$fid.'至'.($aid-1).'生成成功', "?moduleid=$_moduleid&file=$file&action=$action&sid=$sid&fid=$aid&tid=$tid&num=$num");
	break;
	default:
		isset($typeid) or $typeid = 0;
		$condition = '1';
		$type_select  = dselect($TYPE, 'typeid', '', $typeid);
		if($keyword) $condition .= " AND name LIKE '%$keyword%'";
		if($typeid) $condition .= " AND typeid=$typeid";
		$adpos = $do->flist_adpos($condition);
		include tpl('adpos_list', $module);
	break;
}
?>