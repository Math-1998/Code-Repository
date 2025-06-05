<?php for ($i = 1; $i <= 3; $i++) : ?>
    <?php while (have_rows('bloco_' . $i)) : the_row(); 
     $text_order  = ($i % 2 === 0) ? 'order-lg-1' : 'order-lg-2';
     $image_order = ($i % 2 === 0) ? 'order-lg-2' : 'order-lg-1'; ?>
        <div class="row row-cols-1 row-cols-lg-2 align-items-center gy-4">
            <figure class="col <?= $image_order; ?>">
                <img class="img-fluid" src="<?= esc_url(get_sub_field('imagem')); ?>" alt="Imagem Ilustrativa">
            </figure>
            <div class="col <?= $text_order; ?>">
                <div class="area-text">
                    <?= wp_kses_post(get_sub_field('texto')); ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endfor; ?>