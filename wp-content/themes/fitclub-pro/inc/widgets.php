<?php
/**
 * Contains all the functions related to sidebar and widget.
 *
 * @package ThemeGrill
 * @subpackage FitClub
 * @since FitClub 1.0
 */

add_action( 'widgets_init', 'fitclub_widgets_init' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fitclub_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'fitclub' ),
		'id'            => 'fitclub_right_sidebar',
		'description'   => esc_html__( 'Show widgets at Right side', 'fitclub' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'fitclub' ),
		'id'            => 'fitclub_left_sidebar',
		'description'   => esc_html__( 'Show widgets at Left side', 'fitclub' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '404 Page Sidebar', 'fitclub' ),
		'id'            => 'fitclub_error_404_page_sidebar',
		'description'   => esc_html__( 'Show widgets at 404 Error Page', 'fitclub' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Top Sidebar', 'fitclub' ),
		'id'            => 'fitclub_frontpage_section',
		'description'   => esc_html__( 'Show widgets at Front Page Content Section', 'fitclub'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Middle Left Sidebar', 'fitclub' ),
		'id'            => 'fitclub_frontpage_middle_left',
		'description'   => esc_html__( 'Show widgets at Front Page Middle Left Section', 'fitclub'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Middle Right Sidebar', 'fitclub' ),
		'id'            => 'fitclub_frontpage_middle_right',
		'description'   => esc_html__( 'Show widgets at Front Page Middle Right Section', 'fitclub'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Bottom Sidebar', 'fitclub' ),
		'id'            => 'fitclub_frontpage_bottom',
		'description'   => esc_html__( 'Show widgets at Front Page Bottom Section', 'fitclub'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	$footer_sidebar_count = get_theme_mod('fitclub_footer_widgets', '4');

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'fitclub' ),
		'id'            => 'fitclub_footer_sidebar1',
		'description'   => esc_html__( 'Show widgets at Footer section', 'fitclub' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title"><span>',
		'after_title'   => '</span></h4>',
	) );

	if ( $footer_sidebar_count >= 2 ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 2', 'fitclub' ),
			'id'            => 'fitclub_footer_sidebar2',
			'description'   => esc_html__( 'Show widgets at Footer section', 'fitclub' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );
	}

	if ( $footer_sidebar_count >= 3 ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 3', 'fitclub' ),
			'id'            => 'fitclub_footer_sidebar3',
			'description'   => esc_html__( 'Show widgets at Footer section', 'fitclub' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );
	}

	if ($footer_sidebar_count >= 4 ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 4', 'fitclub' ),
			'id'            => 'fitclub_footer_sidebar4',
			'description'   => esc_html__( 'Show widgets at Footer section', 'fitclub' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );
	}

	// WooCommerce Specific
	if( class_exists('WooCommerce') ) {
		register_sidebar( array(
				'name'          => esc_html__( 'Shop Sidebar', 'fitclub' ),
				'id'            => 'fitclub_shop_sidebar',
				'description'   => esc_html__( 'Show widgets at Front Page Content Section', 'fitclub'),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="section-title">',
				'after_title'   => '</h3>',
			)
		);

		register_widget( "fitclub_products_widget" );
	}

	// Widgets Registration
	register_widget( "fitclub_service_widget" );
	register_widget( "fitclub_about_us_widget" );
	register_widget( "fitclub_call_to_action_widget" );
	register_widget( "fitclub_testimonial_widget" );
	register_widget( "fitclub_team_widget" );
	register_widget( "fitclub_featured_posts_widget" );
	/* FitClub Pro */
	register_widget( "fitclub_video_cta_widget" );
	register_widget( "fitclub_stats_counter_widget" );
	register_widget( "fitclub_logo_widget" );
	register_widget( "fitclub_faq_widget" );
	register_widget( "fitclub_opening_hours_widget" );
	register_widget( "fitclub_contact_widget" );
}

// Service Widget
class fitclub_service_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_service_block',
			'description' => esc_html__( 'Display some pages as services.', 'fitclub' )
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__( 'TG: Service Widget', 'fitclub' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		$defaults['title']   = '';
		$defaults['number']  = '3';

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title           =  esc_attr( $instance['title'] );
		$number          =  absint( $instance[ 'number' ] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of pages to display:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p><?php esc_html_e( 'Note: Create the pages and select Service Template to display Services pages.', 'fitclub' ); ?></p>
	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                      = $old_instance;
		$instance[ 'title' ]           = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'number' ]          = absint( $new_instance[ 'number' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title           = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? esc_html( $instance[ 'title' ]) : '');
		$number          = isset( $instance[ 'number' ] ) ? absint( $instance[ 'number' ] ) : 3;

		$page_array = array();
		$pages = get_pages();

		// Gets the page with service template.
		foreach ( $pages as $page ) {
			$page_id       = $page->ID;
			$template_name = get_post_meta( $page_id, '_wp_page_template', true );
			if( $template_name == 'page-templates/template-service.php' ) {
				array_push( $page_array, $page_id );
			}
		}

		$get_service_pages = new WP_Query( array(
			'posts_per_page'      => $number,
			'post_type'           =>  array( 'page' ),
			'post__in'            => $page_array,
			'orderby'             => array( 'menu_order' => 'ASC', 'date' => 'DESC' )
		) );

		echo $before_widget; ?>
		<div  class="section-wrapper">
			<div class="tg-container">
				<div class="classes-wrapper">
					<?php if( !empty( $title ) ) echo $before_title .'<span>'. $title .'</span>'. $after_title; ?>

					<?php
					if( !empty( $page_array ) ) {
						$count = 0; ?>
					<div class="classes-block-wrapper clearfix">
						<div class="tg-column-wrapper">

						<?php
						while( $get_service_pages->have_posts() ):$get_service_pages->the_post();

						if ( $count % 3 == 0 && $count > 1 ) { ?> <div class='clearfix'></div> <?php } ?>

							<div class="tg-column-3">
							<?php
							if( has_post_thumbnail() ) {
									$image_class = 'class_img';
									$services_top = get_the_post_thumbnail( $post->ID, 'fitclub-featured-image' );
								?>
									<figure class="<?php echo $image_class; ?>">
										<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"><?php echo $services_top; ?></a>
									</figure>
								<?php } ?>

								<div class="class-content-wrapper">
									<h5 class="class-title"><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"> <?php echo esc_html( get_the_title() ); ?></a></h5>

									<div class="class-content">
										<?php the_excerpt(); ?>
									</div>

									<a class="class-read-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php esc_html_e( 'Подробнее', 'fitclub' ) ?></a>
								</div>
							</div>
						<?php $count++;
						endwhile; ?>
						 </div>
					</div>
					<?php
					// Reset Post Data
					wp_reset_postdata();
					} ?>
				</div>
			</div>
		</div>
	<?php echo $after_widget;
	}
}

// Featured Page/About Us Widget
class fitclub_about_us_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_about_block',
			'description' => esc_html__( 'Show your about page.', 'fitclub' )
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__( 'TG: About Widget', 'fitclub' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		$defaults[ 'background_color' ] = '#575757';
		$defaults[ 'background_image' ] = '';
		$defaults[ 'title' ]            = '';
		$defaults[ 'page_id' ]          = '';
		$defaults[ 'button_text' ]      = '';
		$defaults[ 'button_url' ]       = '';
		$defaults[ 'button_icon' ]      = '';

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title            = esc_attr( $instance[ 'title' ] );
		$background_color = esc_attr( $instance[ 'background_color' ] );
		$background_image = esc_url( $instance[ 'background_image' ] );
		$page_id          = absint( $instance[ 'page_id' ] );
		$button_text      = esc_attr( $instance[ 'button_text' ] );
		$button_url       = esc_url( $instance[ 'button_url' ] );
		$button_icon      = esc_attr( $instance[ 'button_icon' ] );
		?>
		<p>
		<strong><?php esc_html_e( 'Design Settings:', 'fitclub' ); ?></strong><br />

		<label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( 'Background Color:', 'fitclub' ); ?></label><br />
			<input class="my-color-picker" type="text" data-default-color="#575757" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo $background_color; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'background_image' ); ?>"> <?php esc_html_e( 'Background Image:', 'fitclub' ); ?> </label> <br />

		<div class="media-uploader" id="<?php echo $this->get_field_id( 'background_image' ); ?>">
			<div class="custom_media_preview">
				<?php if ( $background_image != '' ) : ?>
					<img class="custom_media_preview_default" src="<?php echo esc_url( $background_image ); ?>" style="max-width:100%;" />
				<?php endif; ?>
			</div>
			<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( 'background_image' ); ?>" name="<?php echo $this->get_field_name( 'background_image' ); ?>" value="<?php echo esc_url( $background_image ); ?>" style="margin-top:5px;" />
			<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( 'background_image' ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'fitclub' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'fitclub' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'fitclub' ); ?></button>
		</div>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p><?php esc_html_e('Select a page to display Title, Excerpt and Featured image.', 'fitclub') ?></p>
		<label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php esc_html_e( 'Page', 'fitclub' ); ?>:</label>

		<?php wp_dropdown_pages( array(
			'show_option_none'  => ' ',
			'name'              => $this->get_field_name( 'page_id' ),
			'selected'          => $page_id
			) );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php esc_html_e( 'Button Text:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo $button_text; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php esc_html_e( 'Button Redirect Link:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo $button_url; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_icon' ); ?>"><?php esc_html_e( 'Button Icon Class:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'button_icon' ); ?>" name="<?php echo $this->get_field_name( 'button_icon' ); ?>" placeholder="fa-cog" type="text" value="<?php echo $button_icon; ?>" />
		</p>

		<p>
		<?php
		$url = 'http://fontawesome.io/icons/';
		$link = sprintf( wp_kses( __( '<a href="%s" target="_blank">Refer here</a> For Icon Class', 'fitclub' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
		echo $link;
		?>
		</p>
		<?php
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'background_color'] = esc_attr($new_instance['background_color']);
		$instance[ 'background_image'] = esc_url_raw( $new_instance['background_image'] );
		$instance[ 'title' ]           = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'page_id' ]         = absint( $new_instance[ 'page_id' ] );
		$instance[ 'button_text' ]     = strip_tags( $new_instance[ 'button_text' ] );
		$instance[ 'button_url' ]      = esc_url_raw( $new_instance[ 'button_url' ] );
		$instance[ 'button_icon' ]     = strip_tags( $new_instance[ 'button_icon' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$background_color = isset( $instance[ 'background_color' ] ) ? $instance[ 'background_color' ] : '';
		$background_image = isset( $instance[ 'background_image' ] ) ? $instance[ 'background_image' ] : '';
		$page_id          = isset( $instance[ 'page_id' ] ) ? absint( $instance[ 'page_id' ] ) : '';
		$button_text      = isset( $instance[ 'button_text' ] ) ? $instance[ 'button_text' ] : '';
		$button_url       = isset( $instance[ 'button_url' ] ) ?  $instance[ 'button_url' ] : '#';
		$button_icon      = isset( $instance[ 'button_icon' ] ) ? $instance[ 'button_icon' ] : '';

		// For Multilingual compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'FitClub Pro', 'TG: About widget image' . $this->id, $background_image );
			
		}
		if ( function_exists( 'icl_t' ) ) {
			$background_image = icl_t( 'FitClub Pro', 'TG: About widget image'. $this->id, $background_image );
			
		}

		if ( !empty( $background_image ) ) {
			$bg_image_style = 'background:url(' . esc_url( $background_image ) . ') scroll no-repeat center top/cover;';
		} else {
			$bg_image_style = 'background-color:' . esc_attr( $background_color ) . ';';
		}
		echo $before_widget; ?>
		<div class="section-wrapper" style="<?php echo $bg_image_style; ?>">
			<div class="tg-container">

				<?php if( $page_id ) : ?>
				<div class="about-wrapper clearfix">
				<?php
				$the_query = new WP_Query( 'page_id='.$page_id );
					while( $the_query->have_posts() ):$the_query->the_post();
						$title_attribute = the_title_attribute( 'echo=0' );

						$output  = '<h3 class="about-title"><a href="' . esc_url( get_permalink() ) . '" title="' . $title_attribute . '" alt ="' . $title_attribute . '">' . esc_html ( get_the_title() ). '</a> </h3>';

						$output .= '<div class="about-content">' . get_the_content('', true) . '</div>';

						$output .= '<div class="about-btn-wrapper">';

						 {
							$output .= '<a class="about-btn" href="' . esc_url( $button_url ) . '">' .esc_html( $button_text ). ' <i class="fa ' . esc_attr( $button_icon ). '"></i></a>';
						}

						$output .= '</div>';
						echo $output;
						?>
					</div>
					<?php if( has_post_thumbnail() ) : ?>
						<div class="about-img-wrapper clearfix">
						<?php the_post_thumbnail( 'fitclub-about' ); ?>
						</div>
					<?php endif; ?>
					<?php endwhile;

					// Reset Post Data
					wp_reset_postdata(); ?>
			</div><!-- .about-content-wrapper -->
				<?php endif; ?>
		</div><!-- .tg-container -->
	<?php echo $after_widget;
	}
}

// Call to action widget
class fitclub_call_to_action_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_call_to_action_block',
			'description' => esc_html__( 'Use this widget to show the call to action section.', 'fitclub' )
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__( 'TG: Call To Action Widget', 'fitclub' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		$defaults[ 'background_color' ] = '#faa71d';
		$defaults[ 'background_image' ] = '';
		$defaults[ 'text' ]             = '';
		$defaults[ 'button_text' ]      = '';
		$defaults[ 'button_url' ]       = '';

		$instance = wp_parse_args( (array) $instance, $defaults );

		$background_color = esc_attr( $instance[ 'background_color' ] );
		$background_image = esc_url( $instance[ 'background_image' ] );
		$text             = esc_textarea( $instance[ 'text' ] );
		$button_text      = esc_attr( $instance[ 'button_text' ] );
		$button_url       = esc_url( $instance[ 'button_url' ] );
		?>
		<p>
			<strong><?php esc_html_e( 'Design Settings:', 'fitclub' ); ?></strong><br />
			<label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( 'Background Color:', 'fitclub' ); ?></label><br />
			<input class="my-color-picker" type="text" data-default-color="#faa71d" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo  $background_color; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'background_image' ); ?>"> <?php esc_html_e( 'Image:', 'fitclub' ); ?> </label> <br />

			<div class="media-uploader" id="<?php echo $this->get_field_id( 'background_image' ); ?>">
				<div class="custom_media_preview">
					<?php if ( $background_image != '' ) : ?>
						<img class="custom_media_preview_default" src="<?php echo esc_url( $background_image ); ?>" style="max-width:100%;" />
					<?php endif; ?>
				</div>
				<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( 'background_image' ); ?>" name="<?php echo $this->get_field_name( 'background_image' ); ?>" value="<?php echo esc_url( $background_image ); ?>" style="margin-top:5px;" />
				<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( 'background_image' ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'fitclub' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'fitclub' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'fitclub' ); ?></button>
			</div>
		</p>

		<strong><?php esc_html_e( 'Other Settings :', 'fitclub' ); ?></strong><br />

		<?php esc_html_e( 'Call to Action Main Text','fitclub' ); ?>
		<textarea class="widefat" rows="3" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id('button_text'); ?>"><?php esc_html_e( 'Button Text:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo $button_text; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('button_url'); ?>"><?php esc_html_e( 'Button Redirect Link:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id('button_url'); ?>" name="<?php echo $this->get_field_name('button_url'); ?>" type="text" value="<?php echo $button_url; ?>" />
		</p>
	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['background_color'] =  esc_attr( $new_instance['background_color'] );
		$instance['background_image'] =  esc_url_raw( $new_instance['background_image'] );

		$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed

		$instance[ 'button_text' ] = strip_tags( $new_instance[ 'button_text' ] );
		$instance[ 'button_url' ]  = esc_url_raw( $new_instance[ 'button_url' ] );
		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$background_color = isset( $instance[ 'background_color' ] ) ? $instance[ 'background_color' ] : '';
		$background_image = isset( $instance[ 'background_image' ] ) ? $instance[ 'background_image' ] : '';
		$text             = isset( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
		$button_text      = isset( $instance[ 'button_text' ] ) ? $instance[ 'button_text' ] : '';
		$button_url       = isset( $instance[ 'button_url' ] ) ? $instance[ 'button_url' ] : '';


		// For Multilingual compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'FitClub Pro', 'TG: Call to action widget image' . $this->id, $background_image );
			icl_register_string( 'FitClub Pro', 'TG: Call to action widget main text' . $this->id, $text );
			icl_register_string( 'FitClub Pro', 'TG: Call to action widget button text' . $this->id, $button_text );
			icl_register_string( 'FitClub Pro', 'TG: Call to action widget button url' . $this->id, $button_url );
		}
		if ( function_exists( 'icl_t' ) ) {
			$background_image = icl_t( 'FitClub Pro', 'TG: Call to action widget image'. $this->id, $background_image );
			$text             = icl_t( 'FitClub Pro', 'TG: Call to action widget main text'. $this->id, $text );
			$button_text      = icl_t( 'FitClub Pro', 'TG: Call to action widget button text'. $this->id, $button_text );
			$button_url       = icl_t( 'FitClub Pro', 'TG: Call to action widget button url'. $this->id, $button_url );
		}

		echo $before_widget;
		$bg_style = '';
		$bg_class = '';
		if ( !empty( $background_image ) ) {
			$bg_style = 'background:url(' . esc_url( $background_image ) . ') scroll no-repeat center top/cover;';
		} else {
			$bg_style = 'background-color:' . esc_attr( $background_color ) . ';';
			$bg_class = 'no-image';
		}
		?>
		<div class="section-wrapper <?php echo $bg_class; ?>" style="<?php echo $bg_style; ?>">
		<?php if ( !empty( $background_image ) ) : ?>
			<div class="bg-overlay"></div>
		<?php endif; ?>
			<div class="tg-container">
				<div class="cta-wrapper">
					<?php if( !empty( $text ) ) { ?>
						<h3 class="cta-title"><?php echo esc_html( $text ); ?></h3>
					<?php } ?>
					<?php if( !empty( $button_text ) ) { ?>
					<a class="cta-readmore" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_text ); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php echo $after_widget;
	}
}

// Testimonial Widget
class fitclub_testimonial_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_testimonial_block',
			'description' => esc_html__( 'Display some pages as testimonial.', 'fitclub' )
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__( 'TG: Testimonial Widget', 'fitclub' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		$defaults[ 'background_color' ] = '#575757';
		$defaults[ 'background_image' ] = '';
		$defaults['title']              = '';
		$defaults['number']             = 3;

		$instance = wp_parse_args( (array) $instance, $defaults );

		$background_color = esc_attr( $instance[ 'background_color' ] );
		$background_image = esc_url_raw( $instance[ 'background_image' ] );
		$title            = esc_attr( $instance['title'] );
		$number           = absint( $instance[ 'number' ] );
		?>

		<p>
			<strong><?php esc_html_e( 'Design Settings:', 'fitclub' ); ?></strong><br />
			<label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( 'Background Color:', 'fitclub' ); ?></label><br />
			<input class="my-color-picker" type="text" data-default-color="#faa71d" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo  $background_color; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'background_image' ); ?>"> <?php esc_html_e( 'Image:', 'fitclub' ); ?> </label> <br />

			<div class="media-uploader" id="<?php echo $this->get_field_id( 'background_image' ); ?>">
				<div class="custom_media_preview">
					<?php if ( $background_image != '' ) : ?>
						<img class="custom_media_preview_default" src="<?php echo esc_url( $background_image ); ?>" style="max-width:100%;" />
					<?php endif; ?>
				</div>
				<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( 'background_image' ); ?>" name="<?php echo $this->get_field_name( 'background_image' ); ?>" value="<?php echo esc_url( $background_image ); ?>" style="margin-top:5px;" />
				<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( 'background_image' ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'fitclub' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'fitclub' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'fitclub' ); ?></button>
			</div>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of pages to display:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p><?php esc_html_e( 'Note: Create the pages and select Testimonial Template to display Testimonial pages.', 'fitclub' ); ?></p>
	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                      = $old_instance;

		$instance['background_color']  =  esc_attr($new_instance['background_color']);
		$instance['background_image']  =  esc_url_raw( $new_instance['background_image'] );
		$instance[ 'title' ]           =  strip_tags( $new_instance[ 'title' ] );
		$instance[ 'number' ]          =  absint( $new_instance[ 'number' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		wp_enqueue_script( 'bxslider' );
		extract( $args );
		extract( $instance );

		global $post;
		$background_color = isset( $instance[ 'background_color' ] ) ? $instance[ 'background_color' ] : '';
		$background_image = isset( $instance[ 'background_image' ] ) ? $instance[ 'background_image' ] : '';
		$title            = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
		$number           = isset( $instance[ 'number' ] ) ? absint( $instance[ 'number' ] ) : 3;

		// For Multilingual compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'FitClub Pro', 'TG: Testimonial background widget image' . $this->id, $background_image );
		}
		if ( function_exists( 'icl_t' ) ) {
			$background_image = icl_t( 'FitClub Pro', 'TG: Testimonial background widget image'. $this->id, $background_image );
		}

		$page_array = array();
		$pages = get_pages();

		// Gets the page with service template.
		foreach ( $pages as $page ) {
			$page_id       = $page->ID;
			$template_name = get_post_meta( $page_id, '_wp_page_template', true );
			if( $template_name == 'page-templates/template-testimonial.php' ) {
				array_push( $page_array, $page_id );
			}
		}

		$get_testimonial_pages = new WP_Query( array(
			'posts_per_page'      => $number,
			'post_type'           =>  array( 'page' ),
			'post__in'            => $page_array,
			'orderby'             => array( 'menu_order' => 'ASC', 'date' => 'DESC' )
		) );

		$bg_style = '';
		$bg_class = '';
		if ( !empty( $background_image ) ) {
			$bg_style = 'background-image:url(' . esc_url( $background_image ) . ');scroll no-repeat center top/cover;';
		} else {
			$bg_style = 'background-color:' . esc_url( $background_color ). ';';
			$bg_class = 'no-image';
		}
		echo $before_widget; ?>
		<div  class="section-wrapper <?php echo $bg_class; ?>" style="<?php echo $bg_style; ?>">
			<div class="bg-overlay"></div>
			<div class="tg-container">
				<div class="testimonial-wrapper">
					<?php if( !empty( $title ) ) echo $before_title .'<span>'.esc_html( $title ).'</span>'. $after_title; ?>

					<?php
					if( !empty( $page_array ) ) {
						$count = 0; ?>
							<ul class="bxslider">
							<?php
							while( $get_testimonial_pages->have_posts() ):$get_testimonial_pages->the_post(); ?>

								<li>
									<div class="testimonial-content-wrapper clearfix">
									<?php
									if( has_post_thumbnail() ) {
											$image_class = 'testimonial-image';
											$testimonial_top = get_the_post_thumbnail( $post->ID, 'fitclub-testimonial' );
										?>
											<figure class="<?php echo $image_class; ?>">
												<?php echo $testimonial_top; ?>
											</figure>
										<?php } ?>

										<div class="testimonial-desc-wrapper">
											<div class="testimonial-desc">
												<?php the_excerpt(); ?>
											</div>
											<div class="testimonial-author"><?php echo esc_html( get_the_title() ); ?></div>
										</div>
									</div>
								</li>
							<?php
							endwhile; ?>
						</ul>
					<?php
					// Reset Post Data
					wp_reset_postdata();
					} ?>
				</div>
			</div>
		</div>
	<?php echo $after_widget;
	}
}

