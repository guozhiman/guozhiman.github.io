<?php
defined('IN_XQCMS') or exit('Access Denied');
XQcms::load_models('onepage');	
isset($cid) or $cid = 1;
$do = new onepage();
$do->cid = $cid;
$menus = array (
    array('��ӵ�ҳ', '?moduleid='.$moduleid.'&file='.$file.'&item='.$item.'&action=add'),
    array('��ҳ�б�', '?moduleid='.$moduleid.'&file='.$file.'&item='.$item),
    array('���ɵ�ҳ', '?moduleid='.$moduleid.'&file='.$file.'&item='.$item.'&action=html'),
);
$this_forward = '?moduleid='.$moduleid.'&file='.$file.'&item='.$item;
switch($action) {
	case 'add':
		if($submit) {
			$do->add($post);
			dmsg('��ӳɹ�', $forward);
		} else {
			$filepath = 'us/';
			$filename = '';
			$status=1;
			$menuid = 0;
			include tpl('onepage_edit', $module);
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
			if($islink) {
				$filepath = $filename = '';
			} else {
				$filestr = str_replace(XQ_URL, '', $url);
				$filepath = strpos($filestr, '/') !== false ? dirname($filestr).'/' : '';
				$filename = basename($filestr);
			}
			$menuid = 1;
			include tpl('onepage_edit', $module);
		}
	break;
	case 'order':
		$do->order($listorder);
		dmsg('����ɹ�', $forward);
	break;
	case 'html':
		if(!isset($num)) {
			$num = 50;
		}
		if(!isset($fid)) {
			$r = $db->get_one("SELECT min(id) AS fid FROM {$XQ_PRE}onepage");
			$fid = $r['fid'] ? $r['fid'] : 0;
		}
		isset($sid) or $sid = $fid;
		if(!isset($tid)) {
			$r = $db->get_one("SELECT max(id) AS tid FROM {$XQ_PRE}onepage");
			$tid = $r['tid'] ? $r['tid'] : 0;
		}
		if($fid <= $tid) {
			$result = $db->query("SELECT id FROM {$XQ_PRE}onepage WHERE id>=$fid ORDER BY id LIMIT 0,$num");
			if($db->affected_rows($result)) {
				while($r = $db->fetch_array($result)) {
					$id = $r['id'];
					tohtml('onepage', $module);
				}
				$id += 1;
			} else {
				$id = $fid + $num;
			}
		} else {
			dmsg('���ɳɹ�', "?moduleid=$moduleid&file=$file");
		}
		msg('ID��'.$fid.'��'.($id-1).'���ɳɹ�', "?moduleid=$moduleid&file=$file&action=$action&sid=$sid&fid=$id&tid=$tid&num=$num");
	break;
	case 'delete':
		$id or msg('��ѡ��');
		$do->delete($id);
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$lists = $do->flist("cid='$cid'", 'listorder DESC,id DESC');
		include tpl('onepage', $module);
	break;
}
?>