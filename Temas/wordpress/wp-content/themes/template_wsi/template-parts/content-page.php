<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()): ?>
        <figure class="entry-thumbnail text-center">
            <?php echo retornar_image(wp_get_attachment_image(get_post_thumbnail_id(), "full")); ?>
        </figure>
    <?php endif; ?>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div>
</div>