// Team Widget
class fitclub_team_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_team_block',
			'description' => esc_html__( 'Show your Team Members.', 'fitclub' )
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);

		parent::__construct( false, $name = esc_html__( 'TG: Our Team Widget', 'fitclub' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		$defaults['title']              = '';
		$defaults['number']             = 3;

		$instance         = wp_parse_args( (array) $instance, $defaults );

		$title            = esc_attr( $instance[ 'title' ] );
		$number           = absint( $instance[ 'number' ] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of pages to display:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<p><?php esc_html_e( 'Note: Create the pages and select Team Template to display Our Team pages.', 'fitclub' ); ?></p>
		<?php }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ]      = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'number' ]     = absint( $new_instance[ 'number' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title  = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
		$number = isset( $instance[ 'number' ] ) ? absint( $instance[ 'number' ] ) : 3;

		$page_array = array();
		$pages = get_pages();
		// get the pages associated with Our Team Template.
		foreach ( $pages as $page ) {
			$page_id = $page->ID;
			$template_name = get_post_meta( $page_id, '_wp_page_template', true );
			if( $template_name == 'page-templates/template-team.php' ) {
				array_push( $page_array, $page_id );
			}
		}

		$get_featured_pages = new WP_Query( array(
			'posts_per_page'        => $number,
			'post_type'             =>  array( 'page' ),
			'post__in'              => $page_array,
			'orderby'               => array( 'menu_order' => 'ASC', 'date' => 'DESC' )
		) );

		echo $before_widget; ?>
		<div class="section-wrapper">
			<div class="tg-container">
				<div class="trainer-wrapper tg-column-wrapper">
					<?php if( !empty( $title ) ) echo $before_title .'<span>'. esc_html( $title ) .'</span>'. $after_title; ?>

					<?php if( !empty ( $page_array ) ) : ?>
					<?php while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post();

						$title_attribute = the_title_attribute( 'echo=0' ); ?>

						<div class="trainer-block tg-column-3">
							<figure class="trainer-img">
								<?php
								if( has_post_thumbnail() ) {
									the_post_thumbnail( 'fitclub-team' );
								} else {
										echo '<img src="' . get_template_directory_uri() . '/images/placeholder-team.jpg' . '">';
								}
								?>
							</figure>
							<div class="trainer-content-wrapper">
								<h3 class="trainer-title">
									<a href="<?php echo get_permalink() ?>" title="<?php echo $title_attribute; ?>" alt ="<?php echo $title_attribute; ?>"><?php the_title(); ?></a>
								</h3>
								<div class="trainer-content">
									<?php the_excerpt(); ?>
								</div>
								<div class="trainer-author">
								<?php
								$fitclub_designation = get_post_meta( $post->ID, 'fitclub_designation', true );
                                 if( !empty( $fitclub_designation ) ) {
									$fitclub_designation = isset( $fitclub_designation ) ? esc_attr( $fitclub_designation ) : '';
								}
								echo esc_html ( $fitclub_designation );
								?>
								</div>
							</div>

						</div><!-- .tg-column-3 -->
						<?php
						endwhile;

						// Reset Post Data
						wp_reset_postdata();
						endif; ?>
				</div>
			</div><!-- .tg-container -->
		</div><!-- .section-wrapper -->

		<?php echo $after_widget;
	}
}


