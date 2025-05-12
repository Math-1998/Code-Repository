<?php
$style_page = "style-home.css";

add_filter('wp_enqueue_page_style', function () use ($style_page) {
    return $style_page;
});

get_header(); ?>

<main id="page-home">
    <?php while (have_rows('banner')) : the_row();
        $img_banner = wp_is_mobile() ? esc_url(get_sub_field('imagem_mobile')) : esc_url(get_sub_field('imagem_desktop'));
    ?>
        <section id="banner" style="background-image: url('<?= $img_banner; ?>');">

        </section>
    <?php endwhile; ?>

    <?php while (have_rows('sobre')) : the_row(); ?>
        <section id="sobre" class="py-5">
            <div class="container-lg">
                    <div class="row row-cols-1 row-cols-lg-2 align-items-center gy-4">
                        <div class="col">
                        
                            <?php the_content(); ?>

                            <div class="button-white text-center text-lg-start">
                                <a href="<?= esc_url(get_sub_field('link')); ?>" title="<?= esc_attr(get_sub_field('titulo_link')); ?>"><?= esc_html(get_sub_field('titulo_link')); ?></a>
                            </div>

                        </div>
                        <div class="col text-center">
                            <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>

    <?php while (have_rows('servicos')) : the_row(); ?>
        <section id="servicos" class="py-5">
            <div class="container-lg">
                <div class="row row-cols-1 row-cols-lg-2 gy-4 align-items-center">
                    <div class="col col-lg-5 text-center">
                        <?= wp_get_attachment_image(56, 'medium', true, ['class' => 'img-fluid', 'title' => 'Icon']); ?>
                    </div>
                    <div class="col col-lg-7 text-center text-lg-start">
                        <div class="fs-4">
                            <?= wp_kses_post(get_sub_field('texto')); ?>
                        </div>
                        <?php
                        $args = new WP_Query([
                            'post_type' => 'page',
                            'post__in' => [61, 59, 57],
                            'orderby' => 'menu_order',
                            'order' => 'ASC'
                        ]);
                        ?>
                        <div class="d-flex flex-column flex-lg-row gap-4">
                            <?php if ($args->have_posts()) : while ($args->have_posts()) : $args->the_post(); ?>
                                    <p class="box-servicos"><?php the_title(); ?></p>
                            <?php
                                    wp_reset_postdata();
                                endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>

    <?php while (have_rows('cta_1')) : the_row(); ?>
        <section id="cta-1" class="py-5">
            <div class="container-lg">
                <div class="row row-cols-1 row-cols-lg-2 align-items-center gy-4">
                    <div class="col col-lg-7 text-center ">
                        <h2 class="text-white fs-3"><?= wp_kses_post(get_sub_field('titulo')); ?></h2>
                    </div>
                    <div class="col col-lg-5">
                        <p class="text-white fs-5"><?= wp_kses_post(get_sub_field('texto')); ?></p>
                        <div class="button-white text-center text-lg-start">
                            <a href="<?= esc_url(get_sub_field('link')); ?>" title="<?= esc_attr(get_sub_field('titulo_link')); ?>"><?= esc_html(get_sub_field('titulo_link')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>

    <?php while (have_rows('corpo_clinico')) : the_row(); ?>
        <section id="corpo-clinico" class="py-5">
            <div class="container-lg">
                <hr class="divider">
                <h2 class="text-center"><?= wp_kses_post(get_sub_field('titulo')); ?></h2>
                <p class="text-center mb-5"><?= wp_kses_post(get_sub_field('texto')); ?></p>
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col text-center">
                            <?= wp_get_attachment_image(get_sub_field('imagem_1'), 'medium', false, ['class' => 'img-fluid', 'alt' => '']); ?>
                        <?php the_sub_field('texto_1'); ?>
                    </div>
                    <div class="col text-center">
                        <?= wp_get_attachment_image(get_sub_field('imagem_2'), 'medium', false, ['class' => 'img-fluid', 'alt' => '']); ?>
                        <?php the_sub_field('texto_2'); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>

    <?php while (have_rows('clinica')) : the_row(); ?>
        <section id="clinica" class="py-5">
            <div class="container-lg">
                <h2 class="text-white"><?= wp_kses_post(get_sub_field('titulo')); ?></h2>
                <div class="row row-cols-1 row-cols-lg-2 justify-content-center px-lg-5">
                    <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <figure class="col text-center">
                            <img src="<?= esc_url(get_sub_field('imagem_' . $i)); ?>" alt="Ilustração das Instalações">
                        </figure>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>