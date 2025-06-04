<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Constants
 */

// Caminhos (uso interno no servidor)
define('THEME_PATH', get_template_directory());
define('INC_PATH', THEME_PATH . '/inc/');

// URLs (uso para navegador)
define('THEME_URI', get_template_directory_uri());
define('ASSETS_URI', THEME_URI . '/assets');
define('CSS_URI', ASSETS_URI . '/css');
define('JS_URI', ASSETS_URI . '/js');
define('IMG_URI', ASSETS_URI . '/img');
define('DIST_URI', THEME_URI . '/dist');

/**
 *  Requires & Includes
 */
require_once INC_PATH . 'core/scripts.php';
require_once INC_PATH . 'core/setup.php';

class Tailwind_Nav_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = 'text-gray-500 transition hover:text-gray-500/75';
        $output .= '<li><a href="' . esc_url($item->url) . '" class="' . $classes . '">' . esc_html($item->title) . '</a></li>';
    }
}
