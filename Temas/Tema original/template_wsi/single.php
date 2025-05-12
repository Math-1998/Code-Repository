<?php
get_header();

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
            
        </div>
    </section>
</main>

<?php get_footer(); ?>