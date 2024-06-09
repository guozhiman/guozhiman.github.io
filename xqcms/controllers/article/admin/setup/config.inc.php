<?php
defined('IN_XQCMS') or exit('Access Denied');
$SET = array();
$SET['module'] = 'article';
$SET['name'] = '文章';
$SET['author'] = 'xiqiao.me';
$SET['weburl'] = 'www.xiqiao.me';
$SET['copy'] = true;
$SET['uninst'] = true;
$SET['moduleid'] = 0;
$PW = array();
$PW['file']['index'] =$v['name']. '管理';
$PW['file']['html'] = '更新网页';
$PW['action']['index']['add'] = '添加'.$v['name'];
$PW['action']['index']['edit'] = '修改'.$v['name'];
$PW['action']['index']['delete'] = '删除'.$v['name'];
$PW['action']['index']['check'] = '审核'.$v['name'];
$PW['action']['index']['recycle'] = '回收站';
$PW['action']['index']['order'] = '更新排序';
$PW['action']['index']['posid'] = '位置属性设置';
?>