<?php
/**
 * FitClub functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package FitClub
 */

if ( ! function_exists( 'fitclub_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fitclub_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on FitClub, use a find and replace
	 * to change 'fitclub' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fitclub', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add WooCommerce Support
	add_theme_support( 'woocommerce' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'fitclub' ),
		'social'  => esc_html__( 'Social Menu', 'fitclub' ),
		'footer'  => esc_html__( 'Footer Menu', 'fitclub' )
	) );
	// Register image sizes for use in widgets
	add_image_size( 'fitclub-about', 576, 341, true );
	add_image_size( 'fitclub-testimonial', 240, 240, true );
	add_image_size( 'fitclub-team', 375, 450, true );
	add_image_size( 'fitclub-featured-image', 380, 240, true );
	add_image_size( 'fitclub-featured-post', 870, 435, true);
	add_image_size( 'fitclub-slider-thumb', 75, 75, true );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fitclub_custom_background_args', array(
		'default-color' => '161616',
		'default-image' => '',
	) ) );

	// Add excerpt field for page
	add_post_type_support( 'page', 'excerpt' );
}
endif; // fitclub_setup
add_action( 'after_setup_theme', 'fitclub_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fitclub_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fitclub_content_width', 640 );
}
add_action( 'after_setup_theme', 'fitclub_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function fitclub_scripts() {
	// Load Google fonts
	$fitclub_googlefonts = array();
	array_push( $fitclub_googlefonts, get_theme_mod( 'fitclub_site_title_font', 'Open+Sans' ) );
	array_push( $fitclub_googlefonts, get_theme_mod( 'fitclub_site_tagline_font', 'Open+Sans' ) );
	array_push( $fitclub_googlefonts, get_theme_mod( 'fitclub_primary_menu_font', 'Open+Sans' ) );
	array_push( $fitclub_googlefonts, get_theme_mod( 'fitclub_widget_titles_font', 'Open+Sans' ) );
	array_push( $fitclub_googlefonts, get_theme_mod( 'fitclub_other_titles_font', 'Open+Sans' ) );
	array_push( $fitclub_googlefonts, get_theme_mod( 'fitclub_content_font', 'Open+Sans' ) );

	$fitclub_googlefonts = array_unique( $fitclub_googlefonts );
	$fitclub_googlefonts = implode("|", $fitclub_googlefonts);

	wp_register_style( 'fitclub-google-fonts', '//fonts.googleapis.com/css?family='.$fitclub_googlefonts );
	wp_enqueue_style( 'fitclub-google-fonts' );

	wp_enqueue_style( 'fitclub-style', get_stylesheet_uri(), array(), '1.0.0', 'all' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/fontawesome/css/font-awesome.css', array(), '4.2.1' );

	wp_register_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), false, true );

	wp_register_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'), false, true );

	wp_register_script( 'counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js', array('jquery'), false, true );

	if( is_front_page() && is_page_template( 'page-templates/template-fitclub-startpage.php' ) ) {
		$slider_num = intval( get_theme_mod( 'fitclub_slider_number', 4 ) );
		$slider = 0;
		for( $i=1; $i<=$slider_num; $i++ ) {
			$page_id = get_theme_mod( 'fitclub_slide'.$i );
			if ( !empty ( $page_id ) )  $slider++;
		}

		if( ( $slider > 1 ) && get_theme_mod( 'fitclub_slider_activation', 0 ) == 1 ) {
			wp_enqueue_script( 'bxslider' );
		}
	}

	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.2', false );
 	wp_script_add_data( 'html5shiv', 'conditional', 'lte IE 8' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fitclub_scripts' );

add_action( 'wp_footer', 'fitclub_custom_js' );
function fitclub_custom_js() {
	wp_register_script( 'fitclub-custom', get_template_directory_uri() . '/js/fitclub-custom.js', array('jquery'), false, true );
	wp_enqueue_script( 'fitclub-custom' );
}

/**
 * Enqeue scripts in admin section for widgets.
 */
add_action('admin_enqueue_scripts', 'fitclub_admin_scripts');

function fitclub_admin_scripts( $hook ) {
	global $post_type;

	if( $hook == 'widgets.php' || $hook == 'customize.php' ) {
		// Image Uploader
		wp_enqueue_media();
		wp_enqueue_script( 'fitclub-script', get_template_directory_uri() . '/js/image-uploader.js', false, '1.0', true );
		// Color Picker
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'fitclub-color-picker', get_template_directory_uri() . '/js/color-picker.js', array( 'wp-color-picker' ), false);
	}

	if( $post_type == 'page' ) {
		wp_enqueue_script( 'fitclub-meta-toggle', get_template_directory_uri() . '/js/metabox-toggle.js', false, '1.0', true );
	}
}
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Other Functions file.
 */
