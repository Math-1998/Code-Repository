<?php
if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

// Setup theme default functionalities
add_action('after_setup_theme', 'rdtheme_setup');
if ( !function_exists( 'rdtheme_setup' ) ) {
	function rdtheme_setup() {
		// Language
		load_theme_textdomain( 'seoengine', RDTHEME_BASE_DIR . 'languages' );

		// Theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'seoengine' ),			
			'footer'  => esc_html__( 'Footer Menu', 'seoengine' )
			) );
	}	
}

// Body class
add_filter( 'body_class', 'rdtheme_body_classes' );
if( !function_exists( 'rdtheme_body_classes' ) ) {
	function rdtheme_body_classes( $classes ) {
		$classes[] = 'non-stick';

		$classes[] = 'header-style-'. RDTheme::$header_style;

		if ( RDTheme::$top_bar == 1 || RDTheme::$top_bar == 'on' ){
			$classes[] = 'has-topbar topbar-style-'. RDTheme::$top_bar_style;
		}        

		if ( RDTheme::$tr_header == 1 || RDTheme::$tr_header == 'on' ){
			$classes[] = 'trheader';
		}

		return $classes;
	}
}