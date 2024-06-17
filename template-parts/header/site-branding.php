<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

<?php if ( has_custom_logo() ) : ?>
	<div class="site-logo mb-3 mb-lg-0 me-lg-auto"><?php the_custom_logo(); ?></div>

<?php else : ?>

	<?php if ( $blog_info ) : ?>
		<?php if ( is_front_page() && ! is_paged() ) : ?>
			<h1 class="me-lg-auto <?php echo esc_attr( $header_class ); ?>"><?php echo esc_html( $blog_info ); ?></h1>
		<?php elseif ( is_front_page() && ! is_home() ) : ?>
			<h1 class="me-lg-auto <?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
		<?php else : ?>
			<h1 class="me-lg-auto <?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
		<?php endif; ?>
	<?php endif; ?>


<?php endif; ?>
<div class="col-12 col-md-4">
<?php get_search_form(); ?>
</div>


      



      

    