// Featured Post Widget
class fitclub_featured_posts_widget extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_featured_posts_block',
			'description' => esc_html__( 'Display latest posts or posts of specific category', 'fitclub')
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false,$name= esc_html__( 'TG: Featured Posts', 'fitclub' ),$widget_ops);
	}

	function form( $instance ) {
		$defaults[ 'title' ]      = '';
		$defaults[ 'number' ]     = 3;
		$defaults[ 'type' ]       = 'latest';
		$defaults[ 'category' ]   = '';
		$defaults[ 'button_text'] = '';
		$defaults[ 'button_url' ] = '';

		$instance = wp_parse_args( (array) $instance, $defaults );


		$title       = esc_attr( $instance[ 'title' ] );
		$number      = absint( $instance[ 'number' ] );
		$type        = sanitize_text_field( $instance[ 'type' ] );
		$category    = absint( $instance[ 'category' ] );
		$button_text = esc_attr( $instance[ 'button_text' ] );
		$button_url  = esc_url( $instance[ 'button_url' ] ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to display:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest"/><?php esc_html_e( 'Show latest Posts', 'fitclub' );?><br />
			<input type="radio" <?php checked( $type,'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category"/><?php esc_html_e( 'Show posts from a category', 'fitclub' );?><br />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php esc_html_e( 'Select category', 'fitclub' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'category' ), 'selected' => $category ) ); ?>
		</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance[ 'title' ]       = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'number' ]      = absint( $new_instance[ 'number' ] );
		$instance[ 'type' ]        = sanitize_text_field( $new_instance[ 'type' ] );
		$instance[ 'category' ]    = absint( $new_instance[ 'category' ] );
		$instance[ 'button_text' ] = strip_tags( $new_instance[ 'button_text' ] );
		$instance[ 'button_url' ]  = esc_url_raw( $new_instance[ 'button_url' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		wp_enqueue_script( 'bxslider' );
		extract( $args );
		extract( $instance );

		global $post;
		$title       = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
		$number      = isset( $instance[ 'number' ] ) ?  absint( $instance[ 'number' ] ) : 3;
		$type        = isset( $instance[ 'type' ] ) ? sanitize_text_field( $instance[ 'type' ] ) : 'latest' ;
		$category    = isset( $instance[ 'category' ] ) ? absint( $instance[ 'category' ] ) : '';
		$button_text = isset( $instance[ 'button_text' ] ) ? $instance[ 'button_text' ] : '';
		$button_url  = isset( $instance[ 'button_url' ] ) ? $instance[ 'button_url' ] : '#';

		if( $type == 'latest' ) {
			$get_featured_posts = new WP_Query( array(
				'posts_per_page'        => $number,
				'post_type'             => 'post',
				'ignore_sticky_posts'   => true
			) );
		}
		else {
			$get_featured_posts = new WP_Query( array(
				'posts_per_page'        => $number,
				'post_type'             => 'post',
				'category__in'          => $category
			) );
		}

		// For Multilingual compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'FitClub Pro', 'TG: Featured Post widget button text' . $this->id, $button_text );
			icl_register_string( 'FitClub Pro', 'TG: Featured Post widget button url' . $this->id, $button_url );
		}
		if ( function_exists( 'icl_t' ) ) {
			$button_text      = icl_t( 'FitClub Pro', 'TG: Featured Post widget button text'. $this->id, $button_text );
			$button_url       = icl_t( 'FitClub Pro', 'TG: Featured Post widget button url'. $this->id, $button_url );
		}

		echo $before_widget; ?>

		<div class="section-wrapper">
			<div class="tg-container">
				<?php if ( !empty( $title ) ) { echo $before_title .'<span>'. esc_html( $title ) .'</span>'. $after_title; } ?>

				<div class="blog-wrapper">
					<ul class="blog-slider">
						<?php
						while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post(); ?>
						<li>
							<div class="blog-content-wrapper">
								<?php
								$time_string = '<time class="post-date" datetime="%1$s">%2$s</time>';

								$time_string = printf( $time_string,
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date( 'M j' ) )
									);

								?>
								<figure class="blog-img">
									<?php
									if( has_post_thumbnail() ) {
										the_post_thumbnail('fitclub-featured-image');
									} else { ?>
										<img src='<?php echo get_template_directory_uri(); ?>/images/placeholder-blog.jpg' alt='<?php esc_attr_e('Blog Image', 'fitclub');?>' />
									<?php } ?>
								</figure>

								<div class="blog-desc-wrap">

									<h4 class="blog-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h4>

									<div class="blog-desc">
										<?php the_excerpt(); ?>
									</div>

									<a class="blog-readmore" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php echo get_theme_mod( 'fitclub_read_more_text', esc_html__( 'Read More', 'fitclub' ) ); ?></a>
								</div>
							</div>
						</li>
						<?php
							endwhile;
						?>
					</ul>
				</div><!-- .blog-wrapper -->
			</div><!-- .tg-container -->
		</div><!-- .section-wrapper -->
		<?php
		// Reset Post Data
		wp_reset_postdata();
		echo $after_widget;
	}
}

