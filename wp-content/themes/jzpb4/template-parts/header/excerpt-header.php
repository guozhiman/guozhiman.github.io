<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// Don't show the title if the post-format is `aside` or `status`.
$post_format = get_post_format();
if ( 'aside' === $post_format || 'status' === $post_format ) {
	return;
}
?>
<a href="<?php the_permalink() ?>"><img src="<?php if ( has_post_thumbnail() ) { ?>
<?php
$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
echo $large_image_url[0];
?>
<?php } else {?>
<?php bloginfo('template_url'); ?>/images/noneimg.png
<?php } ?>" class="card-img img-fluid" alt="<?php the_title(); ?>"></a>