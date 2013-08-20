<?php
/*
Loading All CSS Stylesheets
------------------------------------------------------------------- */
function dubstrap_css_loader() {
	if (get_option('dt_flat') == 'flat')
	wp_enqueue_style('flatstrap', get_template_directory_uri().'/assets/css/flatstrap.css', false ,'1.75', 'all' );
	else
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', false ,'2.3.2', 'all' );
	wp_enqueue_style('bootstrap-responsive', get_template_directory_uri().'/assets/css/bootstrap-responsive.min.css', false ,'2.3', 'all' );
	wp_enqueue_style('docs', get_template_directory_uri().'/assets/css/docs.css', false ,'1.0', 'all' );
	wp_enqueue_style('fontawesome', get_template_directory_uri().'/assets/css/font-awesome.css', false ,'3.2.1', 'all' );
	wp_enqueue_style('jquery-tweet', get_template_directory_uri().'/assets/css/jquery.tweet.css', false ,'1.0', 'all' );
//	wp_enqueue_style('color', get_template_directory_uri().'/assets/css/colors/'. get_option('dubstrap_themecolor') .'.css', true, 'all' );

}
add_action('wp_enqueue_scripts', 'dubstrap_css_loader');

?>