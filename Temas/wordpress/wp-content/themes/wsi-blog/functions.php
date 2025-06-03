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

    /* Enqueue Core CSS */

    wp_enqueue_style( 'core-style', CSS_PATH . 'output.css', [], filemtime(THEME_PATH . '/assets/app.css'), 'all' );
    wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11.2.8/swiper-bundle.min.css', [], '11.2.8', 'all' );

    /* Enqueue scripts */

    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11.2.8/swiper-bundle.min.js', [], '11.2.8', [
        'strategy' => 'defer', 'in_footer' => true
    ] );

};
