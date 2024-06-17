<?php
/* 
 * 精智B2博客主题 
 * 主题版本 1.0
 * 主题制作 精智主题 http://www.jianzhanpress.com
 * QQ 4541293
 */
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'wodepress' ), '%title' ),
			)
		);
	}



	// Previous/next post navigation.
	$wodepress_next = is_rtl() ? wodepress_get_icon_svg( 'ui', 'arrow_left' ) : wodepress_get_icon_svg( 'ui', 'arrow_right' );
	$wodepress_prev = is_rtl() ? wodepress_get_icon_svg( 'ui', 'arrow_right' ) : wodepress_get_icon_svg( 'ui', 'arrow_left' );

	$wodepress_next_label     = esc_html__( 'Next post', 'wodepress' );
	$wodepress_previous_label = esc_html__( 'Previous post', 'wodepress' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $wodepress_next_label . $wodepress_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $wodepress_prev . $wodepress_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
		// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.
get_template_part( 'sidebar' ); 
get_footer();
