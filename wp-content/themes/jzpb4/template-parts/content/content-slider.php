<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<div class="container my-5">
<div class="row g-0 bg-light">
    <div class="col-md-6">
	<div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
	<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 7);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 3) );
?>
<?php $query_index = 0; while (have_posts()) : $query_index++;the_post(); ?>
<?php if($query_index==1){?>
<?php get_template_part( 'template-parts/header/slider-header'); ?>


	<!-- #post-<?php the_ID(); ?> -->
<?php }else{?>
<?php get_template_part( 'template-parts/header/slider-header-normal'); ?>


	<!-- #post-<?php the_ID(); ?> -->
<?php }?>
<?php endwhile; wp_reset_query(); ?>

     
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


	</div>
	<!-- col-md-6 -->
	<div class="col-md-6 px-4 py-5">
<div class="row d-flex align-items-center">

<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 8);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 8,'offset' => 3) );
?>
<?php $query_index = 0; while (have_posts()) : $query_index++;the_post(); ?>
<?php if($query_index==1){?>


 <div class="col-md-12 text-center">
			<?php get_template_part( 'template-parts/header/slider-header-title', get_post_format() ); ?>
		  </div>

	<!-- #post-<?php the_ID(); ?> -->
<?php }else{?>


 <div class="col-md-6">
			<?php get_template_part( 'template-parts/header/slider-header-list', get_post_format() ); ?>
		  </div>
	<!-- #post-<?php the_ID(); ?> -->
<?php }?>
<?php endwhile; wp_reset_query(); ?>

<?php
$sticky = get_option('sticky_posts');
rsort( $sticky );
$sticky = array_slice( $sticky, 0, 13);
query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1,'showposts' => 13,'offset' => 8) );
?>
<?php $query_index = 0; while (have_posts()) : $query_index++;the_post(); ?>
<?php if($query_index==1){?>


 <div class="col-md-12 text-center mt-4">
			<?php get_template_part( 'template-parts/header/slider-header-title', get_post_format() ); ?>
		  </div>

	<!-- #post-<?php the_ID(); ?> -->
<?php }else{?>


 <div class="col-md-6">
			<?php get_template_part( 'template-parts/header/slider-header-list', get_post_format() ); ?>
		  </div>
	<!-- #post-<?php the_ID(); ?> -->
<?php }?>
<?php endwhile; wp_reset_query(); ?>



</div>
	</div>
<!-- col-md-6 -->

</div>	
</div>
