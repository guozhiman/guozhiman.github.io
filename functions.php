<?php
/* 
 * 精智B2博客主题 
 * 主题版本 1.0
 * 主题制作 精智主题 http://www.jianzhanpress.com
 * QQ 4541293
 */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/wodepress/' );
require_once dirname( __FILE__ ) . '/wodepress/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );



/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}






function cut_str($src_str,$cut_length){$return_str='';$i=0;$n=0;$str_length=strlen($src_str);
		while (($n<$cut_length) && ($i<=$str_length))
		{$tmp_str=substr($src_str,$i,1);$ascnum=ord($tmp_str);
		if ($ascnum>=224){$return_str=$return_str.substr($src_str,$i,3); $i=$i+3; $n=$n+2;}
        elseif ($ascnum>=192){$return_str=$return_str.substr($src_str,$i,2);$i=$i+2;$n=$n+2;}
        elseif ($ascnum>=65 && $ascnum<=90){$return_str=$return_str.substr($src_str,$i,1);$i=$i+1;$n=$n+2;}
        else {$return_str=$return_str.substr($src_str,$i,1);$i=$i+1;$n=$n+1;}
    }
    if ($i<$str_length){$return_str = $return_str . '';}
    if (get_post_status() == 'private'){ $return_str = $return_str . '（private）';}
    return $return_str;};




function get_category_root_id($cat)
{
$this_category = get_category($cat); 
while($this_category->category_parent) 
{
$this_category = get_category($this_category->category_parent);
}
return $this_category->term_id;
}



function the_slug() {
$post_data = get_post($post->ID, ARRAY_A);
$slug = $post_data['post_name'];
return $slug; 
}

add_theme_support( 'post-thumbnails' );

