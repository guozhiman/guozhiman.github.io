<?php
/* 
 * 精智B2博客主题 
 * 主题版本 1.0
 * 主题制作 精智主题 http://www.jianzhanpress.com
 * QQ 4541293
 */
get_header();

if ( have_posts() ) {
	?>

<div class="container-fluid bg-light">
<div class="px-4 py-5 text-center">

    <h3><?php
			printf(
				/* translators: %s: Search term. */
				esc_html__( 'Results for "%s"', 'wodepress' ),
				'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
			);
			?></h3>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4"><?php
		printf(
			esc_html(
				/* translators: %d: The number of search results. */
				_n(
					'We found %d result for your search.',
					'We found %d results for your search.',
					(int) $wp_query->found_posts,
					'wodepress'
				)
			),
			(int) $wp_query->found_posts
		);
		?></p>

    </div>
  </div>


</div>
<div class="container my-5">
<div class="row g-5">
    <div class="col-md-8">
	<?php
	// Start the Loop.
	while ( have_posts() ) {
		the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content/content-excerpt', get_post_format() );
	} // End the loop.

	// Previous/next page navigation.
	wodepress_the_posts_navigation();

	// If no content, include the "No posts found" template.
} else {
	get_template_part( 'template-parts/content/content-none' );
}
get_template_part( 'sidebar' ); 
get_footer();
