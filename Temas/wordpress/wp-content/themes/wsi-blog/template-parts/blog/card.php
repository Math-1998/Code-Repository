<?php
if (!defined('ABSPATH')) {
    exit;
}
$author_avatar = get_avatar(get_the_author_meta('ID'), 96, '', '', ['class' => 'size-10 rounded-full bg-gray-50']);
$date = esc_html(get_the_date('d \d\e F, Y'));
$category = get_the_category();
$author_nickname = esc_html(get_the_author_meta('nickname'));
?>

<div class="flex max-w-xl flex-col items-start justify-between">
    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="2020-03-16" class="text-gray-500"><?= $date ?></time>
        <a title="<?= $category[0]->name ?>" href="<?php the_permalink(); ?>" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"><?= $category[0]->name ?></a>
    </div>
    <div class="group relative">
        <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                <span class="absolute inset-0"></span>
                <?php the_title(); ?>
            </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">
            <?php the_content(); ?>
        </p>
    </div>
    <div class="relative mt-8 flex items-center gap-x-4">
        <?= $author_avatar ?>
        <div class="text-sm/6">
            <p class="font-semibold text-gray-900">
                <span class="absolute inset-0"></span>
                <?php the_author(); ?>
            </p>
            <p class="text-gray-600"><?= $author_nickname ?></p>
        </div>
    </div>
</div>