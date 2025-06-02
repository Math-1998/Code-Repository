<?php
if (!defined('ABSPATH')) {
    exit;
}


/**
 * Constants
 */

define('THEME_URI', get_template_directory_uri());
define('THEME_PATH', get_template_directory());
define('ASSETS_PATH', THEME_URI . '/assets/');
define('CSS_PATH', ASSETS_PATH . '/css/');
define('JS_PATH', ASSETS_PATH . '/js/');
define('IMG_PATH', ASSETS_PATH . '/img/');
define('DIST_PATH', THEME_URI . '/dist/');

add_action('wp_enqueue_scripts', 'wsi_blog_enqueue');
function wsi_blog_enqueue()
{

    /* Enqueue styles */

    $style_list = [
        'normalize' => 'normalize.css',
        'main' => 'main.css',
        'tailwind-custom' => 'tailwind.css',
    ];
    foreach ($style_list as $handler => $file) {
        wp_enqueue_style($handler, CSS_PATH . $file, [], '1.0.0', 'all');
    };

    /* Enqueue Tailwind */

    wp_enqueue_style( 'tailwind-core', DIST_PATH . 'style.css', [], filemtime(THEME_PATH . '/dist/style.css'), 'all' );

    /* Enqueue scripts */

};
