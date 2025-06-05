<?php
/*
Template Name:Page Protocolos
*/
$style_page = "style-pages.css";

add_filter('wp_enqueue_page_style', function () use ($style_page) {
    return $style_page;
});

get_header(); ?>
<main id="page-protocolos" class="py-5">
    <section id="secao-protocolos" class="py-5">
        <div class="container-lg">
            <div class="div row row-cols-1 gy-4">
                <div class="col">
                    <h1 class="font-3 cor-1"><?php the_title(); ?></h1>
                    <p class="text-uppercase">Signature Premium</p>
                    <p>Protocolos para a beleza da sua face.</p>
                </div>
                <?php
                for ($i = 1; $i <= 4; $i++) :
                    $class = ($i % 2 == 0) ? "dark-box" : "light-box";
                    $align = ($i % 2 == 0) ? "justify-start" : "justify-end";
                    while (have_rows('protocolo_' . $i)) : the_row(); ?>
                        <div class="col">
                            <figure class="position-relative <?= esc_attr($align); ?>">
                                <img class="img-fluid" src="<?= esc_url(get_sub_field('imagem')); ?>" alt="Imagem Ilustrativa">
                                <div class="<?= esc_attr($class); ?> rounded p-4 text-white">
                                    <?php the_sub_field('texto'); ?>
                                </div>
                            </figure>
                        </div>
                    <?php endwhile; ?>
                <?php endfor; ?>
            </div>
            <hr class="divider mt-5">
        </div>
    </section>

    <section id="secao-protocolos_2" class="py-5">
        <div class="container-lg">
            <h2 class="mb-4"><?= wp_kses_post(get_field('titulo')); ?></h2>
            <div class="row row-cols-1 row-cols-lg-2 gy-4">
                <?php while (have_rows('protocolo_5')) : the_row(); ?>
                    <div class="col">
                        <figure class="position-relative">
                            <img class="img-fluid" src="<?= esc_url(get_sub_field('imagem')); ?>" alt="Imagem Ilustrativa">
                            <div class="dark-box rounded p-4 text-white">
                                <?php the_sub_field('texto'); ?>
                            </div>
                        </figure>
                    </div>
                <?php endwhile; ?>

                <?php while (have_rows('protocolo_6')) : the_row(); ?>
                    <div class="col">
                        <figure class="position-relative">
                            <img class="img-fluid" src="<?= esc_url(get_sub_field('imagem')); ?>" alt="Imagem Ilustrativa">
                            <div class="light-box rounded p-4 text-white">
                                <?php the_sub_field('texto'); ?>
                            </div>
                        </figure>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>