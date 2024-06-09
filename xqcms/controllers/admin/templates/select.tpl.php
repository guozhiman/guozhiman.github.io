<?php
defined('IN_XQCMS') or exit('Access Denied');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo XQ_CHARSET;?>"/>
<title>文件选择</title>
<link rel="stylesheet" href="../data/style/style.css" type="text/css" media="all" />
<script type="text/javascript" src="../data/js/jquery.min.js"></script>
<script type="text/javascript" src="../data/js/lang.js"></script>
<script type="text/javascript" src="../data/js/config.js"></script>
<script type="text/javascript" src="../data/js/xqcms.js"></script>
<script type="text/javascript" src="../data/js/admin.js"></script>
<style type="text/css">
body, td, th {
	font-size: 12px;
	color: #333;
}
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 0px;
}
#explorer {
	border-collapse:collapse;
	word-break:break-all;
	border:solid 1px #ECE9D8;
	border-bottom:solid 1px #959385;
	background-color:#ECE9D8;
}
#explorer #m {
	background-color:#ECE9D8;
	width:5px;
}
#explorer #tdfile {
	background-color: #FFF;
	width:600px;
	border-left:solid 1px #7F9DB9;
	border-top:solid 1px #7F9DB9;
}
#explorer #tddir {
	background-color: #FFF;
	width:220px;
	height:350px;
	border-right:solid 1px #7F9DB9;
	border-top:solid 1px #ACA899;
}
.dirlist {
	width:220px;
	height:350px;
	overflow-x:auto;
	overflow-y:scroll;
	clear: both;
	list-style:none;
	margin: 0px;
	display: block;
	padding: 0px 0px 0px 4px;
}
.dirlist li {
	clear: both;
	height: 16px;
	margin-top: 1px;
	text-align: left;
}
.dirlist li span {
	margin-left:36px;
	display: block;
}
.dirlist ul {
	clear: both;
	list-style:none;
	margin: 0px;
	display: block;
	padding: 0px 0px 0px 16px;
}
/*缩略图*/
#filelist {
	width:100%;
	height:375px;
	overflow-y:scroll;
	clear: both;
	list-style:none;
	margin: 0px 0px;
	padding: 0px;
	display: block;
	margin-top: 4px;
}
#filelist li {
	float:left;
	width:96px;
	height:96px;
	border:solid 1px #ECE9D8;
	margin-left:8px;
}
/*缩略图 end*/
.filelist {
	width:100%;
	height:350px;
	clear: both;
	list-style:none;
	margin: 0px 0px 0px 1px;
	padding: 0px;
	display: block;
	overflow-y: scroll;
	overflow-x: visible;
}
.filelist li {
	float:left;
	padding-top: 3px;
	height: 20px;
	padding-left: 8px;
	overflow:hidden;
}
.fileheader {
	background: url(../data/style/header-bg.gif) repeat-x;
	height: 22px;
	overflow: visible;
}
.fileheader li {
	background: url(../data/style/header-li-left.gif) no-repeat right top;
}
#tdfile .name {
	width:200px;
	text-align: left;
}
#tdfile .bg {
	background-color: #F7F7F7;
}
#tdfile .size {
	width: 72px;
	text-align: right;
	padding-right: 6px;
}
#tdfile .author {
	width: 72px;
	text-align: left;
}
#tdfile .date {
	text-align: left;
	width: 120px;
}
#tdfile .manage {
	text-align: left;
	width: auto;
	display:none;
}
.opendir {
	background: url(../data/ext/opendir.gif) no-repeat left bottom;
	height: 18px;
}
span.on {
	border:dotted 1px #000;
	background-color:#316AC5;
	color:#FFF;
}
.closedir {
	background: url(../data/ext/closedir.gif) no-repeat left bottom;
	height: 18px;
}

dd{background:url(../data/ext/folder.gif) no-repeat 35px 2px;padding-left:55px;line-height:22px;height:22px;margin-left:0px;}
dd a{width:100%;display:block;}
.closedir span {
}
#imgshow {z-index:1000;position:absolute; right:2px;background:#F1F1F1;border:#666666 1px solid;padding:5px;}
.d_on{ font-weight:bold;}
</style>
</head>
<body>
<table border="0" align="left" cellpadding="0" cellspacing="0" id="explorer">
  <tr>
    <td height="22" colspan="2" align="left" style="padding-left:4px;">文件夹列表</td>
    <td rowspan="2" valign="top" id="tdfile">
    <ul class="filelist fileheader">
        <li class="name">图片列表</li>
        <li class="size">大小</li>
        <li class="date">修改日期</li>
      </ul>
      <div id="imgshow" style="display:none;"></div>
       <ul class="filelist" id="fList"></ul>
    </td>

  </tr>
  <tr>
    <td id="tddir">
      <div class="dirlist" id="dl">
    <?php foreach($dirs as $k=>$v) {?>
	<dl id="dl_<?php echo $k;?>">
	<dt class="closedir" onclick="get_file('<?php echo $k;?>');return false;"><?php echo $k;?></dt>
    <?php foreach($v as $val) {?>
	<dd onclick="get_file('<?php echo $k.'/'.$val;?>');return false;" style="display:none;"><a href="javascript:void(0);"><?php echo $val;?></a></dd>
    <?php } ?>
	</dl>
      <?php } ?>
	</div>


    </td>
<td id ='m'></td>
  </tr>

</table>
<script type="text/javascript">
jQuery(document).ready(function(){
	$("dt").toggle(
		function(){
			$(this).parent().children("dd").css("display","block");
			$(this).removeClass("closedir");
			$(this).addClass("opendir");
		
		},
		function(){
			$(this).parent().children("dd").css("display","none");
			$(this).removeClass("opendir");
			$(this).addClass("closedir");
		}
	);
	
	$("dd").click(function(){
	   $("dd").removeClass("d_on");
	   $(this).addClass("d_on");
	
	});
	get_file('');
});
function get_file(dir) {
		$.get('<?php echo $MODULE[3]['url'];?>select.php?action=ajax&dir='+dir,function(data){
		  $('#fList').html(data);
		});
}
function Select(t) {
	try {
	<?php if($from == 'album'){?>
	window.opener.getAlbum(t, '<?php echo $fid;?>');
	<?php }else{?>
	window.opener.SetUrl(t);window.opener.GetE("frmUpload").reset();
	<?php }?>
	} catch(e) {}
	window.close();
}
function SAlbum(s) {
	$('#imgshow').html('<img src="'+s+'" onload="if(this.width>250){this.width=250;}"/>');
	Ds('imgshow');
}
function HAlbum() {Dh('imgshow');}
</script>
</body>
</html>