<?php 

/**
 * Enqueue global scripts.
 *
 * @since    1.0.0
 *
 * @param    string    $key    The title of debug object.
 * @param    mixed     $vars   The object to debug.
 * @param    string    $mode   Debug log mode to use ( log, table ).
 *
 * @return   N/A
 */
function add_dbg( $key, $vars, $mode = 'log' ) {

	$global_debug_manager = Browser_Debug_Global::get_instance();

	$global_debug_manager->add_debug_vars( $key, $vars, $mode );
	
}

