window.addEventListener( 'load', () => { 

	if ( ! bro_dbg_vars ) return false;

	bro_dbg_vars.map( function( elem ) {

		console.log('');
		console.log( elem.title + ' | ' + elem.type );
		console.log('debug ___________________');
		console.log( elem.vars );
		console.log('trace ___________________');
		console.log( elem.source );
		console.log('_________________________');
	} );
	
} );
