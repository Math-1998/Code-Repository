<?php
/*
Template Name:Page Tecnologias
*/
$style_page = "style-pages.css";

add_filter('wp_enqueue_page_style', function () use ($style_page) {
    return $style_page;
});

get_header();

?>
<main id="page-tecnologias" class="internas py-5">
    <section class="container-lg">
        <h1 class="text-center position-relative"><?php the_title(); ?></h1>

        <p class="text-center subtitle"><?php the_field('titulo'); ?></p>
        <p class="text-center mb-5"><?php the_field('texto'); ?></p>

        <?php get_template_part('template-parts/componentes/content', 'tecnologias'); ?>
    </section>
</main>

<?php get_footer(); ?>