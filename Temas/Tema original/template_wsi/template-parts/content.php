<?php
$thumb_size = 'rdtheme-size1';
$rdtheme_time_html_2     = apply_filters('rdtheme_single_time_no_thumb', get_the_time('d/m/Y'));
?>
<div class="col-sm-12">
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-each'); ?>>
        <div class="entry-header">
            <?php if (has_post_thumbnail()): ?>
                <a class="entry-thumbnail-area" href="<?php the_permalink(); ?>">
                    <div class="entry-thumbnail-single"><?php the_post_thumbnail($thumb_size); ?></div>
                </a>
            <?php endif; ?>
            <div class="date">
                <i class="fa fa-calendar fa-2x" aria-hidden="true"></i> <?php echo wp_kses_post($rdtheme_time_html_2); ?>
                <a href="<?= home_url('equipe/dr-bruno-bedoschi/');?>">
                    <i class="fa fa-user-circle-o fa-2x" aria-hidden="true" style="padding-left: 20px;">

                    </i> <?php the_author(); ?></a>
            </div>
            <div class="entry-title">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
        </div>
        <div class="entry-content">
            <?php the_excerpt(); ?>
            <p class="button-1-blog"><a href="<?php the_permalink(); ?>">Leia mais <i class="fa fa-arrow-right" aria-hidden="true"></i></a></p>
        </div>
    </article>
</div>