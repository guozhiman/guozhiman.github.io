<?php
define('XQ_NONUSER', true);
require '../global.php';
XQcms::load_xq_func('post');
switch($action) {
	case 'category':
	    $_userid = get_cookie('userid');
		$category_extend = isset($category_extend) ? stripslashes($category_extend) : '';
		$category_moduleid = isset($category_moduleid) ? intval($category_moduleid) : 1;
		if(!$category_moduleid) exit;
		$category_deep = isset($category_deep) ? intval($category_deep) : 0;
		$cat_id= isset($cat_id) ? intval($cat_id) : 1;
			$R = cache_read('right-'.$_userid.'.php');
			if(isset($R[$category_moduleid]['index']['catid'])) {
				$_catids = $R[$category_moduleid]['index']['catid'];
				if($_catids) {
					$CATEGORY = cache_read('category-'.$category_moduleid.'.php');
					foreach($CATEGORY as $k=>$c) {
						if($c['parentid'] > 0) continue;
						if(!in_array($k, $_catids)) unset($CATEGORY[$k]);
					}
				}
			}
		echo get_category_select($category_title, $catid, $category_moduleid, $category_extend, $category_deep, $cat_id);
	break;
}
?>