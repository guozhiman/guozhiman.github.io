<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage wodepress
 * @since wodepress 1.0
 */

?>
<div class="container mt-4 mb-5">
<div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 border-bottom text-center">
        <?php the_title( '' ); ?>
      </h3>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>

	<header class="entry-header alignwide">

		<div class="d-flex justify-content-center mb-4"><?php wodepress_entry_meta_footer(); ?></div>
		<?php wodepress_post_thumbnail(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'wodepress' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'wodepress' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	

	

</article>


  

   

  


<!-- #post-<?php the_ID(); ?> -->
