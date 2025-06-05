<div class="row row-cols-1 row-cols-lg-3 gy-4 mb-5">
<?php for ($i = 1; $i <= 3; $i++) : ?>
    <?php while (have_rows('bloco_' . $i)) : the_row(); ?>
        <div class="col py-5">
            <div class="card-estetica h-100">
                <figure class="card-top">
                    <img class="img-fluid" src="<?= esc_url(get_sub_field('imagem')); ?>" alt="Imagem Ilustrativa">
                </figure>
                <div class="card-text">
                    <?= wp_kses_post(get_sub_field('texto')); ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endfor; ?>
</div>