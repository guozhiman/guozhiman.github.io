<?php
/* 
 * 精智B2博客主题 
 * 主题版本 1.0
 * 主题制作 精智主题 http://www.jianzhanpress.com
 * QQ 4541293
 */
function wodepress_generate_css( $selector, $style, $value, $prefix = '', $suffix = '', $echo = true ) {

	// Bail early if there is no $selector elements or properties and $value.
	if ( ! $value || ! $selector ) {
		return '';
	}

	$css = sprintf( '%s { %s: %s; }', $selector, $style, $prefix . $value . $suffix );

	if ( $echo ) {
		/*
		 * Note to reviewers: $css contains auto-generated CSS.
		 * It is included inside <style> tags and can only be interpreted as CSS on the browser.
		 * Using wp_strip_all_tags() here is sufficient escaping to avoid
		 * malicious attempts to close </style> and open a <script>.
		 */
		echo wp_strip_all_tags( $css ); // phpcs:ignore WordPress.Security.EscapeOutput
	}
	return $css;
}
