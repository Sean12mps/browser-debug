# browser-debug
WordPress plugin to help in development debugging.  
  
# Installation  
Normal WordPress plugin installation.
  
# Usage  
There are currently two ways to output something to the debugger. After the site is reloaded, those variables will be available in browser javascript console.  
  
## Using WordPress Action  
This action may be used to prevent undefined function error when the plugin is not active. Debug variables will be safe to be used even after production.  
  
Usage Example:  
```
global $wp;	
do_action( 'browser_debug', 'Global WordPress Object', $wp );
```
  
## Using a Helper Function  
This function may be used to add variables to the debugger. Don't forget to remove them when moving to production.  
  
Usage Example:  
```
add_dbg( $title, $variable_to_debug );
```  
  
# Tools  
If you're logged in, check out the wp-admin bar for Browser Debug menu item. Clicking on "Show All Logs" will reprint all of the debug variables added earlier.  
  
# Development  
Let me know other helpful debugging tools we need to add. The main things that we should always consider are:
- It's a WordPress plugin.
- Should always be safe to remove when moving to production. Nothing should throw error when deactivating the plugin.
- No zombie data. If something needs to be saved to database, always use the WordPress way to do it.
