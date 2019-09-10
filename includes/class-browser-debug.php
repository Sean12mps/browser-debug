<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The core plugin class.
 *
 * @since      1.0.0
 * @package    Bro_Dbg
 * @subpackage Bro_Dbg/includes
 * @author     Sean Michael <sean.michael.piettojo@gmail.com>
 */
class Browser_Debug {

	/**
	 * The instance of this class
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private static $instance;

	public function __construct() {

		$this->require_dependencies();

		if ( is_admin() )
			$this->define_admin_manager();

		$this->define_global_manager();

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @return   object    A single instance of this class.
	 */
	public static function get_instance() {

		if ( null == self::$instance )
			self::$instance = new self;

		return self::$instance;

	}

	/**
	 * Require all supportive files.
	 *
	 * @since    1.0.0
	 *
	 * @return   N/A
	 */
	public function require_dependencies() {

		require_once BRO_DBG_PATH . '/includes/global-functions.php';
		require_once BRO_DBG_PATH . '/includes/class-browser-debug-global.php';
		require_once BRO_DBG_PATH . '/includes/class-browser-debug-admin.php';

	}

	/**
	 * Define hooks that runs only in admin area.
	 *
	 * @since    1.0.0
	 *
	 * @return   N/A
	 */
	public function define_admin_manager() {

	}

	/**
	 * Define hooks that runs in all area.
	 *
	 * @since    1.0.0
	 *
	 * @return   N/A
	 */
	public function define_global_manager() {

		$this->global_manager = Browser_Debug_Global::get_instance();

		add_action( 'wp_enqueue_scripts', array( $this->global_manager, 'register_scripts' ), 10 );
		add_action( 'wp_enqueue_scripts', array( $this->global_manager, 'enqueue_scripts' ), 99 );

	}

}

