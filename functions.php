<?php
/**
 * bodhi yoga functions and definitions.
 * @package bodhi_yoga
 */

if ( ! function_exists( 'bodhi_yoga_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function bodhi_yoga_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'bodhi-yoga', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
        add_image_size( 'header-image', 1280, 370, true );
        add_image_size( 'gallery-image', 1280, 800, true );
        add_image_size( 'square-265', 265, 265, true );
        add_image_size( 'square-300', 300, 300, true );
        add_image_size( 'square-350', 350, 350, true );
        add_image_size( 'square-400', 400, 400, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bodhi-yoga' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
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
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
}
endif; // bodhi_yoga_setup
add_action( 'after_setup_theme', 'bodhi_yoga_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function bodhi_yoga_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bodhi_yoga_content_width', 1280 );
}
add_action( 'after_setup_theme', 'bodhi_yoga_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function bodhi_yoga_scripts() {
	wp_enqueue_style( 'bodhi-yoga-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bodhi-yoga-custom-fonts', get_template_directory_uri() . '/assets/css/custom-fonts.css' );
	wp_enqueue_style( 'bodhi-yoga-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'bodhi-yoga-fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
	wp_enqueue_style( 'bodhi-yoga-animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'bodhi-yoga-master-style', get_template_directory_uri() . '/assets/css/master.css' );

	wp_enqueue_script( 'bodhi-yoga-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), null, true );
	wp_enqueue_script( 'bodhi-yoga-wow', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'), null, true );
	wp_enqueue_script( 'bodhi-yoga-cusom-scripts', get_template_directory_uri() . '/assets/js/custom-scripts.js', array('jquery'), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bodhi_yoga_scripts' );

/**
 * include the nav walker class for bootstrap
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * custom post types
 */
require get_template_directory() . '/inc/cpts.php';

/**
 * theme registered sidebars and widget areas
 */
require get_template_directory() . '/inc/widget-areas.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
