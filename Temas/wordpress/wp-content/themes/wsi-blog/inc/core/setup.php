<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('wsi_blog_setup')) {
    function wsi_blog_setup()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

        $logo_args = array(
            'height'               => 100,
            'width'                => 250,
            'flex-height'          => true,
            'flex-width'           => true,
        );
        add_theme_support('custom-logo', $logo_args);

        add_theme_support('menus');

        register_nav_menus([
            'primary' => __('Menu Principal', 'wsi_blog'),
            'secondary' => __('Menu Secundário', 'wsi_blog'),
        ]);

        load_theme_textdomain('wsi_blog', THEME_PATH . '/languages');
    }
    add_action('after_setup_theme', 'wsi_blog_setup');
}
