const printAllDebugVars = () => {

	if ( ! bro_dbg_vars ) return undefinedDebugVars();

	bro_dbg_vars.map( function( elem ) {

		switch ( elem.mode ) {

			case 'log':
				console.log( '\n%o | %o \nDebug: %o \nTrace: %o \n\n\n', 
					elem.title,
					elem.type,
					elem.vars,
					elem.source,
				);
				break;

			case 'table':
				console.log( '%o | %o', 
					elem.title,
					elem.type,
				);
				console.table(elem.vars);
				console.log( 'Trace: %o  \n\n\n', elem.source);
				break;

		}

	} );
	
};

const undefinedDebugVars = () => {
	console.log('No debug variables were found.');
	return false;
};

const browserDebugAddListener = () => {

	const buttonPrintAll = document.getElementById( 'wp-admin-bar-browser_debug__print_all' )

	buttonPrintAll.addEventListener('click', function (e) {

		e.preventDefault();

		printAllDebugVars();

	}, false);

};



window.addEventListener( 'load', printAllDebugVars );
window.addEventListener( 'load', browserDebugAddListener );
