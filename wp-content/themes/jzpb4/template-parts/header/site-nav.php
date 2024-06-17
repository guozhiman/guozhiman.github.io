<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<?php if ( has_nav_menu( 'header' ) ) : ?>

       <?php
        wp_nav_menu( array(
            'theme_location' => 'header',
            'depth' => 5,
            'container' => false,
            'menu_class' => 'nav-scroller nav me-auto',
            'fallback_cb' => '',
            //Process nav menu using our custom nav walker
            'walker' => new wp_header_navwalker())
        );
        ?>


<?php endif; ?>
