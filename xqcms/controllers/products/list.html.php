<?php
defined('IN_XQCMS') or exit('Access Denied');
if(!$MOD['list_html'] || ($catid && !isset($CATEGORY[$catid]))) return false;
if(!$catid){
    $total=0;
	foreach($CATEGORY as $k=>$v){
	   if(!$v['parentid']) $total+=$ITEMS[$k];    
	}
}else{
	$CAT = get_cat($catid);
	unset($CAT['moduleid']);
	extract($CAT);
	$total = $ITEMS[$catid];
}
$con = 'status=3';
if($catid) $con .= ($CAT['child']) ? " AND catid IN (".$CAT['arrchildid'].")" : " AND catid=$catid";
if($page == 1) {
	$items = $db->count($table, $con);
	if($items != $total) {
		$total = $items;
		if($catid) $db->query("UPDATE {$XQ_PRE}category SET items=$items WHERE catid=$catid");
	}
}
$template =$MOD['template_index'] ? $MOD['template_index'] : 'index';
$total = max(ceil($total/$MOD['pagesize']), 1);
if(isset($fid) && isset($num)) {
	$page = $fid;
	$topage = $fid + $num - 1;
	$total = $topage < $total ? $topage : $total;
}
for(; $page <= $total; $page++) {
	include XQ_ROOT.'/app/seo.php';
	$seo_title = $catid ? $seo_cattitle.$seo_page.$seo_modulename.$seo_delimiter.$seo_sitename : $seo_modulename.$seo_delimiter.$seo_sitename;
	$xqcms_task = "moduleid=$moduleid&html=list&catid=$catid&page=$page";
	$filename = XQ_ROOT.'/'.$MOD['moduledir'].'/'.listurl($moduleid, $catid, $page, $CATEGORY, $MOD);
	ob_start();
	global $pages;
	include template($template, $module);
	$data = ob_get_contents();
	ob_clean();
	if($XQ['pcharset']) $filename = convert($filename, XQ_CHARSET, $XQ['pcharset']);
	file_put($filename, $data);
	if($page == 1) {
		$indexname = XQ_ROOT.'/'.$MOD['moduledir'].'/'.listurl($moduleid, $catid, 0, $CATEGORY, $MOD);
		if($XQ['pcharset']) $indexname = convert($indexname, XQ_CHARSET, $XQ['pcharset']);
		file_copy($filename, $indexname);
	}
}
return true;
?>