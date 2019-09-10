<?php

/**
 * @since             1.0.0
 * @package           Bro_Dbg
 *
 * @wordpress-plugin
 * Plugin Name:       Browser Debug
 * Plugin URI:        #
 * Description:       Helps in debugging.
 * Version:           1.0.0
 * Author:            Sean Michael
 * Author URI:        sean.michael.piettojo@gmail.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bro_dbg
 */

add_action( 'plugins_loaded', 'start_bro_dbg' );

function start_bro_dbg() {

	define( 'BRO_DBG_VERSION', '1.0.0' );
	define( 'BRO_DBG_SCRIPT_VERSION', '1.0.0' );
	define( 'BRO_DBG_PATH', plugin_dir_path( __FILE__ ) );
	define( 'BRO_DBG_URL', plugin_dir_url( __FILE__ ) );

	require_once BRO_DBG_PATH . '/includes/class-browser-debug.php';

	Browser_Debug::get_instance();

}

