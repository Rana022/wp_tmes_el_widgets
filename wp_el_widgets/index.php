<?php
/**
 * Plugin Name: ecommerceme
 * Description: my Ecommerce plugin
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Rana Ghosh
 * Author URI:  https://ranaghosh.xyz/
 * Text Domain: e-commerceme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Ecommerceme {


	const VERSION = '1.0.0';

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	const MINIMUM_PHP_VERSION = '7.0';

	private static $_instance = null;

	
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {

		add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );

	}


	public function i18n() {

		load_plugin_textdomain( 'e-commerceme' );

	}

	
	public function on_plugins_loaded() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

	}

	
	public function is_compatible() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return false;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return false;
		}

		return true;

	}

	public function init() {
	
		$this->i18n();

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/oh-heroarea.php' );
		require_once( __DIR__ . '/widgets/oh-doctors-card.php' );
		require_once( __DIR__ . '/widgets/oh-doctors-slider.php' );
		require_once( __DIR__ . '/widgets/oh-latest-news.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \OH_heroarea() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \OH_doctors_card() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \OH_doctors_slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \OH_latest_news() );


	}

	
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'e-commerceme' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'e-commerceme' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'e-commerceme' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'e-commerceme' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'e-commerceme' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'e-commerceme' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'e-commerceme' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'e-commerceme' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'e-commerceme' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

}

Ecommerceme::instance();

function e_commerce_slide_scripts() {
	wp_enqueue_style( 'font-awesome');
}
add_action( 'wp_enqueue_scripts', 'e_commerce_slide_scripts' );