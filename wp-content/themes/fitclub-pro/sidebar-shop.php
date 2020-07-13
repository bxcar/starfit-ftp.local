<?php
/**
 * The sidebar containing the widget area for WooCommerce Pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeGrill
 * @subpackage FitClub
 * @since FitClub 0.1
 */

if ( !is_active_sidebar( 'fitclub_shop_sidebar' ) ) {
   return;
}

?>

<aside id="secondary" role="complementary">

	<?php do_action( 'fitclub_before_shop_sidebar' ); ?>

	<?php dynamic_sidebar( 'fitclub_shop_sidebar' ); ?>

	<?php do_action( 'fitclub_after_shop_sidebar' ); ?>

</aside><!-- #secondary -->
