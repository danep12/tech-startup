<?php
/**
 * Theme Functions.
 */

/* Theme Setup */
if ( ! function_exists( 'tech_startup_setup' ) ) :

function tech_startup_setup() {

	$GLOBALS['content_width'] = apply_filters( 'tech_startup_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', advance_startup_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated']) ) {
		add_action( 'admin_notices', 'tech_startup_activation_notice' );
	}
}
endif;
add_action( 'after_setup_theme', 'tech_startup_setup' );

// Notice after Theme Activation
function tech_startup_activation_notice() {
	echo '<div class="notice notice-success is-dismissible get-started">';
		echo '<p>'. esc_html__( 'Thank you for choosing ThemeShopy. We are sincerely obliged to offer our best services to you. Please proceed towards welcome page and give us the privilege to serve you.', 'tech-startup' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=tech_startup_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click here...', 'tech-startup' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function tech_startup_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'tech-startup' ),
		'description'   => __( 'Appears on blog page sidebar', 'tech-startup' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'tech-startup' ),
		'description'   => __( 'Appears on page sidebar', 'tech-startup' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'tech-startup' ),
		'description'   => __( 'Appears on page sidebar', 'tech-startup' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$advance_startup_widget_areas = get_theme_mod('advance_startup_footer_widget_areas', '4');
	for ($i=1; $i<=$advance_startup_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav ', 'tech-startup' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-3">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title pb-2 mb-3">',
			'after_title'   => '</h3>',
		) );
	}

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'tech-startup' ),
		'description'   => __( 'Appears on shop page', 'tech-startup' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'tech-startup' ),
		'description'   => __( 'Appears on shop page', 'tech-startup' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'tech_startup_widgets_init' );

add_action( 'wp_enqueue_scripts', 'tech_startup_enqueue_styles' );
function tech_startup_enqueue_styles() {
	$parent_style = 'advance-startup-basic-style'; // Style handle of parent theme.
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'tech-startup-style', get_stylesheet_uri(), array( $parent_style ) );
	wp_enqueue_style( 'tech-startup-block-patterns-style-frontend', get_theme_file_uri('/theme-block-pattern/css/block-pattern-frontend.css') );
	require get_parent_theme_file_path( '/inc/ts-color-pallete.php' );
	wp_add_inline_style( 'tech-startup-style',$advance_startup_custom_css );
	require get_theme_file_path( '/inc/ts-color-pallete.php' );
	wp_add_inline_style( 'tech-startup-style',$advance_startup_custom_css );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function tech_startup_customize_register() {     
	global $wp_customize;
	$wp_customize->remove_section( 'advance_startup_theme_color_option' );
	
	$wp_customize->remove_setting( 'advance_startup_time' );
	$wp_customize->remove_control( 'advance_startup_time' );

	$wp_customize->remove_setting( 'advance_startup_responsive_sticky_header' );
	$wp_customize->remove_control( 'advance_startup_responsive_sticky_header' );

	$wp_customize->remove_setting( 'advance_startup_sticky_header' );
	$wp_customize->remove_control( 'advance_startup_sticky_header' );

	$wp_customize->remove_setting( 'advance_startup_sticky_header_padding_settings' );
	$wp_customize->remove_control( 'advance_startup_sticky_header_padding_settings' );

	$wp_customize->remove_setting( 'advance_startup_slider_image_overlay_color_first' );
	$wp_customize->remove_setting( 'advance_startup_slider_image_overlay_color_second' );


	$wp_customize->remove_setting( 'advance_startup_breadcrumb_bg_color_first' );
	$wp_customize->remove_setting( 'advance_startup_breadcrumb_bg_color_second' );
	
} 
add_action( 'customize_register', 'tech_startup_customize_register', 11 );

