<?php
if ( !class_exists( 'RDTheme_Helper' ) ) {
	
	class RDTheme_Helper {

		public static function pagination() {

			if( is_singular() )
				return;

			global $wp_query;

			/** Stop execution if there's only 1 page */
			if( $wp_query->max_num_pages <= 1 )
				return;

			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
			$max   = intval( $wp_query->max_num_pages );

			/**	Add current page to the array */
			if ( $paged >= 1 )
				$links[] = $paged;

			/**	Add the pages around the current page to the array */
			if ( $paged >= 3 ) {
				$links[] = $paged - 1;
				$links[] = $paged - 2;
			}

			if ( ( $paged + 2 ) <= $max ) {
				$links[] = $paged + 2;
				$links[] = $paged + 1;
			}
			include RDTHEME_VIEW_DIR . 'pagination.php';
		}


		public static function filter_content( $content ){
			// wp filters
			$content = wptexturize( $content );
			$content = convert_smilies( $content );
			$content = convert_chars( $content );
			$content = wpautop( $content );
			$content = shortcode_unautop( $content );

			// remove shortcodes
			$pattern= '/\[(.+?)\]/';
			$content = preg_replace( $pattern,'',$content );

			// remove tags
			$content = strip_tags( $content );

			return $content;
		}

		public static function get_current_post_content( $post = false ) {
			if ( !$post ) {
				$post = get_post();
			}
			$content = has_excerpt( $post->ID ) ? $post->post_excerpt : $post->post_content;
			$content = self::filter_content( $content );
			return $content;
		}

		public static function filter_social( $args ){
			return ( $args['url'] != '' );
		}


		public static function small_excerpt(){
			return 35;
		}

		public static function socials(){
			$rdtheme_socials = array(
                'social_youtube' => array(
					'icon' => 'fa-youtube-play fa',
					'url'  => RDTheme::$options['social_youtube'],
					'title' => 'Youtube',
				),
				'social_facebook' => array(
					'icon' => 'fa-facebook fa',
					'url'  => RDTheme::$options['social_facebook'],
					'title' => 'Facebook',
				),
				'social_instagram' => array(
					'icon' => 'fa-instagram fa',
					'url'  => RDTheme::$options['social_instagram'],
					'title' => 'Instagram',
				)
			);
			return array_filter( $rdtheme_socials, array( 'RDTheme_Helper' , 'filter_social' ) );
		}

		public static function nav_menu_args(){
			$rdtheme_pagemenu = false;
			if ( ( is_single() || is_page() ) ) {
				$rdtheme_menuid = get_post_meta( get_the_id(), 'seoengine_page_menu', true );
				if ( !empty( $rdtheme_menuid ) && $rdtheme_menuid != 'default' ) {
					$rdtheme_pagemenu = $rdtheme_menuid;
				}
			}
			if ( $rdtheme_pagemenu ) {
				$nav_menu_args = array( 'menu' => $rdtheme_pagemenu,'container' => 'nav' );
			}
			else {
				$nav_menu_args = array( 'theme_location' => 'primary','container' => 'nav', 'fallback_cb' => 'false' );
			}
			return $nav_menu_args;		
		}

		public static function nav_footer_menu_args(){
			$rdtheme_pagemenu = false;
			if ( ( is_single() || is_page() ) ) {
				$rdtheme_menuid = get_post_meta( get_the_id(), 'seoengine_page_menu', true );
				if ( !empty( $rdtheme_menuid ) && $rdtheme_menuid != 'default' ) {
					$rdtheme_pagemenu = $rdtheme_menuid;
				}
			}
			if ( $rdtheme_pagemenu ) {
				$nav_second_menu_args = array( 'menu' => $rdtheme_pagemenu,'container' => 'nav' );
			}
			else {
				$nav_second_menu_args = array( 'theme_location' => 'footer','container' => 'nav', 'fallback_cb' => 'false' );
			}
			return $nav_second_menu_args;		
		}
	}
}