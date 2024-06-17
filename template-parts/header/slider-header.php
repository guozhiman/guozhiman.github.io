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

 <div class="carousel-item active">
       <img src="<?php if ( has_post_thumbnail() ) { ?>
<?php
$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
echo $large_image_url[0];
?>
<?php } else {?>
<?php bloginfo('template_url'); ?>/images/noneimg.png
<?php } ?>" class="img-fluid" alt="<?php the_title(); ?>">
      
          <div class="carousel-caption">
<div class="position-absolute slider-title d-flex align-content-between flex-wrap">
<div><p class="bg-danger py-1 px-2"><?php the_category(', '); ?></p></div>
<div><?php
	the_title( sprintf( '<h4 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h4>' );
	?>
<p class="text-white"><?php if (has_excerpt()) {
                echo $description = get_the_excerpt();
            }else {
                echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"……"); 
            } ?></p>
</div>
</div>
          </div>
   
      </div>


