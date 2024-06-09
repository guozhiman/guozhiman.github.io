<?php 
defined('IN_XQCMS') or exit('Access Denied');
if(!$aid) return false;
$a or $a = $db->get_one("SELECT * FROM {$XQ_PRE}ad WHERE aid=$aid");
$p = $db->get_one("SELECT * FROM {$XQ_PRE}ad_position WHERE pid=$a[pid] AND open=1");
if(!$p) return false;
$ad_moduleid = $p['moduleid']; 
$pid = $p['pid'];
$typeid = $p['typeid'];
$width = $p['width'];
$height = $p['height'];
$fileroot = XQ_CACHE.'/ad/';
$filename = $fileroot.'ad_'.$a['pid'].'.htm';
if($p['code']) file_put($filename.'.htm', $p['code']);
if($typeid == 5) {
	$tags = array();
	$ad = $db->query("SELECT * FROM {$XQ_PRE}ad WHERE pid=$p[pid] AND status=3 ORDER BY listorder ASC,addtime ASC");
	while($t = $db->fetch_array($ad)) {
		$t['title'] = $t['image_alt'];
		$t['thumb'] = $t['image_src'];
		$t['url'] =$t['url'];
		$tags[] = $t;
	}
	if($tags) {
		ob_start();
		include XQ_ROOT.'/'.$module.'/ad.php';
		$data = ob_get_contents();
		ob_clean();
		file_put($filename,$data);
	} else {
		file_del($filename);
	}
} else {
	$ad = $db->get_one("SELECT * FROM {$XQ_PRE}ad WHERE pid=$p[pid] AND status=3  ORDER BY addtime ASC");
	if($ad) {
		extract($ad);
		if($typeid == 3) {
			if(strtolower(file_ext($image_src)) == 'swf') {
				$typeid = 4;
				$flash_src = $image_src;
			}
		} else if($typeid == 4) {
			if(in_array(strtolower(file_ext($flash_src)), array('jpg', 'jpeg', 'png', 'gif', 'bmp'))) {
				$typeid = 3;
				$image_src = $flash_src;
			}
		}
		ob_start();
		include XQ_ROOT.'/'.$module.'/ad.php';
		$data = ob_get_contents();
		ob_clean();
		file_put($filename,$data);
	} else {
		file_del($filename);
	}
}
return true;
?>