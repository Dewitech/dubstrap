<?php
/*
Plugin Name: DewitechShortcodes
Plugin URI: http://www.dewitech.com/
Description: A simple shortcode generator. Add buttons, columns, tabs, toggles and alerts to your theme.
Version: 1.0.1
Author: Dewitech
Author URI: http://www.dewitech.com
*/

/*
This plugin have been modified for compability with the theme.
*/

class DTShortcodes {
    function __construct() 
    {	//echo get_template_directory_uri(__FILE__);
    	define('dewitech_TINYMCE_URI', get_template_directory_uri().'/includes/shortcodes/tinymce');
		define('dewitech_TINYMCE_DIR', get_template_directory_uri().'/includes/shortcodes/tinymce');
		
        add_action('init', array(&$this, 'init'));
        add_action('admin_init', array(&$this, 'admin_init'));
	}
	
	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function init()
	{

		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	
		if ( get_user_option('rich_editing') == 'true' )
		{
			add_filter( 'mce_external_plugins', array(&$this, 'add_rich_plugins') );
			add_filter( 'mce_buttons', array(&$this, 'register_rich_buttons') );
		}
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return	void
	 */
	function add_rich_plugins( $plugin_array )
	{
		$plugin_array['dewitechShortcodes'] = get_template_directory_uri().'/includes/shortcodes/tinymce/plugin.js';
		return $plugin_array;
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function register_rich_buttons( $buttons )
	{
		array_push( $buttons, "|", 'dewitech_button' );
		return $buttons;
	}
	
	/**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
	function admin_init()
	{
		// css
		wp_enqueue_style( 'dewitech-popup', dewitech_TINYMCE_URI . '/css/popup.css', false, '1.0', 'all' );
		
		// js
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-livequery', dewitech_TINYMCE_URI . '/js/jquery.livequery.js', false, '1.1.1', false );
		wp_enqueue_script( 'jquery-appendo', dewitech_TINYMCE_URI . '/js/jquery.appendo.js', false, '1.0', false );
		wp_enqueue_script( 'base64', dewitech_TINYMCE_URI . '/js/base64.js', false, '1.0', false );
		wp_enqueue_script( 'dewitech-popup', dewitech_TINYMCE_URI . '/js/popup.js', false, '1.0', false );
		
		wp_localize_script( 'jquery', 'dewitechShortcodes', array('plugin_folder' => get_template_directory_uri() .'/includes/shortcodes') );
	}
    
}
$dewitech_shortcodes = new DTShortcodes();

?>