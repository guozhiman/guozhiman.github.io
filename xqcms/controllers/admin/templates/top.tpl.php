<?php
defined('IN_XQCMS') or exit('Access Denied');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo XQ_CHARSET;?>"/>
<title>�������� - <?php echo $XQ['sitename']; ?> - Powered By V<?php echo XQ_VERSION; ?> </title>
<link rel="stylesheet" href="data/style/top.css" type="text/css"/>
<?php if(!XQ_DEBUG) { ?><script type="text/javascript">window.onerror= function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo XQ_PATH;?>data/js/jquery.min.js"></script>
<script type="text/javascript" src="data/js/admin.js"></script>
<base target="main"/>
<!--[if IE]>
<style type="text/css">html{overflow-x:hidden;overflow-y:auto;}</style>
<![endif]-->
</head>
<body>
<table cellpadding="0" cellspacing="0" width="100%" height="100%">
  <tr>
    <td height="90">
   <div id="msgbox" onmouseover="closemsg();" style="display:none;"></div>
    <div class="mainhd">
       <div class="logo">
       <h1><?php echo $XQ['sitename']; ?>����̨����</h1>
       </div>
        <div class="uinfo">
          <p>����,<em><?php echo $user['username'];?></em>,���ļ���<?php if($user['admin']==1){ echo $WEB['founders'] == $_userid ? '��վ��ʼ��' : '��������Ա';}else{echo $user['role'] ? $user['role'] :'��ͨ����Ա';} ?>����<a href="./" target="_blank">��վ��ҳ</a>��<br />
        <span>��¼ʱ��: <?php echo timetodate($user['lasttime'], 5); ?> ������<?php echo $user['logins']; ?> �� IP:<?php echo $user['lastip']; ?> ��<a href="?file=logout" target="_top" onclick="if(!confirm('ȷʵҪע����¼��?')) return false;">�˳�</a>��</span>
          </p>

        </div>
        <div class="navbg"></div>
        <div class="nav">
          <ul id="topmenu">
		  <li id="1"><em><a href="javascript:void(0);"><img src="<?php echo XQ_PATH;?>data/style/vv-xpincon_10.png" width="20" height="20" align="absmiddle" /> ��̨��ҳ</a></em></li>
          <?php if($_admin!=2){?>  <li id="2" ><em><a href="javascript:void(0);"><img src="<?php echo XQ_PATH;?>data/style/vv-xpincon_31.png" width="20" height="20" align="absmiddle" /> ϵͳ����</a></em></li>
		   <li id="3"><em><a href="javascript:void(0);"><img src="<?php echo XQ_PATH;?>data/style/vv-xpincon_45.png" width="20" height="20" align="absmiddle" /> ���ݹ���</a></em></li>
		   <li id="4"><em><a href="javascript:void(0);"><img src="<?php echo XQ_PATH;?>data/style/vv-xpincon_11.png" width="20" height="20" align="absmiddle" /> ��������</a></em></li>           <?php }?>
          </ul>

        </div>
      </div></td>
  </tr>
  </table>
<script type="text/javascript">
jQuery(document).ready(function(){
  $("#topmenu li:first").addClass("navon");
  $("#topmenu li").click(function(){
    var lid=$(this).attr("id");
	  parent.frames["left"].XQcms.hide(lid);
	$(this).siblings().removeClass("navon");
    $(this).addClass("navon");
  });
});
</script>
</body>
</html>