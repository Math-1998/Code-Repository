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
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        // Adiciona a classe no item (trabalha com filtros depois)
        $item->classes[] = 'tailwind-link';
        parent::start_el( $output, $item, $depth, $args, $id );
    }
}
add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args, $depth ) {
    if ( in_array( 'tailwind-link', (array) $item->classes ) ) {
        $atts['class'] = 'text-gray-500 transition hover:text-gray-500/75';
    }
    return $atts;
}, 10, 4 );

