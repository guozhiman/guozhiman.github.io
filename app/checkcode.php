<?php
define('XQ_NONUSER', true);
require '../global.php';
$session = new dsession();
XQcms::load_xq_class('code');
$do = new CCheckCodeFile();
//$do ->SetCheckImageWH(100,50);//设置显示验证码图片的尺寸
$do->ip = $XQ_IP;
$do->OutCheckImage();
?>