<?php
$data_meta     = apply_filters('rdtheme_single_time_no_thumb', get_the_time('d/m/Y'));
$imagem = get_post_thumbnail_id();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-header">
        <div class="entry-thumbnail-area">
            <?php if (has_post_thumbnail()): ?>
                <figure class="entry-thumbnail">
                    <?php echo retornar_image(wp_get_attachment_image($imagem, "full")); ?>
                </figure>
            <?php endif; ?>
            <ul class="entry-meta my-lg-4">
                <li>
                    <a href="<?= home_url('equipe/dr-bruno-bedoschi/');?>"><i class="fa fa-user"></i> <?php _e('<span>Por: </span>', 'seoengine') . the_author(); ?></a>
                </li>
                <li>
                    <i class="fa fa-calendar"></i> <?php echo wp_kses_post($data_meta); ?>
                </li>
                <li>
                    <i class="fa fa-clock-o me-2"></i><?php echo do_shortcode('[reading_filter]'); ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div>
</div>