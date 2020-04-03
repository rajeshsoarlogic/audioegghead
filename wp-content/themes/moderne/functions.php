<?php
/**
 * Moderne functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Moderne
 */

if ( ! function_exists( 'moderne_setup' ) ) :

	// Set the default content width.
		$GLOBALS['content_width'] = 1150;
		
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function moderne_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Moderne, use a find and replace
		 * to change 'moderne' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'moderne', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		
		// create recent posts thumbnails
		add_image_size( 'moderne-recent', 100, 75, true );
				
		// create related post thumbnails
		if( esc_attr(get_theme_mod( 'moderne_related_post_thumbnails', false ) ) ) :
			add_image_size( 'moderne-related-posts', 260, 200, true );
		endif;	

		// create featured images for the default blog style
		if( esc_attr(get_theme_mod( 'moderne_default_thumbnails', false ) ) ) :
			add_image_size( 'moderne-default', 760, 440, true );
		endif;	
		
		// create featured images for the centered blog style
		if( esc_attr(get_theme_mod( 'moderne_centered_thumbnails', false ) ) ) :
			add_image_size( 'moderne-centered', 1130, 600, true );
		endif;			

		// create featured images for the single post thumbnail
		if( esc_attr(get_theme_mod( 'moderne_singlepost_thumbnails', false ) ) ) :
			add_image_size( 'moderne-singlepost', 1130, 500, true );
		endif;
		
		// create small wp gallery thumbnails
		if( esc_attr(get_theme_mod( 'moderne_widget_gallery_thumbnails', false ) ) ) :
			add_image_size( 'moderne-widget-gallery', 100, 100, true );		
		endif;
		
		// Create slides
		if( get_theme_mod( 'moderne_show_slider', false ) ) :	
				add_image_size( 'moderne_slide', 400, 550, true );						
		endif;
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'moderne' ),
			'footer' => esc_html__( 'Footer', 'moderne' ),
			'social' => esc_html__( 'Social', 'moderne' ),
		) );

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
		
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'moderne_custom_background_args', array(
			'default-color' => '3e4a5f',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// This theme styles the visual editor to resemble the theme style, specifically font, colors, and column width.
		add_editor_style( array( 'css/editor.css', moderne_fonts_url() ) );
		
		/**
		 * Add support for core custom logo.
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'moderne_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function moderne_content_width() {
	$content_width = $GLOBALS['content_width'];
	// Check if is single post and there is no sidebar.
	if ( is_active_sidebar( 'pageleft'  ) || is_active_sidebar( 'pageright' ) || is_active_sidebar( 'blogleft' ) || is_active_sidebar( 'blogright' ) ) {
		$content_width = 750;
	}	
  $GLOBALS['content_width'] = apply_filters( 'moderne_content_width', $content_width );
}
add_action( 'template_redirect', 'moderne_content_width', 0 );


/**
 * Handles JavaScript detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function moderne_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'moderne_javascript_detection', 0 );


/**
 * Register Google Fonts.
 */
if ( ! function_exists( 'moderne_fonts_url' ) ) :

function moderne_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	// Translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language.
	if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'moderne' ) ) {
		$fonts[] = 'Oswald:400,500';
	}		

	// Translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'moderne' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;


/**
 * Add preconnect for Google Fonts.
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function moderne_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'moderne-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'moderne_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function moderne_scripts() {

	// Font Awesome 4
	if( esc_attr(get_theme_mod( 'moderne_enable_fontawesome', true ) ) ) {
			wp_enqueue_style( 'font-awesome-4', get_template_directory_uri() . '/css/fontawesome4.css', '', '4.7.0' );	
	}
	
	// Google fonts
	wp_enqueue_style( 'moderne-fonts', moderne_fonts_url(), array(), null );

	// Add slider CSS only if it is front page and slider is enabled
	if ( ( is_home() || is_front_page() ) && get_theme_mod( 'moderne_show_slider' ) == 1 ) {
		wp_enqueue_style( 'moderne-owl-css', get_template_directory_uri() . '/css/owl.carousel.css' );
	}
	
	// Stylesheets
	wp_enqueue_style( 'moderne-style', get_stylesheet_uri() );

	// Scripts
	wp_enqueue_script( 'moderne-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
		// Add slider JS only if it is front page and slider is enabled
	if ( ( is_home() || is_front_page() ) && get_theme_mod( 'moderne_show_slider' ) == 1 ) {
		wp_enqueue_script( 'moderne-scripts', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'),'2.3.2', true );
	}
	
	// Theme functions and navigation
	wp_enqueue_script( 'moderne-theme-scripts', get_template_directory_uri() . '/js/theme-scripts.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'moderne-menu', get_template_directory_uri() . '/js/menu.js', array( 'jquery' ), '20160816', true );
	wp_localize_script( 'moderne-menu', 'modernescreenReaderText', array(
		'expand'   => __( 'expand child menu', 'moderne' ),
		'collapse' => __( 'collapse child menu', 'moderne' ),
	) );

	// Comments 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'moderne_scripts' );

/**
 * Enqueue scripts for the admin.
 * Script for our custom ad widgets to allow image uploading
 */

if( !function_exists('moderne_admin_scripts') ) {
  function moderne_admin_scripts($hook) {
  	if( $hook != 'widgets.php' ) 
  			return;
    wp_enqueue_media();
    wp_enqueue_script( 'jquery-ui-tabs' );
    wp_enqueue_script( 'moderne-image-uploader', get_template_directory_uri() .'/js/image-uploader.js', false, '', true );

  }
}
add_action('admin_enqueue_scripts', 'moderne_admin_scripts');

// Include better comments file
require get_template_directory() .'/inc/comment-style.php';

// Theme info page class
require get_template_directory() . '/inc/theme-info/moderne-info-class-about.php';
	
// Theme Info Page
require get_template_directory() . '/inc/theme-info/moderne-info.php';

// Register recent posts widget
require get_template_directory() . '/inc/widgets/recent-posts-widget.php';

// Implement the Custom Header feature.
require get_template_directory() . '/inc/sidebars.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load CSS overrides
require get_template_directory() . '/inc/inline-styles.php';

// Load slider
require get_template_directory() . '/inc/owl-slider.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