/* FitClub Pro Widgets */
// Call to Action Video Widget
class fitclub_video_cta_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_call_to_action_video',
			'description' => esc_html__( 'Call to Action button with Video.', 'fitclub' )
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__( 'TG: Call to Action Video Widget', 'fitclub' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {

		$allowed_tag = array(
		'iframe'=> array(
			'height'      => array(),
			'width'       => array(),
			'src'         => array(),
			'frameborder' => array()
			)
		);

		$defaults[ 'background_color' ] = '#fafafa';
		$defaults[ 'background_image' ] = '';
		$defaults[ 'title' ]            = '';
		$defaults[ 'page_id' ]          = '';
		$defaults[ 'video_embed' ]      = '';
		$defaults[ 'button_text' ]      = '';
		$defaults[ 'button_url' ]       = '';

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title            = esc_attr( $instance[ 'title' ] );
		$background_color = esc_attr( $instance[ 'background_color' ] );
		$background_image = esc_url( $instance[ 'background_image' ] );
		$page_id          = absint( $instance[ 'page_id' ] );
		$video_embed      = wp_kses( $instance['video_embed'], $allowed_tag );
		$button_text      = esc_attr( $instance[ 'button_text' ] );
		$button_url       = esc_url( $instance[ 'button_url' ] );
		?>
		<p>
		<strong><?php esc_html_e( 'Design Settings:', 'fitclub' ); ?></strong><br />

		<label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( 'Background Color:', 'fitclub' ); ?></label><br />
			<input class="my-color-picker" type="text" data-default-color="#575757" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo $background_color; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'background_image' ); ?>"> <?php esc_html_e( 'Background Image:', 'fitclub' ); ?> </label> <br />

			<div class="media-uploader" id="<?php echo $this->get_field_id( 'background_image' ); ?>">
				<div class="custom_media_preview">
					<?php if ( $background_image != '' ) : ?>
						<img class="custom_media_preview_default" src="<?php echo esc_url( $background_image ); ?>" style="max-width:100%;" />
					<?php endif; ?>
				</div>
				<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( 'background_image' ); ?>" name="<?php echo $this->get_field_name( 'background_image' ); ?>" value="<?php echo esc_url( $background_image ); ?>" style="margin-top:5px;" />
				<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( 'background_image' ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'fitclub' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'fitclub' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'fitclub' ); ?></button>
			</div>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<?php esc_html_e( 'Video Iframe','fitclub' ); ?>
		<textarea class="widefat" rows="3" cols="20" id="<?php echo $this->get_field_id('video_embed'); ?>" name="<?php echo $this->get_field_name('video_embed'); ?>"><?php echo $video_embed; ?></textarea>

		<p><?php esc_html_e('Select a page to display Title, and Excerpt.', 'fitclub') ?></p>
		<label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php esc_html_e( 'Page', 'fitclub' ); ?>:</label>

		<?php wp_dropdown_pages( array(
			'show_option_none'  => ' ',
			'name'              => $this->get_field_name( 'page_id' ),
			'selected'          => $page_id
			) );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php esc_html_e( 'Button Text:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo $button_text; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php esc_html_e( 'Button Redirect Link:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo $button_url; ?>" />
		</p>

		<p>
		<?php
		$url = 'http://fontawesome.io/icons/';
		$link = sprintf( wp_kses( __( '<a href="%s" target="_blank">Refer here</a> For Icon Class', 'fitclub' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
		echo $link;
		?>
		</p>
		<?php
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$allowed_tag = array(
		'iframe'=> array(
			'height'      => array(),
			'width'       => array(),
			'src'         => array(),
			'frameborder' => array()
			)
		);

		$instance[ 'background_color'] = esc_attr($new_instance['background_color']);
		$instance[ 'background_image'] = esc_url_raw( $new_instance['background_image'] );
		$instance[ 'title' ]           = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'page_id' ]         = absint( $new_instance[ 'page_id' ] );
		$instance[ 'video_embed' ]     = wp_kses( $new_instance['video_embed'], $allowed_tag );
		$instance[ 'button_text' ]     = strip_tags( $new_instance[ 'button_text' ] );
		$instance[ 'button_url' ]      = esc_url_raw( $new_instance[ 'button_url' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$allowed_tag = array(
		'iframe'=> array(
			'height'      => array(),
			'width'       => array(),
			'src'         => array(),
			'frameborder' => array()
			)
		);
		$background_color = isset( $instance[ 'background_color' ] ) ? $instance[ 'background_color' ] : '';
		$background_image = isset( $instance[ 'background_image' ] ) ? $instance[ 'background_image' ] : '';
		$page_id          = isset( $instance[ 'page_id' ] ) ? absint( $instance[ 'page_id' ] ) : '';
		$video_embed      = isset( $instance[ 'video_embed'] ) ? $instance['video_embed'] : '';
		$button_text      = isset( $instance[ 'button_text' ] ) ? $instance[ 'button_text' ] : '';
		$button_url       = isset( $instance[ 'button_url' ] ) ? $instance[ 'button_url' ] : '#';

		// For Multilingual compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'FitClub Pro', 'TG: Video CTA widget image' . $this->id, $background_image );
			icl_register_string( 'FitClub Pro', 'TG: Video CTA widget Video Iframe' . $this->id, $video_embed );
			icl_register_string( 'FitClub Pro', 'TG: Video CTA widget button text' . $this->id, $button_text );
			icl_register_string( 'FitClub Pro', 'TG: Video CTA widget button url' . $this->id, $button_url );
		}
		if ( function_exists( 'icl_t' ) ) {
			$background_image = icl_t( 'FitClub Pro', 'TG: Video CTA widget image'. $this->id, $background_image );
			$video_embed      = icl_t( 'FitClub Pro', 'TG: Video CTA widget Video Iframe'. $this->id, $video_embed );
			$button_text      = icl_t( 'FitClub Pro', 'TG: Video CTA widget button text'. $this->id, $button_text );
			$button_url       = icl_t( 'FitClub Pro', 'TG: Video CTA widget button url'. $this->id, $button_url );
		}

		if ( !empty( $background_image ) ) {
			$bg_image_style = 'background:url(' . esc_url( $background_image ) . ') scroll no-repeat center top/cover;';
		} else {
			$bg_image_style = 'background-color:' . esc_attr( $background_color ). ';';
		}
		echo $before_widget; ?>
		<div class="section-wrapper" style="<?php echo $bg_image_style; ?>">
			<div class="tg-container">

				<?php if( $page_id ) : ?>
				<div class="cta-wrapper tg-column-wrapper">
					<div class="cta-block tg-column-2">
						<div class="cat-wrapper">
							<?php
							$the_query = new WP_Query( 'page_id='.$page_id );
							while( $the_query->have_posts() ):$the_query->the_post();
							$title_attribute = the_title_attribute( 'echo=0' );

							$output  = '<h3 class="cta-title"> <a href="' . esc_url( get_permalink() ) . '" title="' . $title_attribute . '" alt ="' . $title_attribute . '">' . esc_html ( get_the_title() ). '</a></h3>';

							$output .= '<div class="entry-content">' . get_the_excerpt() . '</div>';

							if ( !empty ( $button_text ) ) {
								$output .= '<a class="cta-readmore" href="' . $button_url . '">' .$button_text. '</a>';
							}

							echo $output;
							?>
						</div>
					</div>
					<?php endwhile;

					// Reset Post Data
					wp_reset_postdata(); ?>
					<div class="cta-block tg-column-2">
						<?php echo wp_kses( $video_embed, $allowed_tag ); ?>
					</div>
				</div>
				<?php endif; ?>
			</div><!-- .tg-container -->
		</div><!-- .section-wrapper -->
	<?php echo $after_widget;
	}
}

/**
 * Stats Counter widget
 */
class fitclub_stats_counter_widget extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_fun_facts',
			'description' => esc_html__( 'Widget to show Stats Counter', 'fitclub')
		);
		$control_ops = array(
			'width' => 200,
			'height' => 250
		);
		parent::__construct( false, $name= esc_html__( 'TG: Stats Counter', 'fitclub' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'background_image' => '', 'background_color' => '', 'facts_title' => '', 'facts_desc' => '', 'fact_num-1' => '', 'fact_num-2' => '', 'fact_num-3' => '', 'fact_num-4' => '', 'fact-1' => '', 'fact-2' => '', 'fact-3' => '', 'fact-4' => '', 'icon-1' => '', 'icon-2' => '', 'icon-3' => '', 'icon-4' => '') );

		$background_color          = esc_attr( $instance[ 'background_color' ] );
		$background_image          = esc_url_raw( $instance[ 'background_image' ] );
		$instance[ 'facts_title' ] = strip_tags( $instance[ 'facts_title' ] );
		$instance[ 'facts_desc' ]  = strip_tags( $instance[ 'facts_desc' ] );

		for ( $i=1; $i<=4; $i++ ) {
			$fact_num              = 'fact_num-'.$i;
			$fact                  = 'fact-'.$i;
			$icon                  = 'icon-'.$i;
			$instance[ $fact_num ] = absint( $instance[ $fact_num ] );
			$instance[ $fact ]     = strip_tags( $instance[ $fact ] );
			$instance[ $icon ]     = esc_attr( $instance[ $icon ] );
		} ?>

	<p>
		<strong><?php esc_html_e( 'DESIGN SETTINGS :', 'fitclub' ); ?></strong><br />
		<label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( 'Background Color:', 'fitclub' ); ?></label><br />
		<input class="my-color-picker" type="text" data-default-color="#000000 id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo  $background_color; ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'background_image' ); ?>"> <?php esc_html_e( 'Image:', 'fitclub' ); ?> </label> <br />

		<div class="media-uploader" id="<?php echo $this->get_field_id( 'background_image' ); ?>">
			<div class="custom_media_preview">
				<?php if ( $background_image != '' ) : ?>
					<img class="custom_media_preview_default" src="<?php echo esc_url( $background_image ); ?>" style="max-width:100%;" />
				<?php endif; ?>
			</div>
			<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( 'background_image' ); ?>" name="<?php echo $this->get_field_name( 'background_image' ); ?>" value="<?php echo esc_url( $background_image ); ?>" style="margin-top:5px;" />
			<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( 'background_image' ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'fitclub' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'fitclub' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'fitclub' ); ?></button>
		</div>
	</p>

	<strong><?php esc_html_e( 'OTHER SETTINGS :', 'fitclub' ); ?></strong><br />

	<p>
		<label for="<?php echo $this->get_field_id( 'facts_title' ); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'facts_title' ); ?>" name="<?php echo $this->get_field_name( 'facts_title' ); ?>" type="text" value="<?php echo $instance[ 'facts_title' ]; ?>" />
	</p>

	<?php esc_html_e( 'Description:','fitclub' ); ?>
	<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'facts_desc' ); ?>" name="<?php echo $this->get_field_name( 'facts_desc' ); ?>"><?php echo $instance[ 'facts_desc' ];?></textarea>

	<?php for ( $i=1; $i<=4; $i++ ) {
		$fact_num = 'fact_num-'.$i;
		$fact = 'fact-'.$i;
		$icon = 'icon-'.$i;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( $fact_num ); ?>"><?php esc_html_e( 'Fact number: ', 'fitclub' ); echo $i; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( $fact_num ); ?>" name="<?php echo $this->get_field_name( $fact_num ); ?>" type="text" value="<?php echo $instance[ $fact_num ]; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( $fact ); ?>"><?php esc_html_e( 'Fact Detail:', 'fitclub' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( $fact ); ?>" name="<?php echo $this->get_field_name( $fact ); ?>" type="text" value="<?php echo $instance[ $fact ]; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( $icon ); ?>"><?php esc_html_e( 'Icon Class:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( $icon ); ?>" name="<?php echo $this->get_field_name( $icon ); ?>" placeholder="fa-trophy" type="text" value="<?php echo $instance[ $icon ]; ?>" />
		</p>
		<hr/>
	<?php } ?>
	<p>
		<?php
		$url = 'http://fontawesome.io/icons/';
		$link = sprintf( wp_kses( __( '<a href="%s" target="_blank">Refer here</a> For Icon Class', 'fitclub' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
		echo $link;
		?>
	</p>
	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['background_color'] =  $new_instance['background_color'];
		$instance['background_image'] =  esc_url_raw( $new_instance['background_image'] );
		$instance[ 'facts_title' ] = strip_tags( $new_instance[ 'facts_title' ] );

		if ( current_user_can('unfiltered_html') ) {
			$instance[ 'facts_desc' ] =  $new_instance[ 'facts_desc' ];
		}
		else {
			$instance[ 'facts_desc' ] = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'facts_desc' ] ) ) ); // wp_filter_post_kses() expects slashed
		}

		for( $i=1; $i<=4; $i++ ) {
			$fact_num = 'fact_num-'.$i;
			$fact = 'fact-'.$i;
			$icon = 'icon-'.$i;
			$instance[ $fact_num ] = absint( $new_instance[ $fact_num ] );
			$instance[ $fact ] = strip_tags( $new_instance[ $fact ] );
			$instance[ $icon ] = strip_tags( $new_instance[ $icon ] );
		}
		return $instance;
	}

	function widget( $args, $instance ) {
		
		extract( $args );
		extract( $instance );

		$background_color = isset( $instance[ 'background_color' ] ) ? $instance[ 'background_color' ] : '';
		$background_image = isset( $instance[ 'background_image' ] ) ? $instance[ 'background_image' ] : '';
		$facts_title = apply_filters( 'widget_title', isset( $instance[ 'facts_title' ] ) ? $instance[ 'facts_title' ] : '');
		$facts_desc = apply_filters( 'widget_text', empty( $instance['facts_desc'] ) ? '' : $instance['facts_desc'], $instance );

		echo $before_widget;
		$bg_image_style = '';
		if ( !empty( $background_image ) ) {
		$bg_image_style .= 'background-image:url(' . $background_image . ');background-repeat:no-repeat;background-size:cover;background-attachment:fixed;';
		$bg_image_class = 'parallax-section';
		}else {
		$bg_image_style .= 'background-color:' . $background_color . ';';
		$bg_image_class = 'no-bg-image';
		} ?>
		<div class="parallax-overlay"> </div>
		<div class="section-wrapper  <?php echo $bg_image_class; ?>" style="<?php echo $bg_image_style; ?>">
			<div class="tg-container">
				<div class="fact clearfix">

					<div class="section-title-wrapper">
						<?php if( !empty( $facts_title ) ) echo $before_title.'<span>' .esc_html( $facts_title ) .'</span>'. $after_title;
					if( !empty( $facts_desc ) ) { ?>
					<h4 class="section-sub-title"><?php echo esc_textarea( $facts_desc ); ?></h4>
					<?php } ?>
					</div>

					<div class="counter-wrapper tg-column-wrapper clearfix">
						<?php
						for( $i=1; $i<=4; $i++ ) {
						$fact_num = 'fact_num-'.$i;
						$fact = 'fact-'.$i;
						$icon = 'icon-'.$i;

						$fact_num = isset( $instance[ $fact_num ] ) ? $instance[ $fact_num ] : '';
						$fact = isset( $instance[ $fact ] ) ? $instance[ $fact ] : '';
						$icon = isset( $instance[ $icon ] ) ? $instance[ $icon ] : '';

						// For Multilingual compatibility
						if( !empty( $fact ) ) {
							if ( function_exists( 'icl_register_string' ) ) {
								icl_register_string( 'Fitclub Pro', 'TG: Stats Counter' . $this->id . $i , $fact );
							}

							if ( function_exists( 'icl_t' ) ) {
								$fact = icl_t( 'Fitclub Pro', 'TG: Stats Counter' . $this->id . $i , $fact );
							}
						}

						if( isset( $fact_num  ) ) : ?>
						<div class="counter-block-wrapper tg-column-4 clearfix">
							<div class="fact-block">
								<?php
								echo '<span class="counter">' . $fact_num . '</span>';
								echo '<span class="counter-icon"> <i class="fa ' . esc_html( $icon ) . '"></i> </span>';
								echo '<span class="counter-text">' . esc_html( $fact ) . '</span>';
								?>
							</div>
						</div>
						<?php endif;
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
		echo $after_widget;
	}
}

