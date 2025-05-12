<?php
wp_footer();
$redes_sociais = RDTheme_Helper::socials();
?>

<footer id="footer" class="py-5">
    <div class="container-lg">
        <div class="row row-cols-1 row-cols-lg-2">
            <div class="col">
                <p><strong>© <?= date('Y'); ?></strong> Todos os Direitos Reservados: <?= bloginfo('name'); ?>. Desenvolvido e Gerenciado por <a title="Agência de Marketing Médico WSI" target="_blank" href="https://medico.wsidm.com.br/">Agência de Marketing Médico WSI</a></p>
            </div>
            <div class="col">
                <div class="box-social">
                    <p class="text-center">SIGA-NOS</p>
                    <ul>
                        <?php foreach ($redes_sociais as $key => $sociais_item) : ?>
                            <?php if (!empty($sociais_item['url']) && $sociais_item['url'] !== '#') : ?>
                                <li>
                                    <a title="<?php echo esc_attr($sociais_item['title']); ?>" target="_blank" rel="noreferrer" href="<?php echo esc_url($sociais_item['url']); ?>">
                                        <i title="<?php echo esc_attr($sociais_item['title']); ?>" class="<?php echo esc_attr($sociais_item['icon']); ?>"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</footer>

</body>

</html>