<?php
/* 
 * 精智B2博客主题 
 * 主题版本 1.0
 * 主题制作 精智主题 http://www.jianzhanpress.com
 * QQ 4541293
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); get_template_part( 'inc/block', 'gutenberg' ); ?>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<nav class="py-1 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
	<?php get_template_part( 'template-parts/header/site-nav' ); ?>
     
      <ul class="nav">
        <li class="nav-link px-2 link-dark"><?php wp_loginout(); ?></li>
		 <li class="nav-link px-2 link-dark"><a href="<?php echo of_get_option( 'weibo', 'no entry' ); ?>" target="_blank"><i class="fa fa-weibo text-danger"></i></a></li>
        <li class="nav-link px-2 link-dark"><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-weixin text-success"></i></a></li>
        <li class="nav-link px-2 link-dark"><a href="tencent://message/?uin=<?php echo of_get_option( 'qq', 'no entry' ); ?>&Site=wodepress.com/ngdao&Menu=yes" target="_blank"><i class="fa fa-qq text-info"></i></a></li>
      </ul>
    </div>
  </nav>
 <?php get_template_part( 'template-parts/header/site-header' ); ?>
 

	