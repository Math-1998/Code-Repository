<?php
$rdtheme_theme_data = wp_get_theme(get_template());

if (function_exists('vc_is_inline') && vc_is_inline()) {
    define('SEOENGINE_VERSION', time());
} else {
    define('SEOENGINE_VERSION', (WP_DEBUG) ? time() : $rdtheme_theme_data->get('Version'));
}

define('RDTHEME_AUTHOR_URI', $rdtheme_theme_data->get('AuthorURI'));

// DIR
define('RDTHEME_BASE_DIR',    get_template_directory() . '/');
define('RDTHEME_INC_DIR',     RDTHEME_BASE_DIR . 'inc/');
define('RDTHEME_VIEW_DIR',    RDTHEME_INC_DIR . 'views/');
define('RDTHEME_WID_DIR',     RDTHEME_INC_DIR . 'widgets/');
define('RDTHEME_JS_DIR',      RDTHEME_BASE_DIR . 'assets/js/');

// URL
define('RDTHEME_BASE_URL',    get_template_directory_uri() . '/');
define('RDTHEME_ASSETS_URL',  RDTHEME_BASE_URL . 'assets/');
define('RDTHEME_INC_URL',     RDTHEME_BASE_URL . 'inc/');
define('RDTHEME_CSS_URL',     RDTHEME_ASSETS_URL . 'css/');
define('RDTHEME_JS_URL',      RDTHEME_ASSETS_URL . 'js/');
define('RDTHEME_IMG_URL',     RDTHEME_ASSETS_URL . 'img/');

// Includes
require_once RDTHEME_INC_DIR . 'redux-config.php';
require_once RDTHEME_INC_DIR . 'rdtheme.php';
require_once RDTHEME_INC_DIR . 'helper-functions.php';
require_once RDTHEME_INC_DIR . 'general.php';
require_once RDTHEME_INC_DIR . 'scripts.php';
require_once RDTHEME_INC_DIR . 'template-vars.php';
require_once RDTHEME_INC_DIR . '/seo/shortcodes.php';

// Widgets
require_once RDTHEME_WID_DIR . 'search-widget.php';

// Removes the wlwmanifest link
remove_action('wp_head', 'wlwmanifest_link');
// Removes the RSD link
remove_action('wp_head', 'rsd_link');
// Removes the WP shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Removes the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links_extra', 3);
// Removes links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'feed_links', 2);
// Removes the prev link
remove_action('wp_head', 'parent_post_rel_link');
// Removes the start link
remove_action('wp_head', 'start_post_rel_link');
// Removes the relational links for the posts adjacent to the current post
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
// Removes the WordPress version i.e. -
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

function remove_query_strings()
{
    if (!is_admin()) {
        add_filter('script_loader_src', 'remove_query_strings_split', 15);
        add_filter('style_loader_src', 'remove_query_strings_split', 15);
    }
}
function remove_query_strings_split($src)
{
    $output = preg_split("/(&ver|\?ver)/", $src);
    return $output[0];
}
add_action('init', 'remove_query_strings');

function wpassist_remove_block_library_css()
{
    wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');

function comments_clean_header_hook()
{
    wp_deregister_script('comment-reply');
}
add_action('init', 'comments_clean_header_hook');

function speed_stop_loading_wp_embed()
{
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}
add_action('init', 'speed_stop_loading_wp_embed');

function is_blog()
{
    return (is_archive() || is_author() || is_category() || is_home() || is_tag()) && 'post' == get_post_type();
}

function retornar_Numero($str)
{
    return preg_replace("/[^0-9]/", "", $str);
}

function retornar_image($string)
{
    return str_replace('https://', 'https://i0.wp.com/', $string);
}


function custom_enqueue_page_styles()
{
    $css_page = apply_filters('wp_enqueue_page_style', null);

    if ($css_page) {
        wp_enqueue_style('page-css', RDTHEME_CSS_URL . $css_page, array(), SEOENGINE_VERSION);
    }
}
add_action('wp_enqueue_scripts', 'custom_enqueue_page_styles');