// Customizer Section
function tech_startup_customizer ( $wp_customize ) {

	$wp_customize->add_setting('tech_startup_tob_bar_info_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tech_startup_tob_bar_info_text',array(
		'label'	=> __('Tob Bar Announcement Text','tech-startup'),
		'section'	=> 'advance_startup_topbar',
		'setting'	=> 'tech_startup_tob_bar_info_text',
		'type'	=> 'text',
	));

	$wp_customize->add_setting('tech_startup_location_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tech_startup_location_text',array(
		'label'	=> __('Location Text','tech-startup'),
		'section'	=> 'advance_startup_topbar',
		'setting'	=> 'tech_startup_location_text',
		'type'	=> 'text',
	));

	$wp_customize->add_setting('tech_startup_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tech_startup_location',array(
		'label'	=> __('Location','tech-startup'),
		'section'	=> 'advance_startup_topbar',
		'setting'	=> 'tech_startup_location',
		'type'	=> 'text',
	));

	$wp_customize->add_setting('tech_startup_email_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tech_startup_email_text',array(
		'label'	=> __('Mail Address Text','tech-startup'),
		'section'	=> 'advance_startup_topbar',
		'setting'	=> 'tech_startup_email_text',
		'type'	=> 'text',
	));

	$wp_customize->add_setting('tech_startup_phone_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tech_startup_phone_text',array(
		'label'	=> __('Phone Number Text','tech-startup'),
		'section'	=> 'advance_startup_topbar',
		'setting'	=> 'tech_startup_phone_text',
		'type'	=> 'text',
	));

	$wp_customize->add_setting('tech_startup_slider_image_overlay_color_first', array(
		'default'           => '#FFE000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tech_startup_slider_image_overlay_color_first', array(
		'label'    => __('Home Page Slider Overlay Color First', 'tech-startup'),
		'section'  => 'advance_startup_slider',
		'description'    => __('It will add the color overlay of the slider. To make it transparent, use the below option.','tech-startup'),
		'settings' => 'tech_startup_slider_image_overlay_color_first',
	)));

	$wp_customize->add_setting('tech_startup_slider_image_overlay_color_second', array(
		'default'           => '#799F0C',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tech_startup_slider_image_overlay_color_second', array(
		'label'    => __('Home Page Slider Overlay Color Second', 'tech-startup'),
		'section'  => 'advance_startup_slider',
		'description'    => __('It will add the color overlay of the slider. To make it transparent, use the below option.','tech-startup'),
		'settings' => 'tech_startup_slider_image_overlay_color_second',
	)));

	$wp_customize->add_setting('tech_startup_small_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('tech_startup_small_title',array(
	    'label' => __('Small Section Title','tech-startup'),
	    'section' => 'advance_startup_category',
	    'type'  => 'text'
   	));

  	$wp_customize->add_setting( 'tech_startup_breadcrumb_bg_color', array(
	    'default' => '#ffd64e',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tech_startup_breadcrumb_bg_color', array(
  		'label' => __('Breadcrumb Background Color', 'tech-startup'),
	    'section' => 'advance_startup_left_right',
	    'settings' => 'tech_startup_breadcrumb_bg_color',
  	)));

  	$wp_customize->add_setting('tech_startup_breadcrumb_bg_hover_color', array(
		'default'           => '#799F0C',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tech_startup_breadcrumb_bg_hover_color', array(
		'label'    => __('Breadcrumb Background Hover Color', 'tech-startup'),
		'section'  => 'advance_startup_left_right',
		'settings' => 'tech_startup_breadcrumb_bg_hover_color',
	)));
}
add_action( 'customize_register', 'tech_startup_customizer' );

/**
	 * Enqueue block editor style
	 */
	function tech_startup_block_editor_styles() {
		wp_enqueue_style( 'tech-startup-font', advance_startup_font_url(), array() );
	    wp_enqueue_style( 'tech-startup-block-patterns-style-editor', get_theme_file_uri( '/theme-block-pattern/css/block-pattern-editor.css' ), false, '1.0', 'all' );
	}
	add_action( 'enqueue_block_editor_assets', 'tech_startup_block_editor_styles' );


if ( ! defined( 'PRO_THEME_LINK' ) ) {
	define( 'PRO_THEME_LINK',__('https://www.themeshopy.com/themes/tech-startup-wordpress-theme/','tech-startup') );
}

if ( ! defined( 'PRO_THEME_TEXT' ) ) {
	define( 'PRO_THEME_TEXT', __('Tech Startup Pro Theme','tech-startup') );
}

if (!function_exists('tech_startup_credit')) {
	function tech_startup_credit() {
		echo "<a href=".esc_url(TECH_STARTUP_CREDIT)." target='_blank''>".esc_html__('Tech Startup WordPress Theme', 'tech-startup')."</a>";
	}
}

define('TECH_STARTUP_BUY_NOW',__('https://www.themeshopy.com/themes/tech-startup-wordpress-theme/', 'tech-startup'));
define('TECH_STARTUP_LIVE_DEMO',__('https://www.themeshopy.com/tech-startup-pro/', 'tech-startup'));
define('TECH_STARTUP_CONTACT',__('https://wordpress.org/support/theme/tech-startup/', 'tech-startup'));
define('TECH_STARTUP_PRO_DOC',__('https://themeshopy.com/demo/docs/free-tech-startup/', 'tech-startup'));
define('TECH_STARTUP_CREDIT',__('https://www.themeshopy.com/themes/free-tech-startup-wordpress-theme/', 'tech-startup'));

add_action( 'init', 'tech_startup_remove_action');
function tech_startup_remove_action() {
    remove_action( 'admin_menu','advance_startup_abouttheme' );
    remove_action( 'admin_notices','advance_startup_activation_notice' );
}

/* Admin about theme */
require get_theme_file_path('/inc/admin/admin.php');

/* Block Pattern */
require get_theme_file_path('/theme-block-pattern/theme-block-pattern.php');