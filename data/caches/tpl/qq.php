<?php defined('IN_XQCMS') or exit('Access Denied');?><style type="text/css"> 
.floatonline_1{ padding:1px; width:130px; text-align:left;}
.scroll_title_2{height:25px; line-height:25px; background:url(<?php echo XQ_STYLE;?>images/online4_1.gif) no-repeat 0px 0px; position:relative;}
.scroll_title_2 span{ padding-left:15px; font-weight:bold; color:#FFFFFF;}
.scroll_title_2 a{ display:block; position:absolute; right:8px; top:6px; line-height:15px;  width:11px; height:11px; background:url(<?php echo XQ_STYLE;?>images/close2_1.gif) no-repeat 0px 0px;}
.scroll_main2{ padding:4px; background:#c5e2f8; border:1px solid #498bcf;}
.scroll_text2{ background:#FFFFFF; border:1px solid #a7d8d7; padding:3px;}
.scroll_qq_1{padding:2px 2px 0px 2px; text-align:center; color:#333333; }
.scroll_qq_1 img{padding:5px 0px 0px 0px;}
.scroll_skype_1{ padding:5px;}
.scroll_alibaba_1{ padding:5px;}
.scroll_foot_2{ background:#FFFFFF; border:1px solid #a7d8d7; text-align:center; padding:3px; line-height:18px; margin-top:5px;}}
</style>
<script type='text/javascript' src='<?php echo XQ_STYLE;?>js/Contact.js'></script>
<div id='floatDivr' style=' top:150px; right:0px;position: absolute; z-index:100;' class='floatonline_1'>
<div class='scroll_title_2'><span>在线咨询</span><a href='#' title='关闭' onmousedown='Mouseclose()'>&nbsp;</a></div>
<div class='scroll_main2'>
<div class='scroll_text2'>
<?php $arr=qq("show=1 "); if(is_array($arr)){ foreach($arr as $i =>$row){ ?>
<div class='scroll_qq_1'>
<?php echo $row['name'];?>
<a href='tencent://message/?uin=<?php echo $row['qq'];?>&Site=&Menu=yes'  title='QQ在线咨询' style='text-decoration:none;'>
<img border='0' SRC='http://wpa.qq.com/pa?p=1:<?php echo $row['qq'];?>:6' align="middle"></a>
</div>
<?php } } unset($arr);?>
</div>
<div class='scroll_foot_2'><span style='font-size:12px; font-weight:bold;'>服务热线<br><?php echo $XQ['webphone'];?></span></div>
</div>
</DIV>
<SCRIPT language=JavaScript type=text/JavaScript> 
function Mouseclose(){document.getElementById('floatDivr').style.display='none';}

window.setInterval("heartBeat()",2);
</SCRIPT>
