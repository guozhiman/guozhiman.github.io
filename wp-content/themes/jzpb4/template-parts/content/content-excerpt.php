<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage wodepress
 * @since Twenty Twenty-One 1.0
 */

?>

<div class="col-md-12 border-bottom pb-4 mb-4 wow animate__animated animate__fadeInUp">
<div class="news-img">
<div class="row">

<div class="col-md-3 mb-3 mb-lg-0">
              <div class="effect-imghover">
                <a href="<?php the_permalink() ?>"><img src="<?php if ( has_post_thumbnail() ) { ?>
<?php
$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
echo $large_image_url[0];
?>
<?php } else {?>
<?php bloginfo('template_url'); ?>/images/noneimg.png
<?php } ?>" class="img-fluid" alt="<?php the_title(); ?>"></a>
              </div>
</div>
<div class="col-md-9 d-flex align-content-between flex-wrap">
<h5><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>

<div class="text-muted my-2"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200, '…'); ?></div>

<div class="d-flex justify-content-start"><?php wodepress_entry_meta_footer(); ?></div>
</div>
      

         

           
          

</div>
</div>
</div>
<!-- #post-<?php the_ID(); ?> -->
