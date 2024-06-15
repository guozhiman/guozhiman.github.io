<?php
defined('IN_XQCMS') or exit('Access Denied');
$SET = array();
$SET['module'] = 'app';
$SET['name'] = '扩展';
$SET['author'] = 'xiqiao.me';
$SET['weburl'] = 'www.xiqiao.me';
$SET['copy'] = false;
$SET['uninst'] = false;

$PW = array();
$PW['file']['ad'] = '广告管理';
$PW['file']['webpage'] = '单页管理';
$PW['file']['link'] = '友情链接';
$PW['file']['guestbook'] = '留言管理';

$PW['action']['ad']['add_place'] = '添加广告位';
$PW['action']['ad']['edit_place'] = '修改广告位';
$PW['action']['ad']['delete_place'] = '删除广告位';
$PW['action']['ad']['add'] = '添加广告';
$PW['action']['ad']['edit'] = '修改广告';
$PW['action']['ad']['delete'] = '删除广告';
$PW['action']['ad']['add'] = '添加广告';
$PW['action']['ad']['list'] = '管理广告';
$PW['action']['ad']['tohtml'] = '生成广告';

$PW['action']['webpage']['add'] = '添加单页';
$PW['action']['webpage']['edit'] = '修改单页';
$PW['action']['webpage']['delete'] = '删除单页';
$PW['action']['webpage']['order'] = '更新排序';
$PW['action']['webpage']['tohtml'] = '生成单页';

$PW['action']['link']['add'] = '添加链接';
$PW['action']['link']['edit'] = '修改链接';
$PW['action']['link']['delete'] = '删除链接';
$PW['action']['link']['check'] = '审核链接';
$PW['action']['link']['order'] = '更新排序';


$PW['action']['guestbook']['edit'] = '修改留言';
$PW['action']['guestbook']['delete'] = '删除留言';

?>