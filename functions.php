<?php 

/**
 * Ebor Framework
 * Queue Up Theme-Side Framework, everything else is loaded in the ebor-framework plugin.
 * 
 * You can install a child theme to modify all aspects of the theme, if you need to modify anything from the /admin/ folder
 * Just delete the require line below and move it to the functions.php of your child theme, make sure to copy over the entire /admin/ folder too.
 * It's very rare you'd need to do that, but if you do, you'll need to delete this require on every theme update.
 * 
 * @since 1.0.0
 * @author TommusRhodus
 */
require_once ( "admin/init.php" );

/**
 * Queue up page builder elements.
 * 
 * You will not need to remove this line at any point, even with your child theme, see the instructions in page_builder_init.php for how to move blocks into a child theme.
 * They're designed to be easily overwritten and re-registered from your child theme if you need without having to modify this theme.
 * 
 * @since 1.0.0
 * @author TommusRhodus
 */
require_once ( "page_builder_init.php" );

if( function_exists('vc_set_as_theme') )
	require_once( "vc_init.php" );

/**
 * Please use a child theme if you need to modify any aspect of the theme, if you need to, you can add code
 * below here if you need to add extra functionality.
 * Be warned! Any code added here will be overwritten on theme update!
 * Add & modify code at your own risk & always use a child theme instead for this!
 */