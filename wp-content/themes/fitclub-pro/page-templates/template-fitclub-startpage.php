<?php
/**
 * Template Name: FitClub Startpage
 *
 * @package ThemeGrill
 * @subpackage fitclub
 * @since 1.0.2
 */
?>

<?php get_header(); ?>

	<?php do_action( 'fitclub_before_content' ); ?>

	<div id="content" class="site-content">

		<?php if( is_active_sidebar( 'fitclub_frontpage_section' ) ) {
			if( !dynamic_sidebar( 'fitclub_frontpage_section' ) ):
			endif;
		} ?>
		<?php if( is_active_sidebar( 'fitclub_frontpage_middle_left' ) || is_active_sidebar( 'fitclub_frontpage_middle_right' )) { ?>
		<div class="faq_opening_hours_block">
			<div class="tg-container">
				<div class="tg-column-wrapper">
					<div class="tg-column-2">
					<?php
					if( is_active_sidebar( 'fitclub_frontpage_middle_left' ) ) {
						if( !dynamic_sidebar( 'fitclub_frontpage_middle_left' ) ):
						endif;
					}
					?>
					</div>

					<div class="tg-column-2">
					<?php
					if( is_active_sidebar( 'fitclub_frontpage_middle_right' ) ) {
						if( !dynamic_sidebar( 'fitclub_frontpage_middle_right' ) ):
						endif;
					}
					?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

		<?php
		if( is_active_sidebar( 'fitclub_frontpage_bottom' ) ) {
			if( !dynamic_sidebar( 'fitclub_frontpage_bottom' ) ):
			endif;
		}

		?>

	</div>

	<?php do_action( 'fitclub_after_content' ); ?>

<?php get_footer(); ?>