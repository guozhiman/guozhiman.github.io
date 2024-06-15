<?php
defined('IN_XQCMS') or exit('Access Denied');
$db->query("DROP TABLE IF EXISTS `".$XQ_PRE.$module."_".$moduleid."`");
?>