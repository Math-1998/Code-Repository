<?php
/*
Template Name:Page Sobre
*/

get_header();
$page = get_the_ID();
?>
<main id="page-sobre">
    <?php if ($page == 51) : ?>
        <section id="dra-flavia" class="py-5">
            <h1 class="text-center font-3 cor-1 mb-4"><?= the_title(); ?></h1>
            <div class="container-lg">
                <div class="row row-cols-1 row-cols-lg-2 gy-4">
                    <div class="col">
                        <?php the_content(); ?>
                    </div>
                    <div class="col">
                        <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid', 'alt' => esc_attr(get_the_title())]); ?>
                    </div>
                </div>
            </div>
        </section>

    <?php else : ?>
        <section id="clinica" class="py-5">
            <h1 class="text-center font-3 cor-1 mb-4"><?= the_title(); ?></h1>
            <div class="container-lg">
                <div class="row row-cols-1 row-cols-lg-2 justify-content-center px-lg-5">
                    <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <figure class="col text-center">
                            <img src="<?= esc_url(get_field('imagem_' . $i)); ?>" alt="Ilustração das Instalações">
                        </figure>
                    <?php endfor; ?>
                </div>
                <div class="row row-cols-1">
                    <div class="col">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<style>
    h2 strong {
        color: var(--color-1);
    }

    #clinica figure img {
        object-fit: fill;
        width: 100%;
        height: 100%;
        max-height: 320px;
    }

    #clinica h1 {
        background-image: url(https://flavia.wsilab.com.br/wp-content/uploads/2025/05/bg-clinica.png);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<?php get_footer(); ?>