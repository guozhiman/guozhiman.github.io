<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'theme-textdomain' ),
		'two' => __( 'Two', 'theme-textdomain' ),
		'three' => __( 'Three', 'theme-textdomain' ),
		'four' => __( 'Four', 'theme-textdomain' ),
		'five' => __( 'Five', 'theme-textdomain' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'theme-textdomain' ),
		'two' => __( 'Pancake', 'theme-textdomain' ),
		'three' => __( 'Omelette', 'theme-textdomain' ),
		'four' => __( 'Crepe', 'theme-textdomain' ),
		'five' => __( 'Waffle', 'theme-textdomain' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( '基础设置', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'ICP备案号', 'theme-textdomain' ),
		'desc' => __( '请输入备案号', 'theme-textdomain' ),
		'id' => 'icp',
		'std' => '<a href="http://beian.miit.gov.cn/" target="_blank">京ICP备09047789号</a>',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( '在线咨询QQ号', 'theme-textdomain' ),
		'desc' => __( '请输入在线咨询QQ号', 'theme-textdomain' ),
		'id' => 'qq',
		'std' => '4541293',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '微博', 'theme-textdomain' ),
		'desc' => __( '请输入微博', 'theme-textdomain' ),
		'id' => 'weibo',
		'std' => 'https://www.weibo.com/jianzhanpress',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '在线咨询微信号', 'theme-textdomain' ),
		'desc' => __( '宽度：120px 度度：120px', 'theme-textdomain' ),
		'id' => 'wechat',
		'std' => $imagepath . 'wechat.png',
		'type' => 'upload',
		'options' => array(
			'wechat' => $imagepath . 'wechat.png'
		)
	);


	

	$options[] = array(
		'name' => __( '使用帮助', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => "微信",
		'desc' => "扫描二维码并关注后获取支持与帮助",
		'id' => "weixin",
		'std' => "weixin",
		'type' => "images",
		'options' => array(
			'weixin' => $imagepath . 'weixin.png'
		)
	);
	$options[] = array(
		'name' => __( 'QQ', 'theme-textdomain' ),
		'desc' => __( '<a href="tencent://message/?uin=4541293&Site=wodepress.com/ngdao&Menu=yes" target=_blank>4541293</a>', 'theme-textdomain' ),
		'type' => 'info'
	);
	$options[] = array(
		'name' => __( '说明', 'theme-textdomain' ),
		'desc' => __( '如果在使用中遇到问题，请<a href="http://www.jianzhanpress.com" target=_blank>与我们联系</a>。', 'theme-textdomain' ),
		'type' => 'info'
	);

	return $options;
}