<?php get_header(); ?>

<main id="page-search" class="py-5">
    <div class="container-lg">
        <div class="row">
            <article class="col-lg-8 mb-4 mb-lg-0">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'search');
                    endwhile;
                    RDTheme_Helper::pagination();
                else:
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </article>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>