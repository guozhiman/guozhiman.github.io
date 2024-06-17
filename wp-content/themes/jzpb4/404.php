<?php
/* 
 * 精智B2博客主题 
 * 主题版本 1.0
 * 主题制作 精智主题 http://www.jianzhanpress.com
 * QQ 4541293
 */
get_header();
?>
<div class="container">
<div class="row my-lg-5">
<div class="col-12 py-5 my-5 text-center">
	<header class="page-header alignwide">
		<h1 class="page-title"><?php esc_html_e( 'Nothing here', 'wodepress' ); ?></h1>
	</header><!-- .page-header -->

	<div class="error-404 not-found">
		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'wodepress' ); ?></p>
			<div class="col-12 col-md-5 mx-auto"><?php get_search_form(); ?></div>
		</div><!-- .page-content -->
	</div><!-- .error-404 -->
</div>
</div>
</div>
<?php
get_footer();
