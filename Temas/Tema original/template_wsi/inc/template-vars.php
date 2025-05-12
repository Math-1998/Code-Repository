<?php
add_action('template_redirect', 'rdtheme_template_vars');
if (!function_exists('rdtheme_template_vars')) {
    function rdtheme_template_vars()
    {
        // Single Pages
        if (is_single() || is_page()) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch ($post_type) {
                case 'page':
                    $prefix = 'page';
                    break;
                case 'post':
                    $prefix = 'single_post';
                    break;
                case 'seo_case':
                    $prefix = 'case';
                    break;
                case 'seo_team':
                    $prefix = 'team';
                    RDTheme::$options[$prefix . '_layout'] = 'full-width';
                    break;
                case 'seo_portfolio':
                    $prefix = 'portfolio';
                    RDTheme::$options[$prefix . '_layout'] = 'full-width';
                    break;
                case 'product':
                    $prefix = 'product';
                    break;
                default:
                    $prefix = 'single_post';
                    break;
            }

            $bgimg          = get_post_meta($post_id, 'seoengine_banner_bgimg', true);
            $tr_header      = get_post_meta( $post_id, 'seoengine_tr_header', true );

            RDTheme::$tr_header = ( empty( $tr_header ) || $tr_header == 'default' ) ? RDTheme::$options['tr_header'] : $tr_header;

            if (!empty($bgimg)) {
                $attch_url      = wp_get_attachment_image_src($bgimg, 'full');
                RDTheme::$bgimg = $attch_url[0];
            } elseif (!empty(RDTheme::$options[$prefix . '_bgimg']['id'])) {
                $attch_url      = wp_get_attachment_image_src(RDTheme::$options[$prefix . '_bgimg']['id'], 'full');
                RDTheme::$bgimg = $attch_url[0];
            } else {
                RDTheme::$bgimg = RDTHEME_IMG_URL . 'banner.jpg';
            }
        }

        // Blog and Archive
        elseif (is_home() || is_archive() || is_search() || is_404()) {
            if (is_search()) {
                $prefix = 'search';
            } elseif (is_404()) {
                $prefix                                = 'error';
                RDTheme::$options[$prefix . '_layout'] = 'full-width';
            } else {
                $prefix = 'blog';
            }

            RDTheme::$layout         = RDTheme::$options[$prefix . '_layout'];
            RDTheme::$tr_header      = RDTheme::$options['tr_header'];
            // RDTheme::$top_bar        = RDTheme::$options['top_bar'];
            // RDTheme::$top_bar_style  = RDTheme::$options['top_bar_style'];
            // RDTheme::$header_style   = RDTheme::$options['header_style'];
            // RDTheme::$padding_top    = RDTheme::$options[$prefix . '_padding_top'];
            // RDTheme::$padding_bottom = RDTheme::$options[$prefix . '_padding_bottom'];
            // RDTheme::$has_banner     = RDTheme::$options[$prefix . '_banner'];
            // RDTheme::$has_breadcrumb = RDTheme::$options[$prefix . '_breadcrumb'];
            // RDTheme::$bgtype         = RDTheme::$options[$prefix . '_bgtype'];
            // RDTheme::$bgcolor        = RDTheme::$options[$prefix . '_bgcolor'];

            if (!empty(RDTheme::$options[$prefix . '_bgimg']['id'])) {
                $attch_url      = wp_get_attachment_image_src(RDTheme::$options[$prefix . '_bgimg']['id'], 'full');
                RDTheme::$bgimg = $attch_url[0];
            } else {
                RDTheme::$bgimg = RDTHEME_IMG_URL . 'banner.jpg';
            }
        }
    }
}
