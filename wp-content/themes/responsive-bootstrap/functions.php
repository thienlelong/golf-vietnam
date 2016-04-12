<?php
define('OPT', get_template_directory().'/option-tree');
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_pages', '__return_false' );
require_once(OPT . '/ot-loader.php');
include(TEMPLATEPATH.'/theme-options.php');
//flush_rewrite_rules();

function wrdpbm_setup() {
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'wrdpbm_setup' );

function wrdpbm_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '3.1.1' );
	/*wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '1.9' );*/
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '1.9' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.1.1' );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons/genericons.css', array(), '3.1.1' );
	wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'wrdpbm_scripts_styles' );

function wrdpbm_navigations() {
    register_nav_menu( 'main-navigation', __( 'Main Navigation' ) );
    register_nav_menu( 'footer-navigation', __( 'Footer Navigation' ) );
    register_nav_menu( 'top-navigation', __( 'Top Navigation' ) );
}
add_action( 'init', 'wrdpbm_navigations' );

function wrdpbm_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'moonstrap' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'moonstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'wrdpbm_widgets_init' );

/*Custom favicon for admin pages and login page*/
function wrdpbm_favicon() {
  	$favicon_url = ot_get_option('favicon', '');
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action('login_head', 'wrdpbm_favicon');
add_action('admin_head', 'wrdpbm_favicon');
add_action('wp_head', 'wrdpbm_favicon');

