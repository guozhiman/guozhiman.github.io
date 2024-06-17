<?php
/* 
 * 精智B2博客主题 
 * 主题版本 1.0
 * 主题制作 精智主题 http://www.jianzhanpress.com
 * QQ 4541293
 */
get_header(); ?>
<?php get_template_part( 'template-parts/content/content-slider' ); ?>
<div class="container my-5">
<div class="row g-5">
    <div class="col-md-8">


<?php

$the_query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ) ) );



if ( $the_query->have_posts() ) {

	// Load posts loop.
	while ( $the_query->have_posts() ) {
		$the_query->the_post();

		get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
	}

	// Previous/next page navigation.
	wodepress_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

}
get_template_part( 'sidebar' ); 
get_footer();
?>