<section class="no-results not-found">
    <h2 class="page-title"><?php esc_html_e('Nada encontrado', 'seoengine'); ?></h2>
    <div class="page-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php printf(wp_kses(__('Pronto para publicar seu primeiro post? <a href="%1$s">Comece aqui</a>', 'seoengine'), array('a' => array('href' => array()))), esc_url(admin_url('post-new.php'))); ?></p>
        <?php elseif (is_search()) : ?>
            <p><?php _e('Desculpe, mas nada corresponde aos seus termos de pesquisa. Por favor, tente novamente com algumas palavras-chave diferentes.', 'seoengine'); ?></p>
        <?php else : ?>
            <p><?php _e("Parece que não conseguimos encontrar o que você está procurando. Talvez pesquisar possa ajudar.", 'seoengine'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->