<?php
/**
 * Tail Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tail_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dfrwp_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Tail Theme, use a find and replace
		* to change 'dfrwp' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dfrwp', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'dfrwp' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dfrwp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'dfrwp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dfrwp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dfrwp_content_width', 640 );
}
add_action( 'after_setup_theme', 'dfrwp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dfrwp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar', 'dfrwp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dfrwp' ),
			'before_widget' => '<section id="%1$s" class="widget border-[1px] py-2 px-4 rounded-md mb-8 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title mt-0">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Col Left', 'dfrwp' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'dfrwp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) 
	);
	register_sidebar( array(
        'name'          => esc_html__( 'Footer Col Center', 'dfrwp' ),
        'id'            => 'sidebar-3',
        'description'   => esc_html__( 'Add widgets here.', 'dfrwp' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => esc_html__( 'Footer Col Right', 'dfrwp' ),
        'id'            => 'sidebar-4',
        'description'   => esc_html__( 'Add widgets here.', 'dfrwp' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'dfrwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dfrwp_scripts() {
	wp_enqueue_style( 'dfrwp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dfrwp-style', 'rtl', 'replace' );

	wp_enqueue_script( 'dfrwp-navigation', get_template_directory_uri() . '/public/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'theme-functions', get_template_directory_uri() . '/public/js/theme.js', array( 'jquery' ), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dfrwp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Post filter functions.
 */
require get_template_directory() . '/inc/post_filter.php';

/**
 * Add socials links as theme options
 */
require get_template_directory() . '/inc/theme-options.php';
$theme_customizer = new DFR_Theme_Customizer;

/**
 * Register Gutenberg Block with ACF Test
 */
/*
require_once get_template_directory() . '/inc/register-blocks.php';

use TailTheme\RegisterACF\RegisterBasicBlocks;

function register_custom_blocks() {
    $registerBlocks = new RegisterBasicBlocks();

	$registerBlocks->register_article();
}
add_action('init', 'register_custom_blocks');
*/