add_action( 'admin_menu', 'my_page_excerpt_meta_box' );
function my_page_excerpt_meta_box() {
 add_meta_box( 'postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'page', 'normal', 'core' );
}





add_filter('pre_get_posts','search_filter');
function search_filter($query) {
	if ($query->is_search && !$query->is_admin) {
		$query->set('post_type', 'post');
	}
	return $query;
}

function git_upload_filter($file) {
$time = date("YmdHis");
$file['name'] = $time . "" . mt_rand(1, 100) . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
return $file;
}
add_filter('wp_handle_upload_prefilter', 'git_upload_filter');



add_action( 'save_post', 'using_id_as_slug', 10, 2 );
 function using_id_as_slug($post_id, $post){
 global $post_type; if($post_type=='post'){
if (wp_is_post_revision($post_id))
 return false;

remove_action('save_post', 'using_id_as_slug' );

wp_update_post(array('ID' => $post_id, 'post_name' => $post_id ));

add_action('save_post', 'using_id_as_slug' );
 }}


function tagtext(){
	global $post;
	$gettags = get_the_tags($post->ID);
	if ($gettags) {
		foreach ($gettags as $tag) {
			$posttag[] = $tag->name;
		}
		$tags = implode( ',', $posttag );
		echo $tags;
	}
}


function jzp_tags() {
    $posttags = get_the_tags();
    if ($posttags){
    foreach($posttags as $tag)
    echo '<li><a href="'.get_tag_link($tag).'" class="btn btn-xs btn-primary">'. $tag->name .'</a></li>&nbsp;';
    }
}



  
     function get_post_views ($post_id) {     
         
         $count_key = 'views';     
         $count = get_post_meta($post_id, $count_key, true);     
         
         if ($count == '') {     
             delete_post_meta($post_id, $count_key);     
             add_post_meta($post_id, $count_key, '0');     
             $count = '0';     
         }     
         
         echo number_format_i18n($count);     
         
     }     
         
     function set_post_views () {     
         
         global $post;     
         
         $post_id = $post -> ID;     
         $count_key = 'views';     
         $count = get_post_meta($post_id, $count_key, true);     
         
         if (is_single() || is_page()) {     
         
             if ($count == '') {     
                 delete_post_meta($post_id, $count_key);     
                 add_post_meta($post_id, $count_key, '0');     
             } else {     
                 update_post_meta($post_id, $count_key, $count + 1);     
             }     
         
         }     
         
     }     
     add_action('get_header', 'set_post_views'); 



add_filter('pre_option_link_manager_enabled','__return_true');

function pagination($query_string){
global $posts_per_page, $paged;
$my_query = new WP_Query($query_string ."&posts_per_page=-1");
$total_posts = $my_query->post_count;
if(empty($paged))$paged = 1;
$prev = $paged - 1;
$next = $paged + 1;
$range = 4; // only edit this if you want to show more page-links
$showitems = ($range * 2)+1;
 
$pages = ceil($total_posts/$posts_per_page);
if(1 != $pages){
echo "<ul class='pagination justify-content-center'>";
echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "
<li><a href='".get_pagenum_link(1)."' class='page-link'><i class='fa fa-angle-double-left'></i></a></li>":"";
echo ($paged > 1 && $showitems < $pages)? "
<li><a href='".get_pagenum_link($prev)."' class='page-link'><i class='fa fa-angle-left'></i></a></li>":"";
 
for ($i=1; $i <= $pages; $i++){
if (1 != $pages &&( !($i >= $paged+$range+1 ||
    $i <= $paged-$range-1) || $pages <= $showitems )){
echo ($paged == $i)? "<li class='active'><a href='#' class='page-link'>".$i."</a></li>":
"<li class='page-item'><a href='".get_pagenum_link($i)."' class='page-link'>".$i."</a></li>";
}
}
echo ($paged < $pages && $showitems < $pages) ?
"<li><a href='".get_pagenum_link($next)."' class='page-link'><i class='fa fa-angle-right'></i></a></li>" :"";
echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ?
"<li><a href='".get_pagenum_link($pages)."' class='page-link'><i class='fa fa-angle-double-right'></i></a></li>":"";
echo "</ul>\n";
}
}



if ( ! function_exists( 'wodepress_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since wodepress 1.0
	 *
	 * @return void
	 */
	function wodepress_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wodepress, use a find and replace
		 * to change 'wodepress' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wodepress', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'header' => esc_html__( 'Primary menu', 'wodepress' ),
				'footer'  => __( 'Secondary menu', 'wodepress' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		if ( 127 > wodepress_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'wodepress' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'wodepress' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'wodepress' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'wodepress' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'wodepress' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'wodepress' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'wodepress' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'wodepress' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'wodepress' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'wodepress' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'wodepress' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'wodepress' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'wodepress' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'wodepress' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'wodepress' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'wodepress' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'wodepress' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'wodepress' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'wodepress' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'wodepress' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'wodepress' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'wodepress' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'wodepress' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'wodepress' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'wodepress' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'wodepress' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'wodepress' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'wodepress' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'wodepress' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'wodepress' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'wodepress' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'wodepress' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', wodepress_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'wodepress_setup' );

function wodepress_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'wodepress-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'wodepress-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}


	// bootstrap styles.
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'carousel-style', get_template_directory_uri() . '/css/owl.carousel.min.css');
	
	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'wodepress-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'wodepress-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_add_inline_script(
		'wodepress-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'wodepress-ie11-polyfills-asset',
			)
		)
	);



	// Responsive jquery script.
	wp_enqueue_script(
		'wodepress-responsive-jquery-script',
		get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js',
		array( 'wodepress-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
	// Responsive easing script.
	wp_enqueue_script(
		'wodepress-responsive-easing-script',
		get_template_directory_uri() . '/assets/js/jquery.easing.min.js',
		array( 'wodepress-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
	// Responsive bootstrap script.
	wp_enqueue_script(
		'wodepress-responsive-bootstrap-script',
		get_template_directory_uri() . '/assets/js/bootstrap.min.js',
		array( 'wodepress-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
	// Responsive carousel script.
	wp_enqueue_script(
		'wodepress-responsive-carousel-script',
		get_template_directory_uri() . '/assets/js/owl.carousel.min.js',
		array( 'wodepress-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
	// Responsive wow script.
	wp_enqueue_script(
		'wodepress-responsive-wow-script',
		get_template_directory_uri() . '/assets/js/wow.min.js',
		array( 'wodepress-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
	// Responsive wodepress script.
	wp_enqueue_script(
		'wodepress-responsive-wodepress-script',
		get_template_directory_uri() . '/assets/js/wodepress.js',
		array( 'wodepress-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
	
}
add_action( 'wp_enqueue_scripts', 'wodepress_scripts' );
function wodepress_block_editor_script() {

	wp_enqueue_script( 'wodepress-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'wodepress_block_editor_script' );
function wodepress_the_html_classes() {
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since wodepress 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters( 'wodepress_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

function wodepress_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wodepress_content_width', 750 );
}
add_action( 'after_setup_theme', 'wodepress_content_width', 0 );

// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
add_filter('pre_option_link_manager_enabled','__return_true');
add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 400, 600 );




// SVG Icons class.
require get_template_directory() . '/classes/class-wodepress-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-wodepress-custom-colors.php';
new wodepress_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-wodepress-customize.php';
new wodepress_Customize();
require get_parent_theme_file_path( '/block-class.php' );
// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';




function wodepress_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'wodepress' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'wodepress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Slider', 'wodepress' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'wodepress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'wodepress_widgets_init' );
remove_filter (  'the_excerpt' ,  'wpautop'  );

