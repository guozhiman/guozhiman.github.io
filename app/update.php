<?php
defined('IN_XQCMS') or exit('Access Denied');
if($update) $db->query("UPDATE {$table} SET ".(substr($update, 1))." WHERE id=$id");
if($page == 1) {
		$db->query("UPDATE LOW_PRIORITY {$table} SET hits=hits+1 WHERE id=$id", 'UNBUFFERED');
}	
?>