<?php
$menu_formatos = RDTheme_Helper::nav_formatos_menu_args(); 
?>

<aside class="col-lg-4">
    <div class="menu-sidebar mt-3 mb-4">
        <h3>Posts relacionados:</h3>
        <?php echo do_shortcode('[Categorias_Relacionados posts_atual=""]'); ?>
    </div>

    <div class="menu-sidebar">
        <h3>Formatos</h3>
        <?php wp_nav_menu($menu_formatos); ?>
    </div>
</aside>