// Clients Logo Widget
class fitclub_logo_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'client-section clearfix',
			'description' => esc_html__( 'Add your clients/brand logo images here', 'fitclub')
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false,$name= esc_html__( 'TG: Logo', 'fitclub' ),$widget_ops);
	}

	function form( $instance ) {
		$instance 	= wp_parse_args( (array) $instance,
						array(
							'title'        => '',
							'logo_image1'  => '',
							'logo_link1'   => '',
							'logo_image2'  => '',
							'logo_link2'   => '',
							'logo_image3'  => '',
							'logo_link3'   => '',
							'logo_image4'  => '',
							'logo_link4'   => '',
							'logo_image5'  => '',
							'logo_link5'   => '',
						)
					);
		$title 		= esc_attr( $instance[ 'title' ] );

		for ( $i = 1; $i < 6; $i++ ) {
			$image_link = 'logo_link'.$i;
			$image_url  = 'logo_image'.$i;

			$instance[ $image_link ] = esc_url( $instance[ $image_link ] );
			$instance[ $image_url ]  = esc_url( $instance[ $image_url ] );
		}

	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
		<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<label><?php esc_html_e( 'Add your clients/brands logo Here', 'fitclub' ); ?></label>
	<?php
		for ( $i = 1; $i < 6 ; $i++ ) {
			$image_link = 'logo_link'.$i;
			$image_url = 'logo_image'.$i;
	?>
	<p>
		<label for="<?php echo $this->get_field_id( $image_link ); ?>"> <?php esc_html_e( 'Logo Link ', 'fitclub' ); echo $i; ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( $image_link ); ?>" name="<?php echo $this->get_field_name( $image_link ); ?>" value="<?php echo $instance[$image_link]; ?>"/>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( $image_url ); ?>"> <?php esc_html_e( 'Logo Image ', 'fitclub' ); echo $i; ?></label>

		<div class="media-uploader" id="<?php echo $this->get_field_id( $image_url ); ?>">
			<div class="custom_media_preview">
				<?php if ( $instance[ $image_url ] != '' ) : ?>
					<img class="custom_media_preview_default" src="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="max-width:100%;" />
				<?php endif; ?>
			</div>
			<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( $image_url ); ?>" name="<?php echo $this->get_field_name( $image_url ); ?>" value="<?php echo esc_url( $instance[$image_url] ); ?>" style="margin-top:5px;" />
			<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( $image_url ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'fitclub' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'fitclub' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'fitclub' ); ?></button>
		</div>
	</p>

	<?php } // Loop ending
	}
	function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance[ 'title' ]     = strip_tags( $new_instance[ 'title' ] );

		for ( $i = 1; $i < 7; $i++ ) {
			$image_link = 'logo_link'.$i;
			$image_url  = 'logo_image'.$i;

			$instance[ $image_link ] = esc_url_raw( $new_instance[ $image_link ] );
			$instance[ $image_url ]  = esc_url_raw( $new_instance[ $image_url ] );
      }

		return $instance;
	}

	function widget( $args, $instance ) {

		extract( $args );
		extract( $instance );

		$title       = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

		$image_array = array();
		$link_array  = array();

		$j = 0;
		for ( $i = 1; $i < 6; $i++ ) {
			$image_link = 'logo_link'.$i;
			$image_url = 'logo_image'.$i;

			$image_link = isset( $instance[ $image_link ] ) ? $instance[ $image_link ] : '';
			$image_url = isset( $instance[ $image_url ] ) ? $instance[ $image_url ] : '';

			array_push( $link_array, $image_link );
			array_push( $image_array, $image_url );

			$j++;
		}

		echo $before_widget; ?>

		<div class="tg-container">
			<div class="tg-column-wrapper">
			<?php if ( !empty( $title ) ) { ?>
			<?php echo $before_title. '<span>'. esc_html( $title ) .'</span>'. $after_title; ?>
			<?php }

			$output = '';
			if ( !empty( $image_array ) ) {
				$output .= '<ul class="client-slider">';
				for ( $i = 1; $i < 6; $i++ ) {
					$j = $i - 1;
					if( !empty( $image_array[$j] ) ) {
						$output .= '<li>';
						if ( !empty( $link_array[$j] ) ) {
							$output .= '<a href="'.esc_url($link_array[$j]).'" class="logo-link" target="_blank" rel="nofollow">
											<img src="'.esc_url($image_array[$j]).'" alt="'.esc_attr__('Logo Image', 'fitclub').'">
										</a>';
						} else {
							$output .= '<img src="'.esc_url($image_array[$j]).'" alt="'.esc_attr__('Logo Image', 'fitclub').'">';
						}
						$output .= '</li>';
					}
				}
				$output .= '</ul>';
				echo $output;
			}
			?>
			</div>
		</div>
		<?php
		echo $after_widget;
	}
}

