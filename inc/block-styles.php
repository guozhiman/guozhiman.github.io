<?php
/* 
 * 精智B2博客主题 
 * 主题版本 1.0
 * 主题制作 精智主题 http://www.jianzhanpress.com
 * QQ 4541293
 */
if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since wodepress 1.0
	 *
	 * @return void
	 */
	function wodepress_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'wodepress-columns-overlap',
				'label' => esc_html__( 'Overlap', 'wodepress' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'wodepress-border',
				'label' => esc_html__( 'Borders', 'wodepress' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'wodepress-border',
				'label' => esc_html__( 'Borders', 'wodepress' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'wodepress-border',
				'label' => esc_html__( 'Borders', 'wodepress' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'wodepress-image-frame',
				'label' => esc_html__( 'Frame', 'wodepress' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'wodepress-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'wodepress' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'wodepress-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'wodepress' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'wodepress-border',
				'label' => esc_html__( 'Borders', 'wodepress' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'wodepress-separator-thick',
				'label' => esc_html__( 'Thick', 'wodepress' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'wodepress-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'wodepress' ),
			)
		);
	}
	add_action( 'init', 'wodepress_register_block_styles' );
}
