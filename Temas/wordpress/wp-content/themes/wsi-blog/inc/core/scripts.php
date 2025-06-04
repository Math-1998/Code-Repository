<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('wsi_blog_enqueue_scripts')) {
    function wsi_blog_enqueue_scripts()
    {
        /* Enqueue Core CSS */

        wp_enqueue_style('core-style', CSS_URI . '/output.css', [], filemtime(THEME_PATH . '/assets/css/output.css'), 'all');
        wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11.2.8/swiper-bundle.min.css', [], '11.2.8', 'all');

        /* Enqueue scripts */

        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11.2.8/swiper-bundle.min.js', [], '11.2.8', [
            'strategy' => 'defer',
            'in_footer' => true
        ]);
    };

    add_action('wp_enqueue_scripts', 'wsi_blog_enqueue_scripts');
}
