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
<a href="<?php the_permalink(); ?>"><?php
	the_title( sprintf( '<h3 class=""><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' );
	?></a>

<p class="text-muted"><?php if (has_excerpt()) {
                echo $description = get_the_excerpt();
            }
		else {
                echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 120,"¡­¡­"); 
            } ?>
</p>