require get_template_directory() . '/inc/fitclub.php';

/**
 * Constant Definition
 */
define( 'FitClub_ADMIN_IMAGES_URL', get_template_directory_uri() . '/inc/admin/images');

/**
 * Design Related Metaboxes
 */
require get_template_directory() . '/inc/admin/meta-boxes.php';

/**
 * Integrate license api
 */
require get_template_directory() . '/license.php';


/* Add Support for The Event Calendar Plugin by Modern Tribe */
if( class_exists( 'Tribe__Events__Main' ) ) {
	add_action( 'wp_footer', 'fitclub_events_scripts', 100 );
	add_action( 'tribe_events_before_list_widget', 'fitclub_events_opening_div');
	add_action( 'tribe_events_after_list_widget', 'fitclub_events_closing_div');
	// Loads custom widget for events
	require get_template_directory() . '/inc/event-widget.php';
}
/**
 * The Event Calendar Widget Integration
 */
function fitclub_events_scripts(){ ?>
<script type="text/javascript">
if ( typeof jQuery.fn.bxSlider !== 'undefined' ) {
	jQuery('.tg-tribe-events-list-widget .tg-events-wrapper').bxSlider({
		auto: true,
		pager: false,
		caption: true,
		nextText: '<i class="fa fa-angle-right"></i>',
		prevText: '<i class="fa fa-angle-left"></i>'
	});
}
</script>
<?php }
/**
 * The Event Calendar Div
 */
function fitclub_events_opening_div() {
	echo '<div class="tg-container">';
}

function fitclub_events_closing_div() {
	echo '</div>';
}

// WooCommerce Specific
if(class_exists('WooCommerce')) {
	// Remove default wrapper
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	// Adds wrapper around the main content
	add_action('woocommerce_before_main_content', 'fitclub_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'fitclub_wrapper_end', 10);

	function fitclub_wrapper_start() {
	  echo '<div id="primary">';
	}

	function fitclub_wrapper_end() {
	  echo '</div>';
	}
}

if( !function_exists( 'fitclub_options_migrate' ) ) :
/**
 * Migrate customizer options from free to Pro
 *
 * @since 2.0.2
 */
function fitclub_options_migrate() {

	if ( false === ( $mods = get_option( "theme_mods_fitclub" ) ) )
		return;
	if ( get_option( 'fitclub_transfer' ) )
		return;
	$free = get_option( "theme_mods_fitclub" );
	update_option( "theme_mods_fitclub-pro", $free );
	// Set transfer as complete
	update_option( 'fitclub_transfer', 1 );

}
endif;

if ( is_admin() ) {
	add_action( 'wp_loaded', 'fitclub_hide_notices' );
	add_action( 'admin_init', 'fitclub_migrate_options' );
	add_action( 'admin_notices', 'fitclub_migrate_notice' );
}

/**
 * Show Migrate options notice.
 */
function fitclub_migrate_notice() {
	if ( get_option( 'fitclub_transfer' ) || false == get_option( 'theme_mods_fitclub' ) ) {
		return;
	}

	?>
	<div id="message" class="updated notice">
		<p><strong><?php esc_html_e( 'New to FitClub Pro?', 'fitclub' ); ?></strong>
		<br />
		<?php esc_html_e( 'Transferring your existing settings from FitClub free to Pro version is easy. Simply click on the Transfer settings button below.', 'fitclub' ); ?>
		<br/>
		<?php esc_html_e( 'If you have already started using the Pro version, please be aware that transferring will wipe your current settings in Pro version.', 'fitclub' ); ?></p>
		<p class="submit">
			<a href="<?php echo esc_url( add_query_arg( 'do_update_fitclub', 'true', admin_url( 'themes.php' ) ) ); ?>" class="button-primary"><?php esc_html_e( 'Transfer Settings', 'fitclub' ); ?></a>
			<a class="button-secondary" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'fitclub-hide-notice', 'migrate_options' ), 'fitclub_hide_notices_nonce', '_fitclub_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'fitclub' ); ?></a>
		</p>
	</div>
	<?php
}

/**
 * Migrate options from updater.
 */
function fitclub_migrate_options() {
	if ( ! empty( $_GET['do_update_fitclub'] ) ) {
		fitclub_options_migrate();
	}
}

/**
 * Hide a notice if the GET variable is set.
 */
function fitclub_hide_notices() {
	if ( isset( $_GET['fitclub-hide-notice'] ) && isset( $_GET['_fitclub_notice_nonce'] ) ) {
		if ( ! wp_verify_nonce( $_GET['_fitclub_notice_nonce'], 'fitclub_hide_notices_nonce' ) ) {
			wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'fitclub' ) );
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Cheatin&#8217; huh?', 'fitclub' ) );
		}

		update_option( 'fitclub_transfer', 1 );
	}
}