// FitClub Products Widget
class fitclub_products_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget-collection',
			'description' => esc_html__( 'Show your WooCommerce Products in elegant way.', 'fitclub' )
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__( 'TG: Products Widget', 'fitclub' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		$defaults[ 'background_color' ] = '#575757';
		$defaults[ 'background_image' ] = '';
		$defaults[ 'title' ]            = '';
		$defaults[ 'category']          = '';
		$defaults[ 'button_text' ]      = '';
		$defaults[ 'button_url' ]       = '';

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title            = esc_attr( $instance[ 'title' ] );
		$category         = absint( $instance[ 'category' ] );
		$background_color = esc_attr( $instance[ 'background_color' ] );
		$background_image = esc_url( $instance[ 'background_image' ] );
		$button_text      = esc_attr( $instance[ 'button_text' ] );
		$button_url       = esc_url( $instance[ 'button_url' ] );
		?>
		<p>
		<strong><?php esc_html_e( 'Design Settings:', 'fitclub' ); ?></strong><br />

		<label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php esc_html_e( 'Background Color:', 'fitclub' ); ?></label><br />
			<input class="my-color-picker" type="text" data-default-color="#575757" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo $background_color; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'background_image' ); ?>"> <?php esc_html_e( 'Background Image:', 'fitclub' ); ?> </label> <br />

		<div class="media-uploader" id="<?php echo $this->get_field_id( 'background_image' ); ?>">
			<div class="custom_media_preview">
				<?php if ( $background_image != '' ) : ?>
					<img class="custom_media_preview_default" src="<?php echo esc_url( $background_image ); ?>" style="max-width:100%;" />
				<?php endif; ?>
			</div>
			<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( 'background_image' ); ?>" name="<?php echo $this->get_field_name( 'background_image' ); ?>" value="<?php echo esc_url( $background_image ); ?>" style="margin-top:5px;" />
			<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( 'background_image' ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'fitclub' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'fitclub' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'fitclub' ); ?></button>
		</div>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php esc_html_e( 'Category:', 'fitclub' ); ?></label>
			<?php
			wp_dropdown_categories(
				array(
					'show_option_none' => '',
					'name'             => $this->get_field_name( 'category' ),
					'selected'         => $instance['category'],
					'taxonomy'         => 'product_cat'
				)
			);
			?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php esc_html_e( 'Button Text:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo $button_text; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php esc_html_e( 'Button Redirect Link:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo $button_url; ?>" />
		</p>
		<?php
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'background_color'] = esc_attr($new_instance['background_color']);
		$instance[ 'background_image'] = esc_url_raw( $new_instance['background_image'] );
		$instance[ 'title' ]           = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'category' ]       = absint( $new_instance[ 'category' ] );
		$instance[ 'button_text' ]     = strip_tags( $new_instance[ 'button_text' ] );
		$instance[ 'button_url' ]      = esc_url_raw( $new_instance[ 'button_url' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title            = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? esc_html( $instance[ 'title' ] ) : '');
		$category         = isset( $instance[ 'category' ] ) ? absint( $instance[ 'category' ] ) : '';
		$background_color = isset( $instance[ 'background_color' ] ) ? esc_attr( $instance[ 'background_color' ] ) : '';
		$background_image = isset( $instance[ 'background_image' ] ) ? esc_url( $instance[ 'background_image' ] ) : '';
		$button_text      = isset( $instance[ 'button_text' ] ) ? esc_html( $instance[ 'button_text' ] ) : '';
		$button_url       = isset( $instance[ 'button_url' ] ) ?  esc_url( $instance[ 'button_url' ] ) : '#';

		$args = array(
			'post_type' => 'product',
			'tax_query' => array(
			array(
				'taxonomy'  => 'product_cat',
				'field'     => 'id',
				'terms'     => $category
			)
		),
		'posts_per_page' => 4
		);

		if ( !empty( $background_image ) ) {
			$bg_image_style = 'background:url(' . $background_image . ') scroll no-repeat center top/cover;';
		} else {
			$bg_image_style = 'background-color:' . $background_color . ';';
		}
		echo $before_widget; ?>
		<div class="section-wrapper" style="<?php echo $bg_image_style; ?>">
			<div class="tg-container">
				<?php if ( !empty( $title ) ) { echo $before_title .'<span>'. $title .'</span>'. $after_title; } ?>
				<div class="woocommerce-wrapper">
					<div class="tg-column-wrapper clearfix">
					<?php
					$featured_query = new WP_Query( $args );
					while ($featured_query->have_posts()) :
					$featured_query->the_post();
					$product = get_product( $featured_query->post->ID ); ?>
						<div class="woo-collection tg-column-4">
							<figure class="woo-img">
								<?php the_post_thumbnail( 'shop_catalog' ); ?>
							</figure>
							<div class="woo-desc-wrap">
								<h3 class="woo-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="price-cart-wishlist-btn clearfix">
									<?php if ( $price_html = $product->get_price_html() ) : ?>
									<span class="price"><span class="price-text"><?php esc_html_e('Price:', 'fitclub'); ?></span><?php echo $price_html; ?></span>
									<?php endif; ?>
									<div class="cart-wishlist-btn">
										<?php
										if( function_exists( 'YITH_WCWL' ) ) :
											$url = add_query_arg( 'add_to_wishlist', $product->id );
										?>
											<a href="<?php echo esc_url($url); ?>" class="single_add_to_wishlist" ><?php esc_html_e('Add to Wishlist','fitclub'); ?><i class="fa fa-heart"></i></a>
										<?php endif; ?>
										<?php woocommerce_template_loop_add_to_cart( $featured_query->post, $product ); ?>
									</div>
								</div>
							</div>
						</div>
					<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
				</div>
				<?php if(!empty($button_url)) : ?>
				<div class="readmore-wrapper">
					<a class="woo-readmore" href="<?php echo esc_url( $button_url ); ?>" title="Read More"><?php echo esc_html( $button_text ); ?></a>
				</div>
				<?php endif; ?>
			</div><!-- .tg-container -->
		</div><!-- .section-wrapper -->
	<?php echo $after_widget;
	}
}

