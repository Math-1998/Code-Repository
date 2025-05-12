<?php
$parent_id = wp_get_post_parent_id(get_the_ID());
$title = $parent_id ? get_the_title($parent_id) : get_the_title();
$page_id = get_the_ID();

/*
Template Name:Page Tratamentos Internas
*/
$style_page = "style-pages.css";

add_filter('wp_enqueue_page_style', function () use ($style_page) {
    return $style_page;
});

get_header();

?>
<main id="page-tratamentos" class="internas">
    <section class="container-lg">
        <h1 class="text-center position-relative"><?= esc_html($title); ?></h1>

        <p class="text-center subtitle mb-5"><?php the_field('titulo'); ?></p>

        <?php
        switch ($page_id) {
            case 152:
                get_template_part('template-parts/componentes/content', 'capilares');
                break;
            case 150:
                get_template_part('template-parts/componentes/content', 'corporais');
                break;
            case 154:
                get_template_part('template-parts/componentes/content', 'estetica');
                break;
        } ?>

    </section>
</main>

<?php get_footer(); ?>