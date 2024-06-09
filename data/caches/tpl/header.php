<?php defined('IN_XQCMS') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html;php_value default_charset off"/>

<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $XQ['seo_delimiter'];?><?php } ?><?php echo $XQ['sitename'];?><?php } ?></title>

<meta name="keywords" content="<?php echo $head_keywords;?>"/>

<meta name="description" content="<?php echo $head_description;?>"/>

<link rel="stylesheet" type="text/css" href="<?php echo XQ_STYLE;?>style.css"/>

<script type="text/javascript" src="<?php echo XQ_JS;?>jquery.min.js"></script>

<script type="text/javascript" src="<?php echo XQ_JS;?>config.js"></script>

<script type="text/javascript" src="<?php echo XQ_JS;?>xqcms.js"></script>

<script language="JavaScript">

function validate() {

  if ($("#kw").val()=="") {

	  alert("请输入您要搜索的关键字");

	  return false;

  }

  return true;

}

</script>

</head>

<body>

<div class="m">

<!--s:页头-->

    <div class="header clearfix">

      <div class="logo"><a href="<?php echo XQ_PATH;?>"><img src="<?php if($XQ['logo']) { ?><?php echo $XQ['logo'];?><?php } else { ?><?php echo XQ_STYLE;?>images/logo.jpg<?php } ?>" alt="<?php echo $XQ['sitename'];?>" /></a></div> 

      <div class="logor">

      <div><span>

<img border=0 src="<?php echo XQ_STYLE;?>images/home.jpg" align="absmiddle"> <a href="javascript:void(0);" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $WEB['url'];?>'); return(false);">设为首页</a> &nbsp; 

<img border=0 src="<?php echo XQ_STYLE;?>images/bookmark.jpg" align="absmiddle"> <a href="javascript:void(0);" onClick="window.external.addFavorite('<?php echo $WEB['url'];?>','<?php echo $XQ['sitename'];?>'); return(false);">加入收藏</a> &nbsp; 



<img border=0 src="<?php echo XQ_STYLE;?>images/mail.jpg" align="absmiddle"> <a href="<?php echo XQ_PATH;?>us/conact.html">联系我们</a>



</span></div>

 

      </div>

    </div>

<!--e:页头-->

</div>

<div class="m">

<?php $auth = cache_read('category-10.php');?>  

<!-- s:导航 -->

    <div class="menu">

        <ul>

            <li><a class="menumain" href="<?php echo XQ_PATH;?>">网站首页</a></li>

            <li><a class="menumain" href="<?php echo XQ_PATH;?>us/about.html">公司简介</a></li>

            <li><a class="menumain" href="<?php echo $MODULE['8']['url'];?>">新闻资讯</a></li>

            <li><a class="menumain" href="<?php echo $MODULE['9']['url'];?>">成功案例</a></li>

            <li><a class="menumain" href="<?php echo $MODULE['5']['url'];?>">客户验厂</a></li>

            <li><a class="menumain" href="<?php echo $MODULE['10']['url'];?><?php echo $auth['11']['url'];?>">体系认证咨询</a></li>  

            <li><a class="menumain" href="<?php echo $MODULE['10']['url'];?><?php echo $auth['12']['url'];?>">认证机构咨询</a></li>       

            <li><a class="menumain" href="<?php echo XQ_PATH;?>guestbook/">在线留言</a></li>

            <li><a class="menumain" href="<?php echo XQ_PATH;?>us/conact.html">联系我们</a></li>



        </ul>

    </div>

<!-- e:导航 -->

</div>

<div class="m">

<style type="text/css">
	*{margin:0;padding:0;list-style-type:none;}
	a,img{border:0;}
	/* flexslider */
	.flexslider{position:relative;height:250px;overflow:hidden;background:url(/templates/default/images/loading.gif) 50% no-repeat;}
	.slides{position:relative;z-index:1;}
	.slides li{height:400px;}
	.flex-control-nav{position:absolute;bottom:10px;z-index:2;width:100%;text-align:center;}
	.flex-control-nav li{display:inline-block;width:14px;height:14px;margin:0 5px;*display:inline;zoom:1;}
	.flex-control-nav a{display:inline-block;width:14px;height:14px;line-height:40px;overflow:hidden;background:url(images/dot.png) right 0 no-repeat;cursor:pointer;}
	.flex-control-nav .flex-active{background-position:0 0;}

	.flex-direction-nav{position:absolute;z-index:3;width:100%;top:45%;}
	.flex-direction-nav li a{display:block;width:50px;height:50px;overflow:hidden;cursor:pointer;position:absolute;}
	.flex-direction-nav li a.flex-prev{left:40px;background:url(images/prev.png) center center no-repeat;}
	.flex-direction-nav li a.flex-next{right:40px;background:url(images/next.png) center center no-repeat;}
</style>

</head>
<body>
<div class="flexslider">
	<ul class="slides">
		<li style="background:url(/templates/default/images/img1.jpg) 50% 0 no-repeat;"></li>
		<li style="background:url(/templates/default/images/img2.jpg) 50% 0 no-repeat;"></li>
		<li style="background:url(/templates/default/images/img3.jpg) 50% 0 no-repeat;"></li>
		

	</ul>
</div>

<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/templates/default/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.flexslider').flexslider({
			directionNav: true,
			pauseOnAction: false
		});
	});
</script>


</div>