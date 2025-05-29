<?php
if(!defined('ABSPATH')) {
    exit;
}


/**
 * Constants
 */

define('CSS_PATH', get_template_directory_uri() . '/css/');
define('JS_PATH', get_template_directory_uri() . '/js/');

add_action( 'wp_enqueue_scripts', 'wsi_theme_enqueue' );
function wsi_theme_enqueue() {

    /* Enqueue styles */

    $style_list = [
        'normalize.css',
    ];
    foreach ($style_list as $style) {
        wp_enqueue_style($style, CSS_PATH . $style, array(), '1.0.0', 'all');
    };

}

add_action( $hook_name:string, $callback:callable, $priority:integer, $accepted_args:integer )
