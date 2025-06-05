<?php
if (function_exists('is_woocommerce') && is_woocommerce()) {
    $rdtheme_title = woocommerce_page_title(false);
} elseif (is_404()) {
    $rdtheme_title = RDTheme::$options['error_title'];
} elseif (is_search()) {
    $rdtheme_title = __('Resultado : ', 'seoengine') . get_search_query();
} elseif (is_home()) {
    if (get_option('page_for_posts')) {
        $rdtheme_title = get_the_title(get_option('page_for_posts'));
    } else {
        $rdtheme_title = apply_filters('seoengine_blog_title', __('All Posts', 'seoengine'));
    }
} elseif (is_archive()) {
    $rdtheme_title = substr(get_the_archive_title(), 10);
} else {
    $rdtheme_title = get_the_title();
}
$GLOBALS["title"] = $rdtheme_title;
?>

<?php if (is_front_page() != 1): ?>
    <div class="entry-banner py-4 <?php echo get_post_meta(get_the_ID(), 'bg_page', true) ?> ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1><?php echo wp_kses_post($rdtheme_title); ?></h1>
                </div>

                <div class="col-lg-4">
                    <div class="breadcrumb-area">
                        <div class="entry-breadcrumb">
                            <?php
                            if (function_exists('yoast_breadcrumb')) {
                                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>