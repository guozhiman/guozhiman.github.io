
<?php if ( is_home()) : ?>

<div class="container">
  <footer class="">
    <ul class="nav d-flex justify-content-evenly border-top py-4">
 <?php wp_list_bookmarks('title_li=&categorize=0');?>
    </ul>
  
  </footer>
</div>

<?php endif; ?>









	<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
    <p class="mb-0 text-muted">Copyright &copy; 2021 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><?php bloginfo( 'name' ); ?></a> All rights reserved. <?php echo of_get_option( 'icp', 'no entry' ); ?></p>



<?php if ( has_nav_menu( 'footer' ) ) : ?>

      <?php
        wp_nav_menu( array(
            'theme_location' => 'footer',
            'depth' => 5,
            'container' => false,
            'menu_class' => 'nav d-flex align-items-center justify-content-center',
            'fallback_cb' => '',
            //Process nav menu using our custom nav walker
            'walker' => new wp_footer_navwalker())
        );
        ?>

<?php endif; ?>
<?php
if(wp_is_mobile()&&!is_single()){?>
aaa
<?php }?>
<div class="d-flex flex-wrap justify-content-end text-muted">&#116;&#104;&#101;&#109;&#101;&#32;&#98;&#121;&#32; &#87;<a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#106;&#105;&#97;&#110;&#122;&#104;&#97;&#110;&#112;&#114;&#101;&#115;&#115;&#46;&#99;&#111;&#109;" class="text-muted" target="_blank" title="&#87;&#111;&#114;&#100;&#80;&#114;&#101;&#115;&#115;">&#111;&#114;&#100;&#80;&#114;&#101;&#115;&#115;</a> <span style="display:none;"></span></div>

  </footer>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-body text-center p-0">
        <img src="<?php echo of_get_option( 'wechat', 'no entry' ); ?>" alt="关注微信公众号" class="img-fluid">
	  <p>加微信咨询</p>
      </div>
      
    </div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
