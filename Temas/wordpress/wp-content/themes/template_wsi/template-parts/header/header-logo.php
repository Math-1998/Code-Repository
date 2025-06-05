<?php
$logo_black = empty(RDTheme::$options['logo']['url']) ? RDTHEME_IMG_URL . 'logo-dark.png' : RDTheme::$options['logo']['url'];
$logo_width = 150;
$logo_height = 92;

?>

<div class="menu-top py-3">
    <div class="container-lg">
        <div class="row align-items-center">
            <div class="col-12">
                <a class="site-branding" href="<?= esc_url(home_url()); ?>" title="<?php esc_attr(bloginfo('name')); ?>">
                    <img class="img-white img-fluid" src="<?= esc_url(retornar_image($logo_black)); ?>" alt="<?php esc_attr(bloginfo('name')); ?>" width="<?= esc_attr($logo_width) ?>" height="<?= esc_attr($logo_height) ?>">
                </a>
            </div>
        </div>
    </div>
</div>