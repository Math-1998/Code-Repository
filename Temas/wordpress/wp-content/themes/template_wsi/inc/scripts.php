<?php
add_action('wp_enqueue_scripts', 'rdtheme_enqueue_scripts', 15);
if (!function_exists('rdtheme_enqueue_scripts')) {
    function rdtheme_enqueue_scripts()
    {
        include RDTHEME_INC_DIR . 'variable-style.php';

        $custom_css = "
            :root {
                --color-1: {$color_1};
                --color-2: {$color_2};
                --color-3: {$color_3};
                --color-4: {$color_4};
                --menu-color: {$menu_color};
                --menu-hover-color: {$menu_hover_color};
                --menu-bg-hover-color: {$menu_bg_hover_color};
                --submenu-color: {$submenu_color};
                --submenu-hover-color: {$submenu_hover_color};
                --submenu-bg-color: {$submenu_bgcolor};
                --submenu-hover-bg-color: {$submenu_hover_bgcolor};
                --footer-title-color: {$footer_title_color};
                --footer-bg-color: {$footer_bg_color};
                --footer-color: {$footer_color};
                --footer-link-color: {$footer_link_color};
                --footer-link-hover-color: {$footer_link_hover_color};
                --copyright-bg-color: {$copyright_bg_color};
                --copyright-color: {$copyright_color};
            }
        ";

        // Enfileira o CSS
        wp_enqueue_style('font-awesome',         RDTHEME_CSS_URL . 'font-awesome.min.css', array(), SEOENGINE_VERSION);
        wp_enqueue_style('bootstrap-css',        RDTHEME_CSS_URL . 'bootstrap.min.css', array(), SEOENGINE_VERSION);
        wp_enqueue_style('swiper-css',           RDTHEME_CSS_URL . 'swiper-bundle.min.css', array(), SEOENGINE_VERSION);
        wp_enqueue_style('style-custom',         RDTHEME_CSS_URL . 'style.css', array(), SEOENGINE_VERSION);

        wp_add_inline_style('style-custom', $custom_css);
        
        // Enfileira scripts JS
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap-js',          RDTHEME_JS_URL . 'bootstrap.min.js', array('jquery'), SEOENGINE_VERSION, true);
        wp_enqueue_script('custom',                RDTHEME_JS_URL . 'custom.js', array('jquery'), SEOENGINE_VERSION, true);
        wp_enqueue_script('swiper-js',             RDTHEME_JS_URL . 'swiper-bundle.min.js', array('jquery'), SEOENGINE_VERSION, true);
        wp_enqueue_script('swiper-custom',         RDTHEME_JS_URL . 'swiper-custom.js', array('jquery'), SEOENGINE_VERSION, true);
        wp_enqueue_script('jquery-mask',           RDTHEME_JS_URL . 'jquery.mask.min.js', array('jquery'), SEOENGINE_VERSION, true);
        wp_enqueue_script('jquery-meanmenu',       RDTHEME_JS_URL . 'jquery.meanmenu.min.js', array('jquery'), SEOENGINE_VERSION, true);
        wp_enqueue_script('jquery-nav',            RDTHEME_JS_URL . 'jquery.nav.min.js', array('jquery'), SEOENGINE_VERSION, true);
        wp_enqueue_script('seoengine-main',        RDTHEME_JS_URL . 'main.js', array('jquery'), SEOENGINE_VERSION, true);
        
        $appendHtml = '';    
        $logo_black_mob = empty(RDTheme::$options['logo-footer']['url']) ? RDTHEME_IMG_URL . 'logo-dark.png' : RDTheme::$options['logo-footer']['url'];
        $url_header_mob = get_permalink(get_the_ID());

        $rdtheme_localize_data = array(
            'stickyMenu' => RDTheme::$options['sticky_menu'],
            'meanWidth'  => RDTheme::$options['resmenu_width'],
            'siteLogo'   => '<a href="' . esc_url($url_header_mob) . '" title="' . esc_attr(get_bloginfo('title')) . '">                            
                                <img class="img-black img-fluid" src="' . esc_url(retornar_image($logo_black_mob)) . '" width="160" height="91" title="' . esc_attr(get_bloginfo('title')) . '" alt="' . esc_attr(get_bloginfo('title')) . '"/>
                             </a>',
            'extraOffset' => RDTheme::$options['sticky_menu'] ? 70 : 0,
            'extraOffsetMobile' => RDTheme::$options['sticky_menu'] ? 52 : 0,
            'appendHtml'    => $appendHtml,
        );
        wp_localize_script('seoengine-main', 'SEOEngineObj', $rdtheme_localize_data);
    }
}
