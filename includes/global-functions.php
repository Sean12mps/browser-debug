<?php 

/**
 * Enqueue global scripts.
 *
 * @since    1.0.0
 *
 * @return   N/A
 */
function add_dbg( $key, $vars ) {

	$global_debug_manager = Browser_Debug_Global::get_instance();

	$global_debug_manager->add_debug_vars( $key, $vars );
	
}

