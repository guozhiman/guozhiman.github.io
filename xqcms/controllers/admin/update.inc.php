<?php
defined('IN_XQCMS') or exit('Access Denied');
switch($action) {
	case 'cache':
		cache_clear('php', 'dir', 'tpl');
		cache_clear('cat');
		cache_category();
		msg('缓存更新成功', '?file='.$file.'&action=module');
	break;
	case 'all':
		msg('全站更新成功');
	break;
	case 'index':
		tohtml('index');
		msg('网站首页生成成功', '?file='.$file.'&action=all');
	break;
	case 'back':
		$mids = 0;
		$KEYS = array_keys($MODULE);
		foreach($KEYS as $k => $v) {
			if($v == $mid) { $mids = $k; break; }
		}
		msg('['.$MODULE[$mid]['name'].'] 更新成功', '?file=update&action=module&mids='.($mids+1));
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
				msg('模块更新成功', '?file=update&action=index');
			}		
		} else {
			$mids = 1;
			msg('开始更新模块', '?file='.$file.'&action='.$action.'&mids='.$mids);
		}
	break;
	default:
		msg('正在开始更新全站', '?file='.$file.'&action=cache');
	break;
}
?>