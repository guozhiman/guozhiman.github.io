<?php
defined('IN_XQCMS') or exit('Access Denied');
$TYPE = $L['ad_type'];
XQcms::load_models('ad');
isset($pid) or $pid = 0;
isset($aid) or $aid = 0;
$menus = array (
    array('��ӹ��λ', '?moduleid='.$moduleid.'&file='.$file.'&action=adpos_add'),
    array('���λ����', '?moduleid='.$moduleid.'&file='.$file),
    array('������', '?moduleid='.$moduleid.'&file='.$file.'&action=list'),
    array('������', '?moduleid='.$moduleid.'&file='.$file.'&action=list&job=check'),
    array('���¹��', '?moduleid='.$moduleid.'&file='.$file.'&action=tohtml'),
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
			dmsg('��ӳɹ�', $this_forward);
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
			dmsg('�޸ĳɹ�', $forward);
		} else {
		    $item = $do->fone();
			if(!$item) msg('��������');
			extract($item);
			$do->pid = $pid;
			$p = $do->fone_adpos();
			include tpl('ad_edit', $module);
		}
	break;
	case 'delete':
		$aids or msg('��ѡ����');
		$do->delete($aids);
		dmsg('ɾ���ɹ�', $forward);
	break;
	case 'order_ad':
		$do->order_ad($listorder);
		tohtml('ad', $module);
		dmsg('����ɹ�', $forward);
	break;
	case 'list':
		$job = isset($job) ? $job : '';
		$P = $do->fadpos();
		$sfields = array('������', '�������', '������');
		$dfields = array('title', 'title', 'introduce');
		$sorder  = array('�������ʽ', '���ʱ�併��', '���ʱ������');
		$dorder  = array('pid DESC,listorder ASC,addtime ASC', 'addtime DESC', 'addtime ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		isset($order) && isset($dorder[$order]) or $order = 0;
		isset($typeid) or $typeid = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$order_select  = dselect($sorder, 'order', '', $order);
		$condition = $job == 'check' ? "status=2" : "status=3";
		if($pid) $condition .= " AND pid=$pid";
		if($typeid) $condition .= " AND typeid=$typeid";
		$type_select  = dselect($TYPE, 'typeid', '�������', $typeid);
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		$ads = $do->list_ad($condition, $dorder[$order]);
		include tpl('ad_list', $module);
	break;
	case 'adpos_add':
		if($submit) {
			$do->adpos_add($place);
			dmsg('��ӳɹ�', $forward);
		} else {
			include tpl('adpos_add', $module);
		}
	break;
	case 'adpos_edit':
		$pid or msg();
		if($submit) {
			$do->adpos_edit($place);
			dmsg('�޸ĳɹ�', $forward);
		} else {
			$r = $do->fone_adpos();
			$mid = $r['moduleid'];
			unset($r['moduleid']);
			extract($r);
			include tpl('adpos_edit', $module);
		}
	break;
	case 'adpos_del':
	    if(!$_founder) msg('��������');
		$pids or msg('��ѡ����λ');
		$do->adpos_del($pids);
		dmsg('ɾ���ɹ�', $this_place_forward);
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
			dmsg('���ɳɹ�', "?moduleid=$_moduleid&file=$file");
		}
		msg('ID��'.$fid.'��'.($aid-1).'���ɳɹ�', "?moduleid=$_moduleid&file=$file&action=$action&sid=$sid&fid=$aid&tid=$tid&num=$num");
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