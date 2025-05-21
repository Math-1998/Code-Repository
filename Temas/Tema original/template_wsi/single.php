<?php
get_header();

$posts_type = get_post_type(get_the_ID());
?>

<main id="single-posts" class="py-5">
    <section class="container-lg">
        <div class="row">
            <article class="col-lg-8 mb-4 mb-lg-0">
                <?php
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content-single');
                endwhile; 
                ?>
            </article>
            <?php $posts_type == "tratamentos" ? get_sidebar('tratamentos') : get_sidebar(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>