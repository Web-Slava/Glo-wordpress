<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Webmag
 */

if ( ! is_active_sidebar( 'sidebar-menu' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">

	<?php dynamic_sidebar('sidebar-menu'); ?>
	
</aside><!-- #secondary -->


<!-- <?php the_widget( 'WP_Widget_Recent_Posts', array (
		'title' => 'Resent Posts',
		'number' => '3',
	) ); ?> -->