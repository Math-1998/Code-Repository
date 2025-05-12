<?php
get_header();

$menu_internas = get_field('menu_internas') ? get_field('menu_internas')['value'] : 'tratamentos';
?>

<main class="py-5">
    <section class="pb-5">
        <div class="container-lg">
            <div class="row">
                <article class="col">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', 'page'); ?>
                    <?php endwhile; ?>
                </article>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>