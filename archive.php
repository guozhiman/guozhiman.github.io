<?php
/* 
 * 精智B2博客主题 
 * 主题版本 1.0
 * 主题制作 精智主题 http://www.jianzhanpress.com
 * QQ 4541293
 */
get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>
<div class="container mt-4 mb-5">
<div class="row g-5">
    <div class="col-md-8">
<div class="pb-3 mb-4 border-bottom">
	<?php the_archive_title( '<h3 class="">', '</h3>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description text-muted"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
</div>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
	<?php endwhile; ?>

	<?php wodepress_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_template_part( 'sidebar' ); get_footer(); ?>
