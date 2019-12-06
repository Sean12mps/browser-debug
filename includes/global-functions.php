<?php 

/**
 * Add debug variables.
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


/**
 * Just a quick pretty var_dump.
 *
 * @since    1.0.0
 *
 * @param    mixed     $vars   The object to debug.
 * @param    bool      $exit   To exit or not after printing debug vars.
 *
 * @return   N/A
 */
function bd_var_dump( $vars, $exit = false ) {

	echo "<pre>";
	var_dump($vars);
	echo "</pre>";

	if ( $exit ) exit;
}
