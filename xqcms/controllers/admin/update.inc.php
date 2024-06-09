<?php
defined('IN_XQCMS') or exit('Access Denied');
switch($action) {
	case 'cache':
		cache_clear('php', 'dir', 'tpl');
		cache_clear('cat');
		cache_category();
		msg('������³ɹ�', '?file='.$file.'&action=module');
	break;
	case 'all':
		msg('ȫվ���³ɹ�');
	break;
	case 'index':
		tohtml('index');
		msg('��վ��ҳ���ɳɹ�', '?file='.$file.'&action=all');
	break;
	case 'back':
		$mids = 0;
		$KEYS = array_keys($MODULE);
		foreach($KEYS as $k => $v) {
			if($v == $mid) { $mids = $k; break; }
		}
		msg('['.$MODULE[$mid]['name'].'] ���³ɹ�', '?file=update&action=module&mids='.($mids+1));
	break;
	case 'module':
		if(isset($mids)) {
			$KEYS = array_keys($MODULE);
			if(isset($KEYS[$mids])) {
				$bmoduleid = $moduleid = $KEYS[$mids];
				if($moduleid>4 && !$MODULE[$moduleid]['islink']) {	
					msg('', '?mid='.$moduleid.'&file=html&action=all&one=1');
				} else {
				    msg('', '?file='.$file.'&action='.$action.'&mids='.($mids+1));
				}
			} else {
				msg('ģ����³ɹ�', '?file=update&action=index');
			}		
		} else {
			$mids = 1;
			msg('��ʼ����ģ��', '?file='.$file.'&action='.$action.'&mids='.$mids);
		}
	break;
	default:
		msg('���ڿ�ʼ����ȫվ', '?file='.$file.'&action=cache');
	break;
}
?>