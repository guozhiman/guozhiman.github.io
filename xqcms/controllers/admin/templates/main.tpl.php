<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<table class="tb">
<thead>
<th colspan="6">��վ����</th>
</thead>
<?php
foreach ($MODULE as $m) {
	if($m['moduleid'] < 5 || $m['islink']) continue;
?>
<tbody> 
<tr >
<td class="tl"><a href="<?php echo $m['url'];?>" class="t" target="_blank"><?php echo $m['name'];?></a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>"><span id="m_<?php echo $m['moduleid'];?>"><img src="data/style/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>&action=check" class="t">�����</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>&action=check"><span id="m_<?php echo $m['moduleid'];?>_2"><img src="data/style/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>

<td class="tl"><a href="?moduleid=<?php echo $m['moduleid'];?>" class="t">�������</a></td>

<td>&nbsp;<a href="?moduleid=<?php echo $m['moduleid'];?>"><span id="m_<?php echo $m['moduleid'];?>_3"><img src="data/style/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>
</tbody>
<?php
}
?>
<tbody> 
<tr>
<td class="tl"><a href="?moduleid=3&file=guestbook" class="t">����</a></td>
<td>&nbsp;<a href="?moduleid=3&file=guestbook"><span id="guestbook"><img src="data/style/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=guestbook" class="t">���ظ�����</a></td>
<td>&nbsp;<a href="?moduleid=3&file=guestbook"><span id="guestbook_1"><img src="data/style/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
<td class="tl"><a href="?moduleid=3&file=link&action=check" class="t">���������</a></td>
<td>&nbsp;<a href="?moduleid=3&file=link&action=check"><span id="link"><img src="data/style/count.gif" width="10" height="10" alt="����ͳ��"/></span></a></td>
</tr>
</tbody>
</table>
<script type="text/javascript" src="?action=counter"></script>
<table class="tb">
<thead>
<th colspan="6">������Ϣ</th>
</thead>
<tbody> 
<tr>
<td class="tl">����汾</td>
<td>XQCMS Version 5.0 Release 20120816</td>
</tr>
<tr>
<td class="tl">��װʱ��</td>
<td>&nbsp;<?php echo $install;?></td>
</tr>
<tr>
<td class="tl">�ٷ���վ</td>
<td>&nbsp;<a href="http://www.china921.com" target="_blank">http://www.china921.com</a></td>
</tr>
<tr>
<td class="tl">������Ա</td>
<td>&nbsp;<a href="http://www.china921.com" target="_blank"></a>֯ѩ��Ϣ�Ƽ����Ϻ������޹�˾</a></td>
</tr>
<tr>
<td class="tl">ʹ�ð���</td>
<td>&nbsp;<a href="http://www.china921.com" target="_blank">http://www.china921.com</a></td>
</tr>
</tbody>
</table>
<?php if($_founder) {?>
<table class="tb">
<thead>
<th colspan="6">ϵͳ��Ϣ</th>
</thead>
<tbody> 
<tr>
<td class="tl">������ʱ��</td>
<td>&nbsp;<?php echo timetodate($XQ_TIME, 'Y-m-d H:i:s l');?></td>
</tr>
<tr>
<td class="tl">����ϵͳ</td>
<td>&nbsp;<?php echo PHP_OS;?></td>
</tr>
<tr>
<td class="tl">��������Ϣ</td>
<td>&nbsp;<?php echo $_SERVER["SERVER_SOFTWARE"];?> [<?php echo gethostbyname($_SERVER['SERVER_NAME']);?>:<?php echo $_SERVER["SERVER_PORT"];?>] <a href="?action=phpinfo" target="_blank">[��ϸ��Ϣ]</a></td>
</tr>
<tr>
<td class="tl">���ݿ�汾</td>
<td>&nbsp;MySQL <?php echo $db->version();?></td>
</tr>
<tr>
<td class="tl">�ϴ��ļ�</td>
<td>&nbsp;<?php echo @ini_get('file_uploads') ? ini_get('upload_max_filesize') :'unknown';?></td>
</tr>
</tbody>
</table>
<?php } ?>
</body>
</html>