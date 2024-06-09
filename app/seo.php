<?php
defined('IN_XQCMS') or exit('Access Denied');
$seo_modulename = $MOD['menuname'];
$seo_sitename = $XQ['sitename'];
$seo_sitetitle = $XQ['seo_title'];
$seo_delimiter = $XQ['seo_delimiter'];
$seo_page = $page > 1 ? lang($L['seo_page'], array($page)).$seo_delimiter : '';
$seo_catname = $seo_cattitle = $seo_parentname = '';
if($catid && isset($CATEGORY[$catid])) {
	isset($CAT) or $CAT = get_cat($catid);
	if($CATEGORY[$catid]['parentid']) {
		$seo_catname = '';
		$tmp = strip_tags(cat_pos($catid, 'XQCMS'));
		$tmp = explode('XQCMS', $tmp);
		$tmp = array_reverse($tmp);
		foreach($tmp as $k=>$v) {
			$seo_catname .= $v.$seo_delimiter;
		}
	} else {
		$seo_catname = $CAT['catname'].$seo_delimiter;
	}
	$seo_cattitle = $CAT['seo_title'] ? $CAT['seo_title'].$seo_delimiter : $seo_catname;
}
$seo_showtitle = isset($title) ? $title : '';
?>