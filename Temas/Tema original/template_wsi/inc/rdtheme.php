<?php
if ( !class_exists( 'RDTheme' ) ) {

	class RDTheme {

		protected static $instance = null;

		// Sitewide static variables
		public static $options = null;
		public static $team_social_fields = null;

		// Template specific variables
		public static $layout = null;
		public static $tr_header = null;
		public static $top_bar = null;
		public static $top_bar_style = null;
		public static $header_style = null;
		public static $padding_top = null;
		public static $padding_bottom = null;
		public static $has_banner = null;
		public static $has_breadcrumb = null;
		public static $bgtype = null;
		public static $bgimg = null;
		public static $bgcolor = null;

		private function __construct() {
			$this->redux_init();
			$this->vc_init();
			$this->layerslider_init();
			add_action( 'after_setup_theme', array( $this, 'set_redux_options' ) );
			add_action( 'after_setup_theme', array( $this, 'set_redux_compability_options' ) );
			add_action( 'init', array( $this, 'rewrite_flush_check' ) );
		}

		public static function instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		public function redux_init() {
			add_action( 'admin_menu', array( $this, 'remove_redux_menu' ), 12 );
			add_filter( 'redux/seoengine/aURL_filter', '__return_empty_string' ); // Remove Redux Ads
			add_action( 'redux/page/seoengine/enqueue', array( $this, 'redux_admin_style' ) );
			add_action( 'redux/options/seoengine/saved', array( $this, 'flush_redux_saved' ), 10, 2 );
			add_action( 'redux/options/seoengine/section/reset', array( $this, 'flush_redux_reset' ) );
			add_action( 'redux/options/seoengine/reset', array( $this, 'flush_redux_reset' ) );
		}

		public function vc_init() {
			if ( function_exists('vc_updater') ) {
				remove_filter( 'upgrader_pre_download', array( vc_updater(), 'preUpgradeFilter' ), 10);
				remove_filter( 'pre_set_site_transient_update_plugins', array( vc_updater()->updateManager(), 'check_update' ) );
			}
		}

		public function layerslider_init() {
			add_action( 'layerslider_ready', array( $this, 'disable_layerslider_autoupdate' ) );
			add_action( 'admin_init', array( $this, 'layerslider_disable_plugin_notice' ) ); // Remove LayerSlider purchase notice from plugins page

			if ( !is_admin() || !apply_filters( 'rdtheme_disable_layerslider_autoupdate', true ) || get_option( 'layerslider-authorized-site' ) ) return;

			// Fix issue of Layerslider update via TGM. Side effect: autoupdate disabled permanently
			global $LS_AutoUpdate;
			if ( isset( $LS_AutoUpdate ) && defined( 'LS_ROOT_FILE' ) ) {
				remove_filter( 'pre_set_site_transient_update_plugins', array( $LS_AutoUpdate, 'set_update_transient' ) );
				remove_filter( 'plugins_api', array( $LS_AutoUpdate, 'set_updates_api_results'), 10, 3 );
				remove_filter( 'upgrader_pre_download', array( $LS_AutoUpdate, 'pre_download_filter' ), 10, 4 );
				remove_filter( 'in_plugin_update_message-'.plugin_basename( LS_ROOT_FILE ), array( $LS_AutoUpdate, 'update_message' ) );
				remove_filter( 'wp_ajax_layerslider_authorize_site', array( $LS_AutoUpdate, 'handleActivation' ) );
				remove_filter( 'wp_ajax_layerslider_deauthorize_site', array( $LS_AutoUpdate, 'handleDeactivation' ) );
			}
		}

		public function layerslider_disable_plugin_notice() {
			if ( defined( 'LS_PLUGIN_BASE' ) ) {
				remove_action( 'after_plugin_row_' . LS_PLUGIN_BASE, 'layerslider_plugins_purchase_notice', 10, 3 );
			}
		}

		public function disable_layerslider_autoupdate() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		public function set_redux_options(){
			if ( ! class_exists( 'Redux' ) ) {
				include RDTHEME_INC_DIR . 'redux-data.php';
				self::$options = json_decode( $rdtheme_redux_data, true );
				return;
			}		
			global $seoengine;
			self::$options = $seoengine;

			
		}

		// Backward compability for newly added options
		public function set_redux_compability_options(){
			$new_options = array(
				'top_bar_color_tr' => '#efefef',
				'menu_color_tr'    => '#fff',
				'logo_width'       => '2',
				'logo_fixed_height' => true,
				'logo_fixed_height_sticky' => true,
				'post_share' => array(
					'facebook'  => '1',
					'twitter'   => '1',
					'gplus'     => '1',
					'linkedin'  => '1',
					'pinterest' => '0',
					'tumblr'    => '0',
					'reddit'    => '0',
					'vk'        => '0',
				),
			);
			foreach ( $new_options as $key => $value ) {
				if ( !isset( self::$options[$key] ) ) {
					self::$options[$key] = $value;
				}	    	
			}
		}

		public function remove_redux_menu() {
			remove_submenu_page('tools.php','redux-about');
		}

		public function redux_admin_style() {
			wp_enqueue_style( 'seoengine-redux-admin', RDTHEME_CSS_URL . 'redux-admin.css', array( 'redux-admin-css' ), SEOENGINE_VERSION );
		}

		// Flush rewrites
		public function flush_redux_saved( $saved_options, $changed_options ){
			if ( empty( $changed_options ) ) {
				return;
			}
			$flush = false;
			$slugs = array( 'case_slug', 'team_slug', 'portfolio_slug' );
			foreach ( $slugs as $slug ) {
				if ( array_key_exists( $slug, $changed_options ) ) {
					$flush = true;
				}
			}

			if ( $flush ) {
				update_option( 'seoengine_rewrite_flash', true );
			}
		}

		public function flush_redux_reset(){
			update_option( 'seoengine_rewrite_flash', true );
		}

		public function rewrite_flush_check() {
			if ( get_option('seoengine_rewrite_flash') == true ) {
				flush_rewrite_rules();
				update_option( 'seoengine_rewrite_flash', false );
			}
		}
	}
}

RDTheme::instance();

// Remove Redux NewsFlash
if ( ! class_exists( 'reduxNewsflash' ) ){
	class reduxNewsflash {
		public function __construct( $parent, $params ) {}
	}
}