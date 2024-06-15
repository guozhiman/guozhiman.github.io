<?php
defined('IN_XQCMS') or exit('Access Denied');
unset($_SESSION['xqcms_admin'],$_SESSION['admin'],$_SESSION['username']);
set_cookie('userid', '');
msg('已经安全退出网站后台管理', '?');
?>