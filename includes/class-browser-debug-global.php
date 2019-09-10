<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Global hooks manager.
 *
 * @since      1.0.0
 * @package    Bro_Dbg
 * @subpackage Bro_Dbg/includes/Browser_Debug_Global
 * @author     Sean Michael <sean.michael.piettojo@gmail.com>
 */
class Browser_Debug_Global {

	/**
	 * Variables to debug.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private $debug_vars;

	/**
	 * The instance of this class
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private static $instance;

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
	 * Register global scripts.
	 *
	 * @since    1.0.0
	 *
	 * @return   N/A
	 */
	public function register_scripts() {

		wp_register_script( 'bro-dbg-global', BRO_DBG_URL . '/assets/js/bro-dbg-global.js', array(), BRO_DBG_SCRIPT_VERSION, true );

	}

	/**
	 * Enqueue global scripts.
	 *
	 * @since    1.0.0
	 *
	 * @return   N/A
	 */
	public function enqueue_scripts() {

		wp_localize_script( 'bro-dbg-global', 'bro_dbg_vars', $this->get_debug_vars() );

		wp_enqueue_script( 'bro-dbg-global' );

	}

	/**
	 * Add variable to debug.
	 *
	 * @since    1.0.0
	 *
	 * @return   N/A
	 */
	public function add_debug_vars( $key, $vars ) {

		$this->debug_vars[] = array(
			'title' => $key,
			'type' => gettype( $vars ),
			'vars' => $vars,
			'source' => debug_backtrace(),
		);

	}

	/**
	 * Get all or a debug vars.
	 *
	 * @since    1.0.0
	 *
	 * @return   N/A
	 */
	public function get_debug_vars( $key = null ) {

		if ( is_null( $key ) )
			return $this->debug_vars;

		if ( ! $this->debug_vars )
			return false;

		foreach ( $this->debug_vars as $debug_var )
			if ( $key === $debug_var[$key] ) return $debug_var[$key];

		return null;

	}

}