// FAQ Widget
class fitclub_faq_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_faq_block',
			'description' => esc_html__( 'Display some pages as faqs.', 'fitclub' )
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__( 'TG: FAQ Widget', 'fitclub' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		$defaults['title']   = '';
		$defaults['number']  = '3';

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title           =  esc_attr( $instance['title'] );
		$number          =  absint( $instance[ 'number' ] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of pages to display:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p><?php esc_html_e( 'Note: Create the pages and select faq Template to display faqs pages.', 'fitclub' ); ?></p>
	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                      = $old_instance;
		$instance[ 'title' ]           = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'number' ]          = absint( $new_instance[ 'number' ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title           = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? esc_html( $instance[ 'title' ]) : '');
		$number          = isset( $instance[ 'number' ] ) ? absint( $instance[ 'number' ] ) : 3;

		$page_array = array();
		$pages = get_pages();

		// Gets the page with faq template.
		foreach ( $pages as $page ) {
			$page_id       = $page->ID;
			$template_name = get_post_meta( $page_id, '_wp_page_template', true );
			if( $template_name == 'page-templates/template-faq.php' ) {
				array_push( $page_array, $page_id );
			}
		}

		$get_faq_pages = new WP_Query( array(
			'posts_per_page'      => $number,
			'post_type'           =>  array( 'page' ),
			'post__in'            => $page_array,
			'orderby'             => array( 'menu_order' => 'ASC', 'date' => 'DESC' )
		) );

		echo $before_widget; ?>
		<div  class="section-wrapper">
			<div class="tg-container">
					<?php if( !empty( $title ) ) echo $before_title .'<span>'. $title .'</span>'. $after_title; ?>

					<?php
					if( !empty( $page_array ) ) { ?>
					<div class="fitclub-toggle-frame-set">
						<?php
						while( $get_faq_pages->have_posts() ):$get_faq_pages->the_post();
						?>

							<div class="content">
								<h5 class="entry-title flip"><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a> <span class="opentab"></span></h5>

								<div class="entry-content panel">
									<?php the_excerpt(); ?>
								</div>
							</div>
						<?php
						endwhile; ?>
					</div>
					<?php
					// Reset Post Data
					wp_reset_postdata();
					} ?>
			</div>
		</div>
	<?php echo $after_widget;
	}
}

