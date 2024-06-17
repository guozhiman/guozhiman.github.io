<?php
/* 
 * 精智B2博客主题 
 * 主题版本 1.0
 * 主题制作 精智主题 http://www.jianzhanpress.com
 * QQ 4541293
 */
class wodepress_Customize_Notice_Control extends WP_Customize_Control {
	/**
	 * The control type.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @var string
	 */
	public $type = 'wodepress-notice';

	/**
	 * Renders the control content.
	 *
	 * This simply prints the notice we need.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	public function render_content() {
		?>
		<div class="notice notice-warning">
			<p><?php esc_html_e( 'To access the Dark Mode settings, select a light background color.', 'wodepress' ); ?></p>
			<p><a href="<?php echo esc_url( __( 'https://wordpress.org/support/article/wodepress/#dark-mode-support', 'wodepress' ) ); ?>">
				<?php esc_html_e( 'Learn more about Dark Mode.', 'wodepress' ); ?>
			</a></p>
		</div>
		<?php
	}
}
