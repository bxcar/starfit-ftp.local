<?php
/**
 * FitClub Theme Customizer.
 *
 * @package FitClub
 */

/**
 * Loads custom control for layout settings
 */
function fitclub_custom_controls() {

	require_once get_template_directory() . '/inc/admin/customize-image-radio-control.php';
	require_once get_template_directory() . '/inc/admin/customize-custom-css-control.php';

}

/* Theme Customizer setup. */
add_action( 'customize_register', 'fitclub_custom_controls' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fitclub_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Header Options
	$wp_customize->add_panel(
		'fitclub_header_options',
		array(
			'capabitity'  => 'edit_theme_options',
			'description' => esc_html__( 'Change Header Settings here', 'fitclub' ),
			'priority'    => 160,
			'title'       => esc_html__( 'Header Options', 'fitclub' )
			)
		);

	// Logo Section
	$wp_customize->add_section(
		'fitclub_header_logo',
		array(
			'priority'   => 10,
			'title'      => esc_html__( 'Header Logo', 'fitclub' ),
			'panel'      => 'fitclub_header_options'
		)
	);

	// Logo Upload
	$wp_customize->add_setting(
		'fitclub_logo',
		array(
			'default'            => '',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'fitclub_logo',
			array(
				'label'    => esc_html__( 'Upload logo' , 'fitclub' ),
				'section'  => 'fitclub_header_logo',
				'setting'  => 'fitclub_logo'
			)
		)
	);

	// Logo Placement
	$wp_customize->add_setting(
		'fitclub_logo_placement',
		array(
			'default'            => '',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'fitclub_radio_sanitize'
		)
	);

	$wp_customize->add_control(
		'fitclub_logo_placement',
		array(
			'label'    => esc_html__( 'Choose the required option', 'fitclub' ),
			'section'  => 'fitclub_header_logo',
			'type'     => 'radio',
			'choices'  => array(
				'header_logo_only' => esc_html__( 'Header Logo Only', 'fitclub' ),
				'header_text_only' => esc_html__( 'Header Text Only', 'fitclub' ),
				'show_both'        => esc_html__( 'Show both header logo and text', 'fitclub' ),
				'disable'          => esc_html__( 'Disable', 'fitclub' )
			)
		)
	);

	// Slider Options
	$wp_customize->add_panel(
		'fitclub_slider_options',
		array(
			'capabitity'  => 'edit_theme_options',
			'description' => esc_html__( 'Change Slider Settings here', 'fitclub' ),
			'priority'    => 180,
			'title'       => esc_html__( 'Slider Options', 'fitclub' )
			)
		);

	// Slider Section
	$wp_customize->add_section(
		'fitclub_header_slider',
		array(
			'priority'    => 10,
			'title'       => esc_html__( 'Slider Settings', 'fitclub' ),
			'description' => '<strong>'.esc_html__( 'Note', 'fitclub').'</strong><br/>'.esc_html__( '1. To display the Slider first check Enable the slider below. Now create the page for each slider and enter title, text and featured image. Choose that pages in the dropdown options.', 'fitclub').'<br/>'.esc_html__( '2. The recommended size for the slider image is 1920 x 1000 pixels. For better functioning of slider use equal size images for each slide.', 'fitclub' ).'<br/>'.esc_html__( '3. If page do not have featured Image than that page will not included in slider show.', 'fitclub' ),
			'panel'       => 'fitclub_slider_options'
		)
	);

	// Slider Activation Setting
	$wp_customize->add_setting(
		'fitclub_slider_activation',
		array(
			'default'            => '',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'fitclub_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'fitclub_slider_activation',
		array(
			'label'    => esc_html__( 'Enable Slider' , 'fitclub' ),
			'section'  => 'fitclub_header_slider',
			'type'     => 'checkbox',
			'priority' => 10
		)
	);

	// Number of Slider
	$wp_customize->add_setting(
		'fitclub_slider_number',
		array(
			'default'           => '4',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'fitclub_sanitize_integer'
		)
	);
	$wp_customize->add_control(
		'fitclub_slider_number',
		array(
			'label' => esc_html__( 'Enter the slider number', 'fitclub' ),
			'section' => 'fitclub_header_slider',
			'priority' => 1
		)
	);

	$slider_num = intval( get_theme_mod('fitclub_slider_number', 4) );

	// Slider Images Selection Setting
	for( $i = 1; $i <= $slider_num; $i++ ) {
		$wp_customize->add_setting(
			'fitclub_slide'.$i,
			array(
				'default'            => '',
				'capability'         => 'edit_theme_options',
				'sanitize_callback'  => 'fitclub_sanitize_integer'
			)
		);

		$wp_customize->add_control(
			'fitclub_slide'.$i,
			array(
				'label'    => esc_html__( 'Slide ' , 'fitclub' ).$i,
				'section'  => 'fitclub_header_slider',
				'type'     => 'dropdown-pages',
				'priority' =>  $i+10
			)
		);
	}

	// Design Related Options
	$wp_customize->add_panel(
		'fitclub_design_options',
		array(
			'capability'  => 'edit_theme_options',
			'description' => esc_html__( 'Design Related Settings', 'fitclub' ),
			'priority'    => 180,
			'title'       => esc_html__( 'Design Options', 'fitclub' )
		)
	);

	// Default Layout
	$wp_customize->add_section(
		'fitclub_default_layout_section',
		array(
			'priority'  => 10,
			'title'     => esc_html__( 'Default Layout', 'fitclub' ),
			'panel'     => 'fitclub_design_options'
		)
	);

	$wp_customize->add_setting(
		'fitclub_default_layout',
		array(
			'default'           => 'right_sidebar',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'fitclub_radio_sanitize'
		)
	);

	$wp_customize->add_control(
		new Fitclub_Image_Radio_Control (
			$wp_customize,
			'fitclub_default_layout',
			array(
				'label'   => esc_html__( 'Select default layout. This layout will be reflected in whole site archives, categories, search page etc. The layout for a single post and page can be controlled from below options', 'fitclub' ),
				'section' => 'fitclub_default_layout_section',
				'type'    => 'radio',
				'choices' => array(
					'right_sidebar'               => FitClub_ADMIN_IMAGES_URL . '/right-sidebar.png',
					'left_sidebar'                => FitClub_ADMIN_IMAGES_URL . '/left-sidebar.png',
					'no_sidebar_full_width'       => FitClub_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
					'no_sidebar_content_centered' => FitClub_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
				)
			)
		)
	);

	// Default Pages Layout
	$wp_customize->add_section(
		'fitclub_default_page_layout_section',
		array(
			'priority'  => 20,
			'title'     => esc_html__( 'Default Page Layout', 'fitclub' ),
			'panel'     => 'fitclub_design_options'
		)
	);

	$wp_customize->add_setting(
		'fitclub_default_page_layout',
		array(
			'default'           => 'right_sidebar',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'fitclub_radio_sanitize'
		)
	);

	$wp_customize->add_control(
		new Fitclub_Image_Radio_Control (
			$wp_customize,
			'fitclub_default_page_layout',
			array(
				'label'   => esc_html__( 'Select default layout for pages. This layout will be reflected in all pages unless unique layout is set for specific page', 'fitclub' ),
				'section' => 'fitclub_default_page_layout_section',
				'type'    => 'radio',
				'choices' => array(
					'right_sidebar'               => FitClub_ADMIN_IMAGES_URL . '/right-sidebar.png',
					'left_sidebar'                => FitClub_ADMIN_IMAGES_URL . '/left-sidebar.png',
					'no_sidebar_full_width'       => FitClub_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
					'no_sidebar_content_centered' => FitClub_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
				)
			)
		)
	);

	// Default Single Post Layout
	$wp_customize->add_section(
		'fitclub_default_single_post_layout_section',
		array(
			'priority'  => 30,
			'title'     => esc_html__( 'Default Single Post Layout', 'fitclub' ),
			'panel'     => 'fitclub_design_options'
		)
	);

	$wp_customize->add_setting(
		'fitclub_default_single_post_layout',
		array(
			'default'           => 'right_sidebar',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'fitclub_radio_sanitize'
		)
	);

	$wp_customize->add_control(
		new Fitclub_Image_Radio_Control (
			$wp_customize,
			'fitclub_default_single_post_layout',
			array(
				'label'   => esc_html__( 'Select default layout for single posts. This layout will be reflected in all single posts unless unique layout is set for specific post', 'fitclub' ),
				'section' => 'fitclub_default_single_post_layout_section',
				'type'    => 'radio',
				'choices' => array(
					'right_sidebar'               => FitClub_ADMIN_IMAGES_URL . '/right-sidebar.png',
					'left_sidebar'                => FitClub_ADMIN_IMAGES_URL . '/left-sidebar.png',
					'no_sidebar_full_width'       => FitClub_ADMIN_IMAGES_URL . '/no-sidebar-full-width-layout.png',
					'no_sidebar_content_centered' => FitClub_ADMIN_IMAGES_URL . '/no-sidebar-content-centered-layout.png'
				)
			)
		)
	);

	// Primary Color Setting
	$wp_customize->add_section(
		'fitclub_primary_color_section',
		array(
			'priority'   => 40,
			'title'      => esc_html__( 'Primary Color Option', 'fitclub' ),
			'panel'      => 'fitclub_design_options'
		)
	);

	$wp_customize->add_setting(
		'fitclub_primary_color',
		array(
			'default'              => '#faa71d',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'fitclub_hex_color_sanitize',
			'sanitize_js_callback' => 'fitclub_color_escaping_sanitize'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'fitclub_primary_color',
			array(
				'label'    => esc_html__( 'This will reflect in links, buttons and many others. Choose a color to match your site', 'fitclub' ),
				'section'  => 'fitclub_primary_color_section'
			)
		)
	);

	// Custom CSS Section
	$wp_customize->add_section(
		'fitclub_custom_css_section',
		array(
			'priority'  => 50,
			'title'     => esc_html__( 'Custom CSS', 'fitclub' ),
			'panel'     => 'fitclub_design_options'
		)
	);

	$wp_customize->add_setting(
		'fitclub_custom_css',
		array(
			'default'              => '',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'wp_filter_nohtml_kses',
			'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		new Fitclub_Custom_CSS_Control(
			$wp_customize,
			'fitclub_custom_css',
			array(
				'label'   => esc_html__( 'Write your Custom CSS here', 'fitclub' ),
				'section' => 'fitclub_custom_css_section'
			)
		)
	);

	// Footer Widget Section
	$wp_customize->add_section(
		'fitclub_footer_widget_section',
		array(
			'priority'   => 60,
			'title'      => esc_html__( 'Footer Widgets', 'fitclub' ),
			'panel'      => 'fitclub_design_options'
		)
	);

	$wp_customize->add_setting(
		'fitclub_footer_widgets',
		array(
			'default'            => 4,
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'fitclub_sanitize_integer'
		)
	);

	$wp_customize->add_control(
		'fitclub_footer_widgets',
		array(
			'label'    => esc_html__( 'Choose the number of widget area you want in footer', 'fitclub' ),
			'section'  => 'fitclub_footer_widget_section',
			'type'     => 'select',
			'choices'    => array(
				'1' => esc_html__('1 Footer Widget Area', 'fitclub'),
				'2' => esc_html__('2 Footer Widget Area', 'fitclub'),
				'3' => esc_html__('3 Footer Widget Area', 'fitclub'),
				'4' => esc_html__('4 Footer Widget Area', 'fitclub')
			),
		)
	);

	// Additional Options
	$wp_customize->add_panel(
		'fitclub_additional_options',
		array(
			'capability'  => 'edit_theme_options',
			'description' => esc_html__( 'Some additional settings.', 'fitclub' ),
			'priority'    => 180,
			'title'       => esc_html__( 'Additional Options', 'fitclub' )
			)
		);

	// Content Selection Section
	$wp_customize->add_section(
		'fitclub_content_setting',
		array(
			'priority'   => 10,
			'title'      => esc_html__( 'Excerpt/Full Content Option', 'fitclub' ),
			'panel'      => 'fitclub_additional_options'
		)
	);

	// Content Selection Setting
	$wp_customize->add_setting(
		'fitclub_content_show',
		array(
			'default'            => '',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'fitclub_radio_sanitize'
		)
	);

	$wp_customize->add_control(
		'fitclub_content_show',
		array(
			'label'    => esc_html__( 'Toggle between displaying excerpts and full posts on your blog and archives.' , 'fitclub' ),
			'section'  => 'fitclub_content_setting',
			'priority' => 10,
			'type'     => 'radio',
			'choices'  => array(
				'show_fullcontent' => esc_html__( 'Show Full Post Content', 'fitclub' ),
				'show_excerpt'     => esc_html__( 'Show Excerpt', 'fitclub' )
			)
		)
	);

	// Excerpt Options
	$wp_customize->add_section(
		'fitclub_excerpt_words_setting',
		array(
			'title'     => esc_html__( 'Excerpt Length', 'fitclub' ),
			'priority'  => 20,
			'panel'     => 'fitclub_additional_options'
		)
	);

	$wp_customize->add_setting(
		'fitclub_excerpt_words',
		array(
			'default'           => '40',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'fitclub_sanitize_integer'
		)
	);
	$wp_customize->add_control(
		'fitclub_excerpt_words',
		array(
			'label'	    => esc_html__( 'Enter the number of Words you wish to show on excerpt. Default value is 40 words.', 'fitclub' ),
			'section'	=> 'fitclub_excerpt_words_setting'
		)
	);

	// Change Read more text
	$wp_customize->add_section(
		'fitclub_read_more_text_setting',
		array(
			'title'     => esc_html__( 'Read More', 'fitclub' ),
			'priority'  => 30,
			'panel'     => 'fitclub_additional_options'
		)
	);

	$wp_customize->add_setting(
		'fitclub_read_more_text',
		array(
			'default'           => 'Read More',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);
	$wp_customize->add_control(
		'fitclub_read_more_text',
		array(
			'label' 		=> esc_html__( 'Change Read more text in Posts Page', 'fitclub' ),
			'section' 	    => 'fitclub_read_more_text_setting'
		)
	);

	// Post Meta Section
	$wp_customize->add_section(
		'fitclub_postmeta_section',
		array(
			'priority'   => 40,
			'title'      => esc_html__( 'Post Meta Settings', 'fitclub'),
			'panel'      => 'fitclub_additional_options'
		)
	);

	// Post Meta Setting
	$wp_customize->add_setting(
		'fitclub_postmeta',
		array(
			'default'            => '',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'fitclub_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'fitclub_postmeta',
		array(
			'label'    => esc_html__( 'Hide all post meta data under post title.' , 'fitclub' ),
			'section'  => 'fitclub_postmeta_section',
			'priority' => 10,
			'type'     => 'checkbox'
		)
	);

	// Post Meta Date Setting
	$wp_customize->add_setting(
		'fitclub_postmeta_date',
		array(
			'default'            => '',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'fitclub_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'fitclub_postmeta_date',
		array(
			'label'    => esc_html__( 'Hide date under post title.' , 'fitclub' ),
			'section'  => 'fitclub_postmeta_section',
			'priority' => 20,
			'type'     => 'checkbox'
		)
	);

	// Post Meta Author Setting
	$wp_customize->add_setting(
		'fitclub_postmeta_author',
		array(
			'default'            => '',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'fitclub_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'fitclub_postmeta_author',
		array(
			'label'    => esc_html__( 'Hide author under post title.' , 'fitclub' ),
			'section'  => 'fitclub_postmeta_section',
			'priority' => 30,
			'type'     => 'checkbox'
		)
	);

	// Post Meta Comment Count Setting
	$wp_customize->add_setting(
		'fitclub_postmeta_comment',
		array(
			'default'            => '',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'fitclub_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'fitclub_postmeta_comment',
		array(
			'label'    => esc_html__( 'Hide comment count under post title.' , 'fitclub' ),
			'section'  => 'fitclub_postmeta_section',
			'priority' => 40,
			'type'     => 'checkbox'
		)
	);

	// Post Meta Category Setting
	$wp_customize->add_setting(
		'fitclub_postmeta_category',
		array(
			'default'            => '',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'fitclub_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'fitclub_postmeta_category',
		array(
			'label'    => esc_html__( 'Hide category under post title.' , 'fitclub' ),
			'section'  => 'fitclub_postmeta_section',
			'priority' => 50,
			'type'     => 'checkbox'
		)
	);

	// Post Meta Tags Setting
	$wp_customize->add_setting(
		'fitclub_postmeta_tags',
		array(
			'default'            => '',
			'capability'         => 'edit_theme_options',
			'sanitize_callback'  => 'fitclub_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'fitclub_postmeta_tags',
		array(
			'label'    => esc_html__( 'Hide tags under post title.' , 'fitclub' ),
			'section'  => 'fitclub_postmeta_tags',
			'priority' => 60,
			'type'     => 'checkbox'
		)
	);

	// Typography Options
	$wp_customize->add_panel('fitclub_typography_options', array(
		'priority'    => 340,
		'title'       => esc_html__('FitClub Typography Options', 'fitclub'),
		'description' => esc_html__('Change the Typography Settings from here as you want', 'fitclub'),
		'capability'  => 'edit_theme_options'
	));

	// Google Font Options
	$wp_customize->add_section('fitclub_google_fonts_settings', array(
	'priority' => 1,
	'title'    => esc_html__('Google Font Options', 'fitclub'),
	'panel'    => 'fitclub_typography_options'
	));

	$fitclub_fonts = array(
		'fitclub_site_title_font' => array(
			'id'      => 'fitclub_site_title_font',
			'default' => 'Open Sans',
			'title'   => esc_html__('Site title font. Default: "Open Sans"', 'fitclub')
		),
		'fitclub_site_tagline_font' => array(
			'id'      => 'fitclub_site_tagline_font',
			'default' => 'Open Sans',
			'title'   => esc_html__('Site tagline font. Default: "Open Sans"', 'fitclub')
		),
		'fitclub_primary_menu_font' => array(
			'id'      => 'fitclub_primary_menu_font',
			'default' => 'Open Sans',
			'title'   => esc_html__('Primary menu font. Default: "Open Sans"', 'fitclub')
		),
		'fitclub_widget_titles_font' => array(
			'id'      => 'fitclub_widget_titles_font',
			'default' => 'Open Sans',
			'title'   => esc_html__('Widget Titles font. Default: "Crimson Text"', 'fitclub')
		),
		'fitclub_other_titles_font' => array(
			'id'      => 'fitclub_other_titles_font',
			'default' => 'Open Sans',
			'title'   => esc_html__('Other Titles font. Default: "Open Sans"', 'fitclub')
		),
		'fitclub_content_font' => array(
			'id'      => 'fitclub_content_font',
			'default' => 'Open Sans',
			'title'   => esc_html__('Content font and for others. Default: "Open Sans"', 'fitclub')
		)
	);

	foreach ($fitclub_fonts as $fitclub_font) {

		$wp_customize->add_setting($fitclub_font['id'], array(
		'default'           => $fitclub_font['default'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fitclub_sanitize_font'
		));

		$fitclub_google_fonts = fitclub_google_font_option();

		$wp_customize->add_control($fitclub_font['id'], array(
			'label'    => $fitclub_font['title'],
			'type'     => 'select',
			'settings' => $fitclub_font['id'],
			'section'  => 'fitclub_google_fonts_settings',
			'choices'  => $fitclub_google_fonts
		));
	}

	// Font Size Option
	$fitclub_fonts_size_options = fitclub_font_size_func();

	foreach ($fitclub_fonts_size_options as $fitclub_section) {

	$wp_customize->add_section($fitclub_section['section_id'], array(
		'title' => $fitclub_section['title'],
		'panel' => 'fitclub_typography_options'
	));

	$fitclub_section_id = $fitclub_section['section_id'];
	$fitclub_font_size_setting = $fitclub_section['fitclub_font_size_setting'];

		foreach ($fitclub_font_size_setting as $fitclub_font_setting) {

			$wp_customize->add_setting($fitclub_font_setting['id'], array(
			'default'           => $fitclub_font_setting['default'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'fitclub_radio_sanitize'
			));

			$wp_customize->add_control($fitclub_font_setting['id'], array(
			'label'    => $fitclub_font_setting['label'],
			'type'     => 'select',
			'settings' => $fitclub_font_setting['id'],
			'section'  => $fitclub_section_id,
			'choices'  => $fitclub_font_setting['choice']
			));
		}
	}

	// Color Options
	$wp_customize->add_panel('fitclub_color_options', array(
		'priority'    => 350,
		'title'       => esc_html__('FitClub Color Options', 'fitclub'),
		'description' => esc_html__('Make you site Colorful', 'fitclub'),
		'capability'  => 'edit_theme_options'
	));

	$fitclub_colors_options = fitclub_color_func();

	foreach ($fitclub_colors_options as $fitclub_color_section) {

		$wp_customize->add_section($fitclub_color_section['section_id'], array(
		'title' => $fitclub_color_section['title'],
		'panel' => 'fitclub_color_options'
		));

		$fitclub_color_section_id = $fitclub_color_section['section_id'];
		$fitclub_color_settings = $fitclub_color_section['fitclub_color_settings'];

		foreach ($fitclub_color_settings as $fitclub_color_setting) {

			$wp_customize->add_setting($fitclub_color_setting['id'], array(
				'default'              => $fitclub_color_setting['default'],
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'fitclub_hex_color_sanitize',
				'sanitize_js_callback' => 'fitclub_color_escaping_sanitize'
			));

			$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize, $fitclub_color_setting['id'], array(
				'label'    => $fitclub_color_setting['label'],
				'settings' => $fitclub_color_setting['id'],
				'section'  => $fitclub_color_section_id
			))
			);
		}
	}

	// Footer Editor section
	class fitclub_Footer_Control extends WP_Customize_Control {

		public $type = 'footer_control';

		public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		</label>
		<?php
		}
	}

	$wp_customize->add_section(
		'fitclub_footer_editor_section',
		array(
			'priority' => 50,
			'title'    => esc_html__('Footer Copyright Editor', 'fitclub'),
			'panel'    => 'fitclub_additional_options'
		)
	);

	$default_footer_value = esc_html__( 'Copyright &copy; ', 'fitclub' ).' '.'[the-year] [site-link]. All rights reserved. '.'<br>'.esc_html__( 'Theme: FitClub by ', 'fitclub' ).' '.'[tg-link]. '.esc_html__( 'Powered by ', 'fitclub' ).' '.'[wp-link].';

	$wp_customize->add_setting(
		'fitclub_footer_editor',
		array(
			'default'           => $default_footer_value,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'fitclub_sanitize_footer_editor'
		)
	);

	$wp_customize->add_control(
		new Fitclub_Footer_Control($wp_customize,
			'fitclub_footer_editor',
			array(
				'label'    => esc_html__('Edit the Copyright information in your footer. You can also use shortcodes: [the-year] for current year, [site-link] for your site link, [wp-link] for WordPress site link and [tg-link] for ThemeGrill site link.', 'fitclub'),
				'section'  => 'fitclub_footer_editor_section',
				'settings' => 'fitclub_footer_editor'
	))
	);


	// Footer Editor Sanitization
	function fitclub_sanitize_footer_editor( $input) {
		if( isset( $input ) ) {
			$input =  stripslashes( wp_filter_post_kses( addslashes ( $input ) ) );
		}
		return $input;
	}

	// Font Value Sanitization
	function fitclub_sanitize_font( $input, $setting ) {

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	// Checkbox sanitization
	function fitclub_sanitize_checkbox($input) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
	// Sanitize Integer
	function fitclub_sanitize_integer( $input ) {
		if( is_numeric( $input ) ) {
			return intval( $input );
		}
	}
	// Sanitize Radio Button
	function fitclub_radio_sanitize( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	// Sanitize Color
	function fitclub_hex_color_sanitize( $color ) {
		return sanitize_hex_color( $color );
	}
	// Escape Color
	function fitclub_color_escaping_sanitize( $input ) {
		$input = esc_attr($input);
		return $input;
	}
}
add_action( 'customize_register', 'fitclub_customize_register' );

// Pro Specific Options
if ( ! function_exists( 'fitclub_font_size_range_generator' ) ) :
/**
 * Function to generate font size range for font size options.
 */
function fitclub_font_size_range_generator( $start_range, $end_range ) {
	$range_string = array();
	for( $i = $start_range; $i <= $end_range; $i++ ) {
		$range_string[$i] = $i;
	}
	return $range_string;
}
endif;

/**************************************************************************************/

if ( ! function_exists( 'fitclub_font_size_func' ) ) :
/**
 * Function that contain Font Size customze setting
 */
function fitclub_font_size_func() {
	$fitclub_fonts_size_options = array(
	'fitclub_header_font_size_setting' => array(
		'section_id' => 'fitclub_header_font_size_setting',
		'title'      => esc_html__('Header font size Options', 'fitclub'),
		'fitclub_font_size_setting' => array(
			'fitclub_site_title_font_size' => array(
				'id'         => 'fitclub_site_title_font_size',
				'default'    => '23',
				'label'      => esc_html__('Site title font size. Default: 23', 'fitclub'),
				'choice'     => fitclub_font_size_range_generator( 15, 50 ),
				'custom_css' => ' #site-title a'
			),
			'fitclub_site_tagline_font_size' => array(
				'id'         => 'fitclub_site_tagline_font_size',
				'default'    => '14',
				'label'      => esc_html__('Site tagline font size. Default: 14', 'fitclub'),
				'choice'     => fitclub_font_size_range_generator( 8, 40 ),
				'custom_css' => ' #header-text #site-description'
			),
			'fitclub_primary_menu_font_size' => array(
				'id'         => 'fitclub_primary_menu_font_size',
				'default'    => '15',
				'label'      => esc_html__('Primary menu font size. Default: 15', 'fitclub'),
				'choice'     => fitclub_font_size_range_generator( 8, 40 ),
				'custom_css' => ' #site-navigation .menu li a'
			)
		)
	),
	'fitclub_title_font_size_setting' => array(
		'section_id' => 'fitclub_title_font_size_setting',
		'title'      => esc_html__('Titles related font size option', 'fitclub'),
			'fitclub_font_size_setting' => array(
				'fitclub_heading_h1_font_size' => array(
					'id'         => 'fitclub_heading_h1_font_size',
					'default'    => '36',
					'label'      => esc_html__('Heading H1 tag. Default: 36', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 20, 50 ),
					'custom_css' => 'h1'
				),
				'fitclub_heading_h2_font_size' => array(
					'id'         => 'fitclub_heading_h2_font_size',
					'default'    => '30',
					'label'      => esc_html__('Heading H2 tag. Default: 30', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 18, 44 ),
					'custom_css' => 'h2'
				),
				'fitclub_heading_h3_font_size' => array(
					'id'         => 'fitclub_heading_h3_font_size',
					'default'    => '28',
					'label'      => esc_html__('Heading H3 tag. Default: 28', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 15, 42 ),
					'custom_css' => 'h3'
				),
				'fitclub_heading_h4_font_size' => array(
					'id'         => 'fitclub_heading_h4_font_size',
					'default'    => '20',
					'label'      => esc_html__('Heading H4 tag. Default: 20', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 10, 34 ),
					'custom_css' => 'h4'
				),
				'fitclub_heading_h5_font_size' => array(
					'id'         => 'fitclub_heading_h5_font_size',
					'default'    => '18',
					'label'      => esc_html__('Heading H5 tag. Default: 18', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 10, 32 ),
					'custom_css' => 'h5'
				),
				'fitclub_heading_h6_font_size' => array(
					'id'         => 'fitclub_heading_h6_font_size',
					'default'    => '16',
					'label'      => esc_html__('Heading H6 tag. Default: 16', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 8, 30 ),
					'custom_css' => 'h6'
				),
				'fitclub_comment_title_font_size' => array(
					'id'         => 'fitclub_comment_title_font_size',
					'default'    => '24',
					'label'      => esc_html__('Comment Title. Default: 24', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 10, 35 ),
					'custom_css' => '#site-title a'
				),
				'fitclub_widget_title_font_size' => array(
					'id'         => 'fitclub_widget_title_font_size',
					'default'    => '24',
					'label'      => esc_html__('Frontpage Widget Title. Default: 28', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 10, 35 ),
					'custom_css' => '.section-title'
				)
			)
		),
		'fitclub_content_font_size_setting' => array(
			'section_id' => 'fitclub_content_font_size_setting',
			'title'      => esc_html__('Content Font Size Option', 'fitclub'),
			'fitclub_font_size_setting' => array(
			'fitclub_content_fonts_size' => array(
				'id'         => 'fitclub_content_fonts_size',
				'default'    => '15',
				'label'      => esc_html__('Content font size, also applies to other text like in search fields, post comment button etc. Default: 15', 'fitclub'),
				'choice'     => fitclub_font_size_range_generator( 8, 30 ),
				'custom_css' => 'body, button, input, select, textarea'
			),
			'fitclub_post_meta_font_size' => array(
				'id'         => 'fitclub_post_meta_font_size',
				'default'    => '12',
				'label'      => esc_html__('Post meta font size. Default: 12', 'fitclub'),
				'choice'     => fitclub_font_size_range_generator( 5, 25 ),
				'custom_css' => '.entry-meta a,.single .byline, .group-blog .byline, .posted-on, .blog-author, .blog-cat,.entry-meta > span::before'
			),
			'fitclub_button_text_font_size' => array(
				'id'         => 'fitclub_button_text_font_size',
				'default'    => '14',
				'label'      => esc_html__('Button text font size (Buttons like Read more, submit, post comment etc). Default: 14', 'fitclub'),
				'choice'     => fitclub_font_size_range_generator( 10, 30 ),
				'custom_css' => '.contact-form-wrapper input[type="submit"],.navigation .nav-links a, .bttn, button, input[type="button"], input[type="reset"], input[type="submit"]'
			)
		)
		),
		'fitclub_footer_font_size_setting' => array(
			'section_id' => 'fitclub_footer_font_size_setting',
			'title'      => esc_html__('Footer Size Option', 'fitclub'),
			'fitclub_font_size_setting' => array(
				'fitclub_footer_widget_title_fonts_size' => array(
					'id'         => 'fitclub_footer_widget_title_fonts_size',
					'default'    => '20',
					'label'      => esc_html__('Footer widget Titles. Default: 20', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 10, 35 ),
					'custom_css' => '#top-footer .widget-title'
				),
				'fitclub_footer_widget_content_font_size' => array(
					'id'         => 'fitclub_footer_widget_content_font_size',
					'default'    => '15',
					'label'      => esc_html__('Footer widget Content. Default: 15', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 10, 30 ),
					'custom_css' => '#top-footer'
				),
				'fitclub_footer_copyright_textt_font_size' => array(
					'id'         => 'fitclub_footer_copyright_textt_font_size',
					'default'    => '12',
					'label'      => esc_html__('Footer Copyright Text. Default: 12', 'fitclub'),
					'choice'     => fitclub_font_size_range_generator( 5, 25 ),
					'custom_css' => '#bottom-footer .copyright'
				)
			)
		)
	);
	return $fitclub_fonts_size_options;
}
endif;

/**************************************************************************************/

if ( ! function_exists( 'fitclub_color_func' ) ) :
/**
 * Function that contain Color customze setting
 */
function fitclub_color_func() {
	$fitclub_color_options = array(
	  'fitclub_header_color_settings' => array(
		 'section_id' => 'fitclub_header_color_settings',
		 'title'=> esc_html__('Header Color Options', 'fitclub'),
		 'fitclub_color_settings' => array(
			'fitclub_site_title_color' => array(
				 'id' => 'fitclub_site_title_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Site Title. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' #site-title a'
			   ),
			  'fitclub_site_tagline_color' => array(
				 'id' => 'fitclub_site_tagline_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Site Tagline. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' .header-wrapper #site-description'
			   ),
			  'fitclub_primary_menu_text_color' => array(
				 'id' => 'fitclub_primary_menu_text_color',
				 'default' => '#ffffff',
				 'label'=> esc_html__('Primary menu text color. Default: #ffffff', 'fitclub'),
				 'color_custom_css' => ' #site-navigation .menu li a,.header-wrapper.stick #site-navigation .menu li a, .header-wrapper.no-slider #site-navigation .menu li a,.search-icon::before, .search-icon:hover::before,.search-icon'
			   ),
			   'fitclub_primary_menu_selected_hovered_text_color' => array(
				 'id' => 'fitclub_primary_menu_selected_hovered_text_color',
				 'default' => '#32c4d1',
				 'label'=> esc_html__('Primary menu selected/hovered item color. Default: #32c4d1', 'fitclub'),
				 'color_custom_css' => '.service-read-more:hover,.cta-text-btn:hover,.blog-readmore:hover, #site-navigation .menu li:hover > a,#site-navigation .menu li.current-one-page-item > a,.header-wrapper.stick #site-navigation .menu li:hover > a,.header-wrapper.stick #site-navigation .menu li.current-one-page-item > a,.header-wrapper.no-slider #site-navigation .menu li:hover > a, .search-icon:hover i'
			   ),
			   'fitclub_header_background_color' => array(
				 'id' => 'fitclub_header_background_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Header background color. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' .non-transparent .header-wrapper, .non-transparent .header-wrapper.stick, .non-stick .header-wrapper,.home.transparent .header-wrapper.stick,#site-navigation ul.sub-menu,.home .stick #site-navigation ul.sub-menu,#site-navigation .menu-primary-container, #site-navigation div.menu,.home.non-transparent #site-navigation ul.sub-menu,.home #site-navigation ul.sub-menu',
				 'color_location' => 'background'
			   )
		)
	),
		'fitclub_content_part_color_settings' => array(
		 'section_id' => 'fitclub_content_part_color_settings',
		 'title'=> esc_html__('Content part color options', 'fitclub'),
		 'fitclub_color_settings' => array(
			'fitclub_post_title_color' => array(
				 'id' => 'fitclub_post_title_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Posts title color. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' .entry-title a,.single-post .entry-title'
			   ),
			   'fitclub_page_title_color' => array(
				 'id' => 'fitclub_page_title_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Page title color. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' .entry-title'
			   ),
			   'fitclub_content_text_color' => array(
				 'id' => 'fitclub_content_text_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Content text color. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' body, button, input, select, textarea,.about-content, .contact-content,.service-content'
			   ),
			   'fitclub_post_meta_color' => array(
				 'id' => 'fitclub_post_meta_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Post meta color. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' .entry-meta a,.entry-meta > span::before'
			   ),
			   'fitclub_button_text_color' => array(
				 'id' => 'fitclub_button_text_color',
				 'default' => '#ffffff',
				 'label'=> esc_html__('Button text color. Default: #ffffff', 'fitclub'),
				 'color_custom_css' => ' .contact-form-wrapper input[type="submit"], .navigation .nav-links a, .bttn, button, input[type="button"], input[type="reset"], input[type="submit"]'
			   ),
			   'fitclub_button_background_color' => array(
				 'id' => 'fitclub_button_background_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Button background color. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' .navigation .nav-links a, .bttn, button, input[type="button"], input[type="reset"], input[type="submit"],.about-btn a,.blog-view, .port-link a:hover,.contact-form-wrapper input[type="submit"], .default-wp-page a:hover',
				 'color_location' => 'background'
			   ),
			   'fitclub_sidebar_widget_title_color' => array(
				 'id' => 'fitclub_sidebar_widget_title_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Sidebar widget title color. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' #secondary .widget-title'
			   )
			)
		),
		'fitclub_footer_part_color_settings' => array(
		 'section_id' => 'fitclub_footer_part_color_settings',
		 'title'=> esc_html__('Footer part color options', 'fitclub'),
		 'fitclub_color_settings' => array(
			'fitclub_footer_widget_title_color' => array(
				 'id' => 'fitclub_footer_widget_title_color',
				 'default' => '#ffffff',
				 'label'=> esc_html__('Footer Widget title color. Default: #ffffff', 'fitclub'),
				 'color_custom_css' => ' #top-footer .widget-title'
			   ),
			   'fitclub_footer_widget_content_color' => array(
				 'id' => 'fitclub_footer_widget_content_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Footer widget content color. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' #top-footer'
			   ),
			   'fitclub_footer_widget_content_link_text_color' => array(
				 'id' => 'fitclub_footer_widget_content_link_text_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Footer widget content link text color. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' #top-footer a'
			   ),
			   'fitclub_footer_widget_background_color' => array(
				 'id' => 'fitclub_footer_widget_background_color',
				 'default' => '#333333',
				 'label'=> esc_html__('Footer widget background color. Default: #333333', 'fitclub'),
				 'color_custom_css' => ' #top-footer',
				 'color_location' => 'background'
			   ),
			   'fitclub_footer_copyright_text_color' => array(
				 'id' => 'fitclub_footer_copyright_text_color',
				 'default' => '#ffffff',
				 'label'=> esc_html__('Footer copyright text color. Default: #ffffff', 'fitclub'),
				 'color_custom_css' => ' .copyright'
			   ),
			   'fitclub_footer_copyright_link_text_color' => array(
				 'id' => 'fitclub_footer_copyright_link_text_color',
				 'default' => '#32c4d1',
				 'label'=> esc_html__('Footer copyright link text color. Default: #32c4d1', 'fitclub'),
				 'color_custom_css' => ' .copyright a'
			   ),
			   'fitclub_footer_copyright_part_background_color' => array(
				 'id' => 'fitclub_footer_copyright_part_background_color',
				 'default' => '#2c2c2c',
				 'label'=> esc_html__('Footer copyright part background color. Default: #2c2c2c', 'fitclub'),
				 'color_custom_css' => ' #bottom-footer',
				 'color_location' => 'background'
			   )
			)
		)
	);
	return $fitclub_color_options;
}
endif;

/**************************************************************************************/

if ( ! function_exists( 'fitclub_google_font_option' ) ) :
/**
 * Google Font addition
 */
function fitclub_google_font_option() {

$fitclub_google_fonts = array(
	"ABeeZee" => "ABeeZee",
	"Abel" => "Abel",
	"Abril Fatface" => "Abril+Fatface",
	"Aclonica" => "Aclonica",
	"Acme" => "Acme",
	"Actor" => "Actor",
	"Adamina" => "Adamina",
	"Advent Pro" => "Advent+Pro",
	"Aguafina Script" => "Aguafina+Script",
	"Akronim" => "Akronim",
	"Aladin" => "Aladin",
	"Aldrich" => "Aldrich",
	"Alegreya" => "Alegreya",
	"Alegreya SC" => "Alegreya+SC",
	"Alex Brush" => "Alex+Brush",
	"Alfa Slab One" => "Alfa+Slab+One",
	"Alice" => "Alice",
	"Alike" => "Alike",
	"Alike Angular" => "Alike+Angular",
	"Allan" => "Allan",
	"Allerta" => "Allerta",
	"Allerta Stencil" => "Allerta+Stencil",
	"Allura" => "Allura",
	"Almendra" => "Almendra",
	"Almendra Display" => "Almendra+Display",
	"Almendra SC" => "Almendra+SC",
	"Amarante" => "Amarante",
	"Amaranth" => "Amaranth",
	"Amatic SC" => "Amatic+SC",
	"Amethysta" => "Amethysta",
	"Anaheim" => "Anaheim",
	"Andada" => "Andada",
	"Andika" => "Andika",
	"Angkor" => "Angkor",
	"Annie Use Your Telescope" => "Annie+Use+Your+Telescope",
	"Anonymous Pro" => "Anonymous+Pro",
	"Antic" => "Antic",
	"Antic Didone" => "Antic+Didone",
	"Antic Slab" => "Antic+Slab",
	"Anton" => "Anton",
	"Arapey" => "Arapey",
	"Arbutus" => "Arbutus",
	"Arbutus Slab" => "Arbutus+Slab",
	"Architects Daughter" => "Architects+Daughter",
	"Archivo Black" => "Archivo+Black",
	"Archivo Narrow" => "Archivo+Narrow",
	"Arimo" => "Arimo",
	"Arizonia" => "Arizonia",
	"Armata" => "Armata",
	"Artifika" => "Artifika",
	"Arvo" => "Arvo",
	"Asap" => "Asap",
	"Asset" => "Asset",
	"Astloch" => "Astloch",
	"Asul" => "Asul",
	"Atomic Age" => "Atomic+Age",
	"Aubrey" => "Aubrey",
	"Audiowide" => "Audiowide",
	"Autour One" => "Autour+One",
	"Average" => "Average",
	"Average Sans" => "Average+Sans",
	"Averia Gruesa Libre" => "Averia+Gruesa+Libre",
	"Averia Libre" => "Averia+Libre",
	"Averia Sans Libre" => "Averia+Sans+Libre",
	"Averia Serif Libre" => "Averia+Serif+Libre",
	"Bad Script" => "Bad+Script",
	"Balthazar" => "Balthazar",
	"Bangers" => "Bangers",
	"Basic" => "Basic",
	"Battambang" => "Battambang",
	"Baumans" => "Baumans",
	"Bayon" => "Bayon",
	"Belgrano" => "Belgrano",
	"Belleza" => "Belleza",
	"BenchNine" => "BenchNine",
	"Bentham" => "Bentham",
	"Berkshire Swash" => "Berkshire+Swash",
	"Bevan" => "Bevan",
	"Bigelow Rules" => "Bigelow+Rules",
	"Bigshot One" => "Bigshot+One",
	"Bilbo" => "Bilbo",
	"Bilbo Swash Caps" => "Bilbo+Swash+Caps",
	"Bitter" => "Bitter",
	"Black Ops One" => "Black+Ops+One",
	"Bokor" => "Bokor",
	"Bonbon" => "Bonbon",
	"Boogaloo" => "Boogaloo",
	"Bowlby One" => "Bowlby+One",
	"Bowlby One SC" => "Bowlby+One+SC",
	"Brawler" => "Brawler",
	"Bree Serif" => "Bree+Serif",
	"Bubblegum Sans" => "Bubblegum+Sans",
	"Bubbler One" => "Bubbler+One",
	"Buda" => "Buda",
	"Buenard" => "Buenard",
	"Butcherman" => "Butcherman",
	"Butterfly Kids" => "Butterfly+Kids",
	"Cabin" => "Cabin",
	"Cabin Condensed" => "Cabin+Condensed",
	"Cabin Sketch" => "Cabin+Sketch",
	"Caesar Dressing" => "Caesar+Dressing",
	"Cagliostro" => "Cagliostro",
	"Calligraffitti" => "Calligraffitti",
	"Cambo" => "Cambo",
	"Candal" => "Candal",
	"Cantarell" => "Cantarell",
	"Cantata One" => "Cantata+One",
	"Cantora One" => "Cantora+One",
	"Capriola" => "Capriola",
	"Cardo" => "Cardo",
	"Carme" => "Carme",
	"Carrois Gothic" => "Carrois+Gothic",
	"Carrois Gothic SC" => "Carrois+Gothic+SC",
	"Carter One" => "Carter+One",
	"Caudex" => "Caudex",
	"Cedarville Cursive" => "Cedarville+Cursive",
	"Ceviche One" => "Ceviche+One",
	"Changa One" => "Changa+One",
	"Chango" => "Chango",
	"Chau Philomene One" => "Chau+Philomene+One",
	"Chela One" => "Chela+One",
	"Chelsea Market" => "Chelsea+Market",
	"Chenla" => "Chenla",
	"Cherry Cream Soda" => "Cherry+Cream+Soda",
	"Cherry Swash" => "Cherry+Swash",
	"Chewy" => "Chewy",
	"Chicle" => "Chicle",
	"Chivo" => "Chivo",
	"Cinzel" => "Cinzel",
	"Cinzel Decorative" => "Cinzel+Decorative",
	"Clicker Script" => "Clicker+Script",
	"Coda" => "Coda",
	"Coda Caption" => "Coda+Caption",
	"Codystar" => "Codystar",
	"Combo" => "Combo",
	"Comfortaa" => "Comfortaa",
	"Coming Soon" => "Coming+Soon",
	"Concert One" => "Concert+One",
	"Condiment" => "Condiment",
	"Content" => "Content",
	"Contrail One" => "Contrail+One",
	"Convergence" => "Convergence",
	"Cookie" => "Cookie",
	"Copse" => "Copse",
	"Corben" => "Corben",
	"Courgette" => "Courgette",
	"Cousine" => "Cousine",
	"Coustard" => "Coustard",
	"Covered By Your Grace" => "Covered+By+Your+Grace",
	"Crafty Girls" => "Crafty+Girls",
	"Creepster" => "Creepster",
	"Crete Round" => "Crete+Round",
	"Open+Sans" => "Crimson+Text",
	"Croissant One" => "Croissant+One",
	"Crushed" => "Crushed",
	"Cuprum" => "Cuprum",
	"Cutive" => "Cutive",
	"Cutive Mono" => "Cutive+Mono",
	"Damion" => "Damion",
	"Dancing Script" => "Dancing+Script",
	"Dangrek" => "Dangrek",
	"Dawning of a New Day" => "Dawning+of+a+New+Day",
	"Days One" => "Days+One",
	"Delius" => "Delius",
	"Delius Swash Caps" => "Delius+Swash+Caps",
	"Delius Unicase" => "Delius+Unicase",
	"Della Respira" => "Della+Respira",
	"Denk One" => "Denk+One",
	"Devonshire" => "Devonshire",
	"Didact Gothic" => "Didact+Gothic",
	"Diplomata" => "Diplomata",
	"Diplomata SC" => "Diplomata+SC",
	"Domine" => "Domine",
	"Donegal One" => "Donegal+One",
	"Doppio One" => "Doppio+One",
	"Dorsa" => "Dorsa",
	"Dosis" => "Dosis",
	"Dr Sugiyama" => "Dr+Sugiyama",
	"Droid Sans" => "Droid+Sans",
	"Droid Sans Mono" => "Droid+Sans+Mono",
	"Droid Serif" => "Droid+Serif",
	"Duru Sans" => "Duru+Sans",
	"Dynalight" => "Dynalight",
	"EB Garamond" => "EB+Garamond",
	"Eagle Lake" => "Eagle+Lake",
	"Eater" => "Eater",
	"Economica" => "Economica",
	"Electrolize" => "Electrolize",
	"Elsie" => "Elsie",
	"Elsie Swash Caps" => "Elsie+Swash+Caps",
	"Emblema One" => "Emblema+One",
	"Emilys Candy" => "Emilys+Candy",
	"Engagement" => "Engagement",
	"Englebert" => "Englebert",
	"Enriqueta" => "Enriqueta",
	"Erica One" => "Erica+One",
	"Esteban" => "Esteban",
	"Euphoria Script" => "Euphoria+Script",
	"Ewert" => "Ewert",
	"Exo" => "Exo",
	"Expletus Sans" => "Expletus+Sans",
	"Fanwood Text" => "Fanwood+Text",
	"Fascinate" => "Fascinate",
	"Fascinate Inline" => "Fascinate+Inline",
	"Faster One" => "Faster+One",
	"Fasthand" => "Fasthand",
	"Federant" => "Federant",
	"Federo" => "Federo",
	"Felipa" => "Felipa",
	"Fenix" => "Fenix",
	"Finger Paint" => "Finger+Paint",
	"Fira Sans" => "Fira+Sans",
	"Fjalla One" => "Fjalla+One",
	"Fjord One" => "Fjord+One",
	"Flamenco" => "Flamenco",
	"Flavors" => "Flavors",
	"Fondamento" => "Fondamento",
	"Fontdiner Swanky" => "Fontdiner+Swanky",
	"Forum" => "Forum",
	"Francois One" => "Francois+One",
	"Freckle Face" => "Freckle+Face",
	"Fredericka the Great" => "Fredericka+the+Great",
	"Fredoka One" => "Fredoka+One",
	"Freehand" => "Freehand",
	"Fresca" => "Fresca",
	"Frijole" => "Frijole",
	"Fruktur" => "Fruktur",
	"Fugaz One" => "Fugaz+One",
	"GFS Didot" => "GFS+Didot",
	"GFS Neohellenic" => "GFS+Neohellenic",
	"Gabriela" => "Gabriela",
	"Gafata" => "Gafata",
	"Galdeano" => "Galdeano",
	"Galindo" => "Galindo",
	"Gentium Basic" => "Gentium+Basic",
	"Gentium Book Basic" => "Gentium+Book+Basic",
	"Geo" => "Geo",
	"Geostar" => "Geostar",
	"Geostar Fill" => "Geostar+Fill",
	"Germania One" => "Germania+One",
	"Gilda Display" => "Gilda+Display",
	"Give You Glory" => "Give+You+Glory",
	"Glass Antiqua" => "Glass+Antiqua",
	"Glegoo" => "Glegoo",
	"Gloria Hallelujah" => "Gloria+Hallelujah",
	"Goblin One" => "Goblin+One",
	"Gochi Hand" => "Gochi+Hand",
	"Gorditas" => "Gorditas",
	"Goudy Bookletter 1911" => "Goudy+Bookletter+1911",
	"Graduate" => "Graduate",
	"Grand Hotel" => "Grand+Hotel",
	"Gravitas One" => "Gravitas+One",
	"Great Vibes" => "Great+Vibes",
	"Griffy" => "Griffy",
	"Gruppo" => "Gruppo",
	"Gudea" => "Gudea",
	"Habibi" => "Habibi",
	"Hammersmith One" => "Hammersmith+One",
	"Hanalei" => "Hanalei",
	"Hanalei Fill" => "Hanalei+Fill",
	"Handlee" => "Handlee",
	"Hanuman" => "Hanuman",
	"Happy Monkey" => "Happy+Monkey",
	"Headland One" => "Headland+One",
	"Henny Penny" => "Henny+Penny",
	"Herr Von Muellerhoff" => "Herr+Von+Muellerhoff",
	"Holtwood One SC" => "Holtwood+One+SC",
	"Homemade Apple" => "Homemade+Apple",
	"Homenaje" => "Homenaje",
	"IM Fell DW Pica" => "IM+Fell+DW+Pica",
	"IM Fell DW Pica SC" => "IM+Fell+DW+Pica+SC",
	"IM Fell Double Pica" => "IM+Fell+Double+Pica",
	"IM Fell Double Pica SC" => "IM+Fell+Double+Pica+SC",
	"IM Fell English" => "IM+Fell+English",
	"IM Fell English SC" => "IM+Fell+English+SC",
	"IM Fell French Canon" => "IM+Fell+French+Canon",
	"IM Fell French Canon SC" => "IM+Fell+French+Canon+SC",
	"IM Fell Great Primer" => "IM+Fell+Great+Primer",
	"IM Fell Great Primer SC" => "IM+Fell+Great+Primer+SC",
	"Iceberg" => "Iceberg",
	"Iceland" => "Iceland",
	"Imprima" => "Imprima",
	"Inconsolata" => "Inconsolata",
	"Inder" => "Inder",
	"Indie Flower" => "Indie+Flower",
	"Inika" => "Inika",
	"Irish Grover" => "Irish+Grover",
	"Istok Web" => "Istok+Web",
	"Italiana" => "Italiana",
	"Italianno" => "Italianno",
	"Jacques Francois" => "Jacques+Francois",
	"Jacques Francois Shadow" => "Jacques+Francois+Shadow",
	"Jim Nightshade" => "Jim+Nightshade",
	"Jockey One" => "Jockey+One",
	"Jolly Lodger" => "Jolly+Lodger",
	"Josefin Sans" => "Josefin+Sans",
	"Josefin Slab" => "Josefin+Slab",
	"Joti One" => "Joti+One",
	"Judson" => "Judson",
	"Julee" => "Julee",
	"Julius Sans One" => "Julius+Sans+One",
	"Junge" => "Junge",
	"Jura" => "Jura",
	"Just Another Hand" => "Just+Another+Hand",
	"Just Me Again Down Here" => "Just+Me+Again+Down+Here",
	"Kameron" => "Kameron",
	"Karla" => "Karla",
	"Kaushan Script" => "Kaushan+Script",
	"Kavoon" => "Kavoon",
	"Keania One" => "Keania+One",
	"Kelly Slab" => "Kelly+Slab",
	"Kenia" => "Kenia",
	"Khmer" => "Khmer",
	"Kite One" => "Kite+One",
	"Knewave" => "Knewave",
	"Kotta One" => "Kotta+One",
	"Koulen" => "Koulen",
	"Kranky" => "Kranky",
	"Kreon" => "Kreon",
	"Kristi" => "Kristi",
	"Krona One" => "Krona+One",
	"La Belle Aurore" => "La+Belle+Aurore",
	"Lancelot" => "Lancelot",
	"Lato" => "Lato",
	"League Script" => "League+Script",
	"Leckerli One" => "Leckerli+One",
	"Ledger" => "Ledger",
	"Lekton" => "Lekton",
	"Lemon" => "Lemon",
	"Libre Baskerville" => "Libre+Baskerville",
	"Life Savers" => "Life+Savers",
	"Lilita One" => "Lilita+One",
	"Limelight" => "Limelight",
	"Linden Hill" => "Linden+Hill",
	"Lobster" => "Lobster",
	"Lobster Two" => "Lobster+Two",
	"Londrina Outline" => "Londrina+Outline",
	"Londrina Shadow" => "Londrina+Shadow",
	"Londrina Sketch" => "Londrina+Sketch",
	"Londrina Solid" => "Londrina+Solid",
	"Lora" => "Lora",
	"Love Ya Like A Sister" => "Love+Ya+Like+A+Sister",
	"Loved by the King" => "Loved+by+the+King",
	"Lovers Quarrel" => "Lovers+Quarrel",
	"Luckiest Guy" => "Luckiest+Guy",
	"Lusitana" => "Lusitana",
	"Lustria" => "Lustria",
	"Macondo" => "Macondo",
	"Macondo Swash Caps" => "Macondo+Swash+Caps",
	"Magra" => "Magra",
	"Maiden Orange" => "Maiden+Orange",
	"Mako" => "Mako",
	"Marcellus" => "Marcellus",
	"Marcellus SC" => "Marcellus+SC",
	"Marck Script" => "Marck+Script",
	"Margarine" => "Margarine",
	"Marko One" => "Marko+One",
	"Marmelad" => "Marmelad",
	"Marvel" => "Marvel",
	"Mate" => "Mate",
	"Mate SC" => "Mate+SC",
	"Maven Pro" => "Maven+Pro",
	"McLaren" => "McLaren",
	"Meddon" => "Meddon",
	"MedievalSharp" => "MedievalSharp",
	"Medula One" => "Medula+One",
	"Megrim" => "Megrim",
	"Meie Script" => "Meie+Script",
	"Merienda" => "Merienda",
	"Merienda One" => "Merienda+One",
	"Merriweather" => "Merriweather",
	"Merriweather Sans" => "Merriweather+Sans",
	"Metal" => "Metal",
	"Metal Mania" => "Metal+Mania",
	"Metamorphous" => "Metamorphous",
	"Metrophobic" => "Metrophobic",
	"Michroma" => "Michroma",
	"Milonga" => "Milonga",
	"Miltonian" => "Miltonian",
	"Miltonian Tattoo" => "Miltonian+Tattoo",
	"Miniver" => "Miniver",
	"Miss Fajardose" => "Miss+Fajardose",
	"Modern Antiqua" => "Modern+Antiqua",
	"Molengo" => "Molengo",
	"Molle" => "Molle",
	"Monda" => "Monda",
	"Monofett" => "Monofett",
	"Monoton" => "Monoton",
	"Monsieur La Doulaise" => "Monsieur+La+Doulaise",
	"Montaga" => "Montaga",
	"Montez" => "Montez",
	"Montserrat" => "Montserrat",
	"Montserrat Alternates" => "Montserrat+Alternates",
	"Montserrat Subrayada" => "Montserrat+Subrayada",
	"Moul" => "Moul",
	"Moulpali" => "Moulpali",
	"Mountains of Christmas" => "Mountains+of+Christmas",
	"Mouse Memoirs" => "Mouse+Memoirs",
	"Mr Bedfort" => "Mr+Bedfort",
	"Mr Dafoe" => "Mr+Dafoe",
	"Mr De Haviland" => "Mr+De+Haviland",
	"Mrs Saint Delafield" => "Mrs+Saint+Delafield",
	"Mrs Sheppards" => "Mrs+Sheppards",
	"Muli" => "Muli",
	"Mystery Quest" => "Mystery+Quest",
	"Neucha" => "Neucha",
	"Neuton" => "Neuton",
	"New Rocker" => "New+Rocker",
	"News Cycle" => "News+Cycle",
	"Niconne" => "Niconne",
	"Nixie One" => "Nixie+One",
	"Nobile" => "Nobile",
	"Nokora" => "Nokora",
	"Norican" => "Norican",
	"Nosifer" => "Nosifer",
	"Nothing You Could Do" => "Nothing+You+Could+Do",
	"Noticia Text" => "Noticia+Text",
	"Nova Cut" => "Nova+Cut",
	"Nova Flat" => "Nova+Flat",
	"Nova Mono" => "Nova+Mono",
	"Nova Oval" => "Nova+Oval",
	"Nova Round" => "Nova+Round",
	"Nova Script" => "Nova+Script",
	"Nova Slim" => "Nova+Slim",
	"Nova Square" => "Nova+Square",
	"Numans" => "Numans",
	"Nunito" => "Nunito",
	"Odor Mean Chey" => "Odor+Mean+Chey",
	"Offside" => "Offside",
	"Old Standard TT" => "Old+Standard+TT",
	"Oldenburg" => "Oldenburg",
	"Oleo Script" => "Oleo+Script",
	"Oleo Script Swash Caps" => "Oleo+Script+Swash+Caps",
	"Open Sans" => "Open+Sans",
	"Open Sans Condensed" => "Open+Sans+Condensed",
	"Oranienbaum" => "Oranienbaum",
	"Orbitron" => "Orbitron",
	"Oregano" => "Oregano",
	"Orienta" => "Orienta",
	"Original Surfer" => "Original+Surfer",
	"Oswald" => "Oswald",
	"Over the Rainbow" => "Over+the+Rainbow",
	"Overlock" => "Overlock",
	"Overlock SC" => "Overlock+SC",
	"Ovo" => "Ovo",
	"Oxygen" => "Oxygen",
	"Oxygen Mono" => "Oxygen+Mono",
	"PT Mono" => "PT+Mono",
	"PT Sans" => "PT+Sans",
	"PT Sans Caption" => "PT+Sans+Caption",
	"PT Sans Narrow" => "PT+Sans+Narrow",
	"PT Serif" => "PT+Serif",
	"PT Serif Caption" => "PT+Serif+Caption",
	"Pacifico" => "Pacifico",
	"Paprika" => "Paprika",
	"Parisienne" => "Parisienne",
	"Passero One" => "Passero+One",
	"Passion One" => "Passion+One",
	"Patrick Hand" => "Patrick+Hand",
	"Patrick Hand SC" => "Patrick+Hand+SC",
	"Patua One" => "Patua+One",
	"Paytone One" => "Paytone+One",
	"Peralta" => "Peralta",
	"Permanent Marker" => "Permanent+Marker",
	"Petit Formal Script" => "Petit+Formal+Script",
	"Petrona" => "Petrona",
	"Philosopher" => "Philosopher",
	"Piedra" => "Piedra",
	"Pinyon Script" => "Pinyon+Script",
	"Pirata One" => "Pirata+One",
	"Plaster" => "Plaster",
	"Play" => "Play",
	"Playball" => "Playball",
	"Playfair Display" => "Playfair+Display",
	"Playfair Display SC" => "Playfair+Display+SC",
	"Podkova" => "Podkova",
	"Poiret One" => "Poiret+One",
	"Poller One" => "Poller+One",
	"Poly" => "Poly",
	"Pompiere" => "Pompiere",
	"Pontano Sans" => "Pontano+Sans",
	"Port Lligat Sans" => "Port+Lligat+Sans",
	"Port Lligat Slab" => "Port+Lligat+Slab",
	"Prata" => "Prata",
	"Preahvihear" => "Preahvihear",
	"Press Start 2P" => "Press+Start+2P",
	"Princess Sofia" => "Princess+Sofia",
	"Prociono" => "Prociono",
	"Prosto One" => "Prosto+One",
	"Puritan" => "Puritan",
	"Purple Purse" => "Purple+Purse",
	"Quando" => "Quando",
	"Quantico" => "Quantico",
	"Quattrocento" => "Quattrocento",
	"Quattrocento Sans" => "Quattrocento+Sans",
	"Questrial" => "Questrial",
	"Quicksand" => "Quicksand",
	"Quintessential" => "Quintessential",
	"Qwigley" => "Qwigley",
	"Racing Sans One" => "Racing+Sans+One",
	"Radley" => "Radley",
	"Raleway" => "Raleway",
	"Raleway Dots" => "Raleway+Dots",
	"Rambla" => "Rambla",
	"Rammetto One" => "Rammetto+One",
	"Ranchers" => "Ranchers",
	"Rancho" => "Rancho",
	"Rationale" => "Rationale",
	"Redressed" => "Redressed",
	"Reenie Beanie" => "Reenie+Beanie",
	"Revalia" => "Revalia",
	"Ribeye" => "Ribeye",
	"Ribeye Marrow" => "Ribeye+Marrow",
	"Righteous" => "Righteous",
	"Risque" => "Risque",
	"Roboto" => "Roboto",
	"Roboto+Slab:" => "Roboto+Slab",
	"Roboto Condensed" => "Roboto+Condensed",
	"Rochester" => "Rochester",
	"Rock Salt" => "Rock+Salt",
	"Rokkitt" => "Rokkitt",
	"Romanesco" => "Romanesco",
	"Ropa Sans" => "Ropa+Sans",
	"Rosario" => "Rosario",
	"Rosarivo" => "Rosarivo",
	"Rouge Script" => "Rouge+Script",
	"Ruda" => "Ruda",
	"Rufina" => "Rufina",
	"Ruge Boogie" => "Ruge+Boogie",
	"Ruluko" => "Ruluko",
	"Rum Raisin" => "Rum+Raisin",
	"Ruslan Display" => "Ruslan+Display",
	"Russo One" => "Russo+One",
	"Ruthie" => "Ruthie",
	"Rye" => "Rye",
	"Sacramento" => "Sacramento",
	"Sail" => "Sail",
	"Salsa" => "Salsa",
	"Sanchez" => "Sanchez",
	"Sancreek" => "Sancreek",
	"Sansita One" => "Sansita+One",
	"Sarina" => "Sarina",
	"Satisfy" => "Satisfy",
	"Scada" => "Scada",
	"Schoolbell" => "Schoolbell",
	"Seaweed Script" => "Seaweed+Script",
	"Sevillana" => "Sevillana",
	"Seymour One" => "Seymour+One",
	"Shadows Into Light" => "Shadows+Into+Light",
	"Shadows Into Light Two" => "Shadows+Into+Light+Two",
	"Shanti" => "Shanti",
	"Share" => "Share",
	"Share Tech" => "Share+Tech",
	"Share Tech Mono" => "Share+Tech+Mono",
	"Shojumaru" => "Shojumaru",
	"Short Stack" => "Short+Stack",
	"Siemreap" => "Siemreap",
	"Sigmar One" => "Sigmar+One",
	"Signika" => "Signika",
	"Signika Negative" => "Signika+Negative",
	"Simonetta" => "Simonetta",
	"Sintony" => "Sintony",
	"Sirin Stencil" => "Sirin+Stencil",
	"Six Caps" => "Six+Caps",
	"Skranji" => "Skranji",
	"Slackey" => "Slackey",
	"Smokum" => "Smokum",
	"Smythe" => "Smythe",
	"Sniglet" => "Sniglet",
	"Snippet" => "Snippet",
	"Snowburst One" => "Snowburst+One",
	"Sofadi One" => "Sofadi+One",
	"Sofia" => "Sofia",
	"Sonsie One" => "Sonsie+One",
	"Sorts Mill Goudy" => "Sorts+Mill+Goudy",
	"Source Code Pro" => "Source+Code+Pro",
	"Source Sans Pro" => "Source+Sans+Pro",
	"Special Elite" => "Special+Elite",
	"Spicy Rice" => "Spicy+Rice",
	"Spinnaker" => "Spinnaker",
	"Spirax" => "Spirax",
	"Squada One" => "Squada+One",
	"Stalemate" => "Stalemate",
	"Stalinist One" => "Stalinist+One",
	"Stardos Stencil" => "Stardos+Stencil",
	"Stint Ultra Condensed" => "Stint+Ultra+Condensed",
	"Stint Ultra Expanded" => "Stint+Ultra+Expanded",
	"Stoke" => "Stoke",
	"Strait" => "Strait",
	"Sue Ellen Francisco" => "Sue+Ellen+Francisco",
	"Sunshiney" => "Sunshiney",
	"Supermercado One" => "Supermercado+One",
	"Suwannaphum" => "Suwannaphum",
	"Swanky and Moo Moo" => "Swanky+and+Moo+Moo",
	"Syncopate" => "Syncopate",
	"Tangerine" => "Tangerine",
	"Taprom" => "Taprom",
	"Tauri" => "Tauri",
	"Telex" => "Telex",
	"Tenor Sans" => "Tenor+Sans",
	"Text Me One" => "Text+Me+One",
	"The Girl Next Door" => "The+Girl+Next+Door",
	"Tienne" => "Tienne",
	"Tinos" => "Tinos",
	"Titan One" => "Titan+One",
	"Titillium Web" => "Titillium+Web",
	"Trade Winds" => "Trade+Winds",
	"Trocchi" => "Trocchi",
	"Trochut" => "Trochut",
	"Trykker" => "Trykker",
	"Tulpen One" => "Tulpen+One",
	"Ubuntu" => "Ubuntu",
	"Ubuntu Condensed" => "Ubuntu+Condensed",
	"Ubuntu Mono" => "Ubuntu+Mono",
	"Ultra" => "Ultra",
	"Uncial Antiqua" => "Uncial+Antiqua",
	"Underdog" => "Underdog",
	"Unica One" => "Unica+One",
	"UnifrakturCook" => "UnifrakturCook",
	"UnifrakturMaguntia" => "UnifrakturMaguntia",
	"Unkempt" => "Unkempt",
	"Unlock" => "Unlock",
	"Unna" => "Unna",
	"VT323" => "VT323",
	"Vampiro One" => "Vampiro+One",
	"Varela" => "Varela",
	"Varela Round" => "Varela+Round",
	"Vast Shadow" => "Vast+Shadow",
	"Vibur" => "Vibur",
	"Vidaloka" => "Vidaloka",
	"Viga" => "Viga",
	"Voces" => "Voces",
	"Volkhov" => "Volkhov",
	"Vollkorn" => "Vollkorn",
	"Voltaire" => "Voltaire",
	"Waiting for the Sunrise" => "Waiting+for+the+Sunrise",
	"Wallpoet" => "Wallpoet",
	"Walter Turncoat" => "Walter+Turncoat",
	"Warnes" => "Warnes",
	"Wellfleet" => "Wellfleet",
	"Wendy One" => "Wendy+One",
	"Wire One" => "Wire+One",
	"Yanone Kaffeesatz" => "Yanone+Kaffeesatz",
	"Yellowtail" => "Yellowtail",
	"Yeseva One" => "Yeseva+One",
	"Yesteryear" => "Yesteryear",
	"Zeyada" => "Zeyada",
   );
   return $fitclub_google_fonts;
}
endif;