// Opening Hours widget
class fitclub_opening_hours_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'fitclub_opening_hours_widget clearfix',
			'description' => esc_html__( 'Add your clients/brand logo images here', 'fitclub')
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false,$name= esc_html__( 'TG: Opening Hours', 'fitclub' ),$widget_ops);
	}

	function form( $instance ) {
		$instance 	= wp_parse_args( (array) $instance,
						array(
							'title'        => '',
							'day_name1'  => '',
							'day_hour1'   => '',
							'day_name2'  => '',
							'day_hour2'   => '',
							'day_name3'  => '',
							'day_hour3'   => '',
							'day_name4'  => '',
							'day_hour4'   => '',
							'day_name5'  => '',
							'day_hour5'   => '',
							'day_name6'  => '',
							'day_hour6'   => '',
							'day_name7'  => '',
							'day_hour7'   => '',
						)
					);
		$title 		= esc_attr( $instance[ 'title' ] );

		for ( $i = 1; $i < 8; $i++ ) {
			$day_name  = 'day_hour'.$i;
			$day_hour  = 'day_name'.$i;

			$instance[ $day_name ] = esc_html( $instance[ $day_name ] );
			$instance[ $day_hour ] = esc_html( $instance[ $day_hour ] );
		}

	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
		<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<label><?php esc_html_e( 'Add your clients/brands logo Here', 'fitclub' ); ?></label>
	<?php
		for ( $i = 1; $i < 8 ; $i++ ) {
			$day_name = 'day_hour'.$i;
			$day_hour = 'day_name'.$i;
	?>
	<p>
		<label for="<?php echo $this->get_field_id( $day_name ); ?>"> <?php esc_html_e( 'Day', 'fitclub' ); echo $i; ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( $day_name ); ?>" name="<?php echo $this->get_field_name( $day_name ); ?>" value="<?php echo $instance[$day_name]; ?>"/>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( $day_hour ); ?>"> <?php esc_html_e( 'Hours ', 'fitclub' ); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( $day_hour ); ?>" name="<?php echo $this->get_field_name( $day_hour ); ?>" value="<?php echo $instance[$day_hour]; ?>"/>
	</p>


	<?php } // Loop ending
	}
	function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance[ 'title' ]     = strip_tags( $new_instance[ 'title' ] );

		for ( $i = 1; $i < 8; $i++ ) {
			$day_name = 'day_hour'.$i;
			$day_hour  = 'day_name'.$i;

			$instance[ $day_name ]  = esc_html( $new_instance[ $day_name ] );
			$instance[ $day_hour ]  = esc_html( $new_instance[ $day_hour ] );
      }

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title       = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

		$day_array   = array();
		$hour_array  = array();

		$j = 0;
		for ( $i = 1; $i < 8; $i++ ) {
			$day_name = 'day_hour'.$i;
			$day_hour = 'day_name'.$i;

			$day_name = isset( $instance[ $day_name ] ) ? $instance[ $day_name ] : '';
			$day_hour = isset( $instance[ $day_hour ] ) ? $instance[ $day_hour ] : '';

			array_push( $day_array, $day_name );
			array_push( $hour_array, $day_hour );

			$j++;
		}

		echo $before_widget; ?>

		<div class="tg-container">
			<div class="tg-column-wrapper">
			<?php if ( !empty( $title ) ) { ?>
			<?php echo $before_title. '<span>' .esc_html( $title ). '</span>' . $after_title; ?>
			<?php }

			$output = '';
			if ( !empty( $day_array ) ) {
				$output .= '<div class="opening-hours">';
				$output .= '<ul class="opening-hours-list">';
				for ( $i = 1; $i < 8; $i++ ) {
					$j = $i - 1;
					if( !empty( $day_array[$j] ) ) {
						$output .= '<li>';
						$output .= '<span class="day">'.esc_html( $day_array[$j] ).'</span>';
						$output .= '<span class="sheddling"><span>'.esc_html( $hour_array[$j] ).'</span></span>';
						$output .= '</li>';
					}
				}
				$output .= '</ul>';
				$output .= '</div>';
				echo $output;
			}
			?>
			</div>
		</div>
		<?php
		echo $after_widget;
	}
}

// Contact US Widget
class fitclub_contact_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget widget_googlemap_block',
			'description' => esc_html__( 'Display your contact information with Google Map.', 'fitclub' )
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false, $name = esc_html__( 'TG: Contact Widget', 'fitclub' ), $widget_ops, $control_ops);
	}

	function form( $instance ) {
		$defaults['title']     = '';
		$defaults['latitude']  = '';
		$defaults['longitude'] = '';
		$defaults['textarea']  = '';
		$defaults['apikey']  = '';

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title           =  esc_attr( $instance['title'] );
		$latitude        =  floatval( $instance[ 'latitude' ] );
		$longitude       =  floatval( $instance[ 'longitude' ] );
		$textarea        =  esc_attr( $instance[ 'textarea' ] );
		$apikey          =  esc_attr( $instance[ 'apikey' ] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p><?php esc_html_e( 'Enter Google Map Details Below:', 'fitclub' ); ?></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'latitude' ); ?>"><?php esc_html_e( 'Latitude:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'latitude' ); ?>" name="<?php echo $this->get_field_name( 'latitude' ); ?>" type="text" value="<?php echo $latitude; ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'longitude' ); ?>"><?php esc_html_e( 'Longitude:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'longitude' ); ?>" name="<?php echo $this->get_field_name( 'longitude' ); ?>" type="text" value="<?php echo $longitude; ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'apikey' ); ?>"><?php esc_html_e( 'Google Map API Key:', 'fitclub' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'apikey' ); ?>" name="<?php echo $this->get_field_name( 'apikey' ); ?>" type="text" value="<?php echo $apikey; ?>" class="widefat" />
		</p>

		<p><?php esc_html_e( 'Enter Contact Form 7 Shortcode below:', 'fitclub' ); ?></p>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'textarea' ); ?>" name="<?php echo $this->get_field_name( 'textarea' ); ?>"><?php echo $textarea; ?></textarea>
	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                      = $old_instance;
		$instance[ 'title' ]           = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'latitude' ]        = floatval( $new_instance[ 'latitude' ] );
		$instance[ 'longitude' ]       = floatval( $new_instance[ 'longitude' ] );
		$instance[ 'textarea' ]        = $new_instance[ 'textarea' ];
		$instance[ 'apikey' ]          = $new_instance[ 'apikey' ];

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title           = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? esc_html( $instance[ 'title' ]) : '');
		$latitude        = isset( $instance[ 'latitude' ] ) ? floatval( $instance[ 'latitude' ] ) : '';
		$longitude       = isset( $instance[ 'longitude' ] ) ? floatval( $instance[ 'longitude' ] ) : '';
		$textarea        = isset( $instance[ 'textarea' ] ) ? $instance[ 'textarea' ] : '';
		$apikey          = isset( $instance[ 'apikey' ] ) ? $instance[ 'apikey' ] : '';

		wp_enqueue_script( 'google-map', '//maps.googleapis.com/maps/api/js?key='.$apikey.'', false, null, false );
		wp_localize_script(
		'google-map',
		'map_object',
			array(
				'latitude'      => $latitude,
				'longitude'     => $longitude,
			)
		);

		echo $before_widget; ?>
		<div  class="section-wrapper">
			<div class="classes-wrapper">
				<?php if( !empty( $title ) ) echo $before_title .'<span>'. $title .'</span>'. $after_title; ?>
				<div class="map-contact-wrapper">
				<div class="google-map-wrapper">
					<div id="googleMap"></div>
				</div>
				<?php if( !empty( $textarea ) ) : ?>
				<div class="contact-us-wrapper">
				<?php echo do_shortcode($textarea); ?>
				</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	<?php echo $after_widget;
	}
}
