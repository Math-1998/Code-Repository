<?php
/*
Template Name:Page Tratamentos
*/
$style_page = "style-pages.css";

add_filter('wp_enqueue_page_style', function () use ($style_page) {
    return $style_page;
});

get_header(); ?>
<main id="page-tratamentos" class="py-5">
    <section class="container-lg">
        <h1 class="text-center position-relative"><?= the_title(); ?></h1>
        <p class="text-center">Oferecemos tratamentos exclusivos: Faciais e corporais, capilares, tecnologias, protocolos exclusivos e dermatologia cirúrgica</p>

        <div class="row row-cols-1 row-cols-lg-3 gy-4 align-items-center my-4">
            <?php
            $query = new WP_Query([
                'post_type'      => 'page',
                'post_parent'    => get_the_ID(),
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
                'posts_per_page' => -1
            ]);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <figure class="col text-center">
                        <a href="<?= esc_url(get_permalink()); ?>" title="<?= esc_attr(get_the_title()); ?>">
                            <?php the_post_thumbnail('medium', [
                                'class' => 'img-fluid',
                                'alt'   => esc_attr(get_the_title())
                            ]); ?>
                        </a>
                    </figure>
            <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </div>

        <h2 class="text-center">Conheça também <br><strong>nossas Tecnologias</strong></h2>

        <div class="button-1 text-center">
            <a href="<?= home_url('/tecnologias/'); ?>" title="<?= esc_attr(get_the_title()); ?>">Tecnologias</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>