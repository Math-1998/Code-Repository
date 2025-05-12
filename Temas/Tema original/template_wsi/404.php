<?php
$imagem_erro = empty(RDTheme::$options['error_bodybanner']['url']) ? RDTHEME_IMG_URL . '404.png' : RDTheme::$options['error_bodybanner']['url'];

get_header(); 
?>

<main id="primary" class="content-area error-page-area">
    <div class="container">
        <div class="error-page">
            <img src="<?php echo retornar_image(esc_url($imagem_erro)); ?>" alt="<?php esc_attr_e('404', 'seoengine'); ?>">
            <h3><?php echo esc_html(RDTheme::$options['error_text1']); ?></h3>
            <p><?php echo esc_html(RDTheme::$options['error_text2']); ?></p>
            <a class="error-page-btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(RDTheme::$options['error_buttontext']); ?></a>
        </div>
    </div>
</main>

<?php get_footer(); ?>