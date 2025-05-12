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
        $style_list = [
            'font-awesome' => 'font-awesome.min.css',
            'bootstrap-css' => 'bootstrap.min.css',
            'swiper-css' => 'swiper-bundle.min.css',
            'style-custom' => 'style.css'
        ];

        foreach ($style_list as $style => $file) {
            wp_enqueue_style($style, RDTHEME_CSS_URL . $file, array(), SEOENGINE_VERSION, 'all');
        }

        if (!empty($custom_css)) {
            wp_add_inline_style('style-custom', $custom_css);
        }

        // Enfileira scripts JS
        $script_list = [
            'bootstrap-js' => 'bootstrap.min.js',
            'custom' => 'custom.js',
            'swiper-js' => 'swiper-bundle.min.js',
            'swiper-custom' => 'swiper-custom.js',
            'jquery-mask' => 'jquery.mask.min.js',
            'jquery-meanmenu' => 'jquery.meanmenu.min.js',
            'jquery-nav' => 'jquery.nav.min.js',
            'seoengine-main' => 'main.js'
        ];

        foreach ($script_list as $script => $file) {
            wp_enqueue_script($script, RDTHEME_JS_URL . $file, array('jquery'), SEOENGINE_VERSION, true);
        }
        
        wp_enqueue_script('jquery');
        

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
