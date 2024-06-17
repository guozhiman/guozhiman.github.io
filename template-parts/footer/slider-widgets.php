<?php
/**
 * 精智wordpress主题
 * This is the template that displays all of the <head> section and everything up until main.
 * @ link https://www.wodepress.com
 * @ QQ 4541293
 * @ package WodePress
 * @ subpackage wodepress.com
 * @ since TouMingTu 1.0
 */

if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

	<aside class="">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</aside>

<?php endif; ?>
