<?php
defined('IN_XQCMS') or exit('Access Denied');
$SET = array();
$SET['module'] = 'article';
$SET['name'] = '����';
$SET['author'] = 'xiqiao.me';
$SET['weburl'] = 'www.xiqiao.me';
$SET['copy'] = true;
$SET['uninst'] = true;
$SET['moduleid'] = 0;
$PW = array();
$PW['file']['index'] =$v['name']. '����';
$PW['file']['html'] = '������ҳ';
$PW['action']['index']['add'] = '���'.$v['name'];
$PW['action']['index']['edit'] = '�޸�'.$v['name'];
$PW['action']['index']['delete'] = 'ɾ��'.$v['name'];
$PW['action']['index']['check'] = '���'.$v['name'];
$PW['action']['index']['recycle'] = '����վ';
$PW['action']['index']['order'] = '��������';
$PW['action']['index']['posid'] = 'λ����������';
?>