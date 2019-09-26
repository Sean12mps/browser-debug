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

		wp_register_style( 'bro-dbg-style', BRO_DBG_URL . '/assets/css/bro-dbg-style.css', array(), BRO_DBG_STYLE_VERSION, 'all' );

	}

	/**
	 * Enqueue style.
	 *
	 * @since    1.0.0
	 *
	 * @return   N/A
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'bro-dbg-style' );

	}

	/**
	 * Enqueue global scripts.
	 *
	 * @since    1.0.0
	 *
	 * @return   N/A
	 */
	public function enqueue_scripts() {

		$browser_debug = Browser_Debug_Global::get_instance();

		wp_localize_script( 'bro-dbg-global', 'bro_dbg_vars', $browser_debug->get_debug_vars() );

		wp_print_scripts( 'bro-dbg-global' );

	}

	/**
	 * Add variable to debug.
	 *
	 * @since    1.0.0
	 *
	 * @param    string    $key    The title of debug object.
	 * @param    mixed     $vars   The object to debug.
	 * @param    string    $mode   Debug log mode to use ( log, table ).
	 *
	 * @return   N/A
	 */
	public function add_debug_vars( $key, $vars, $mode = 'log' ) {

		// var_dump('varsxxxx - '. $key);

		$this->debug_vars[] = array(
			'title' => $key,
			'type' => gettype( $vars ),
			'vars' => $vars,
			'source' => debug_backtrace(),
			'mode' => $mode,
		);
		// var_dump($this->debug_vars);

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

	/**
	 * Add menu item in admin bar.
	 *
	 * @since    1.0.0
	 *
	 * @return   N/A
	 */
	public function browser_debug_admin_bar_menu( $wp_admin_bar ) {

		$parent_menu = array(
			'id'    => 'browser_debug',
			'title' => '<span class="ab-icon"></span>' . __( 'Browser Debug', 'bro_dbg' ),
			'href'  => '#',
			'meta'  => array( 'class' => 'browser-debug-menu' )
		);

		$sub_menu_print_all = array(
			'parent' => 'browser_debug',
			'id'     => 'browser_debug__print_all',
			'title'  => __( 'Show All Logs', 'bro_dbg' ),
			'href'   => '#',
			'meta'   => array( 'class' => 'browser-debug-submenu' )
		);

		$wp_admin_bar->add_node( $parent_menu );

		$wp_admin_bar->add_node( $sub_menu_print_all );

	}

}
