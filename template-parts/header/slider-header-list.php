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
<?php
	the_title( sprintf( '<h6 class="border-bottom mb-2 pb-2"><a href="%s">', esc_url( get_permalink() ) ), '</a></h6>' );
	?>