<?php
/**
 * ECommerce functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ECommerce
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
//theme customizer
require_once('helper/customizer.php');

if ( ! function_exists( 'e_commerce_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function e_commerce_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ECommerce, use a find and replace
		 * to change 'e_commerce' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'e_commerce', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'e_commerce' ),
				'top-menu' => esc_html__( 'Top Menu', 'e_commerce' ),
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
				'e_commerce_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'e_commerce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function e_commerce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'e_commerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'e_commerce_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function e_commerce_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Paragraph', 'e_commerce' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'e_commerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="sidebar-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'e_commerce' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Your footer widgets.', 'e_commerce' ),
			'before_widget' => '<ul id="%1$s" class="footer-menu %2$s">',
			'after_widget'  => '</ul>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'e_commerce' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Your footer widgets.', 'e_commerce' ),
			'before_widget' => '<ul id="%1$s" class="footer-menu %2$s">',
			'after_widget'  => '</ul>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'e_commerce' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Your footer widgets.', 'e_commerce' ),
			'before_widget' => '<ul id="%1$s" class="footer-menu %2$s">',
			'after_widget'  => '</ul>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'e_commerce' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Your footer widgets.', 'e_commerce' ),
			'before_widget' => '<ul id="%1$s" class="footer-menu %2$s">',
			'after_widget'  => '</ul>',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		)
	);
}
add_action( 'widgets_init', 'e_commerce_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function e_commerce_scripts() {
	wp_enqueue_style( 'oh_maicons_css', get_template_directory_uri() . '/assets/css/maicons.css');
	wp_enqueue_style( 'oh_bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style( 'oh_owl_css', get_template_directory_uri() . '/assets/vendor/owl-carousel/css/owl.carousel.css');
	wp_enqueue_style( 'oh_animate_css', get_template_directory_uri() . '/assets/vendor/animate/animate.css');
	wp_enqueue_style( 'oh_theme_css', get_template_directory_uri() . '/assets/css/theme.css');
	wp_enqueue_style( 'e_commerce-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'e_commerce-style', 'rtl', 'replace' );

	wp_enqueue_script( 'oh_jquery_js', get_template_directory_uri() . '/assets/js/jquery-3.5.1.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'oh_bootstrap_bundle_js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'oh_owl_js', get_template_directory_uri() . '/assets/vendor/owl-carousel/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'oh_wow_js', get_template_directory_uri() . '/assets/vendor/wow/wow.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'oh_theme_js', get_template_directory_uri() . '/assets/js/theme.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'e_commerce_scripts' );

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

// Disables the block editor from managing widgets in the Gutenberg plugin.
// add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

function gb_comment_form_tweaks ($fields) {
    //add placeholders and remove labels
    $fields['author'] = '<input id="author" class="form-control" name="author" value="" placeholder="Name*" size="30" maxlength="245" required="required" type="text">';

    $fields['email'] = '<input id="email" class="form-control" name="email" type="email" value="" placeholder="Email*" size="30" maxlength="100" aria-describedby="email-notes" required="required">';	

    //unset comment so we can recreate it at the bottom
    unset($fields['comment']);

    $fields['comment'] = '<textarea id="comment" class="form-control" name="comment" cols="45" rows="8" maxlength="65525" placeholder="Comment*" required="required"></textarea>';

    //remove website
    unset($fields['url']);

    return $fields;
}

add_filter('comment_form_fields', 'gb_comment_form_tweaks');



