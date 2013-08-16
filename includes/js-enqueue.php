<?php
/*
Loading all JS Script Files
------------------------------------------------------------------- */

function dubstrap_js_loader() {
    wp_enqueue_script('less', get_template_directory_uri().'/assets/js/less-1.4.1.min.js', array('jquery'), true );
    wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), true );
    wp_enqueue_script('scriptjs', get_template_directory_uri().'/assets/js/script.js', array('jquery'), true );

    
}
add_action('wp_footer', 'dubstrap_js_loader');

?>