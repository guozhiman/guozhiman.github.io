<?php
/* 
 * ����B2�������� 
 * ����汾 1.0
 * �������� �������� http://www.jianzhanpress.com
 * QQ 4541293
 */
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-page' );

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.
get_template_part( 'sidebar' ); 
get_footer();
