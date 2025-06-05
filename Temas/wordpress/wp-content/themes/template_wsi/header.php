<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?= home_url() ?>/favicon.ico">
    <link rel="apple-touch-icon" href="<?= home_url() ?>/favicon.ico">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <meta name="theme-color" content="<?= esc_html(RDTheme::$options['color_1']); ?>">
    <?php wp_head(); ?>
</head> 

<body <?php body_class(); ?>>
    <header id="masthead" class="site-header">        
        <?php
        get_template_part('template-parts/header/header', 'logo');
        get_template_part('template-parts/header/header', 'principal');
        ?>
    </header>

    <div id="meanmenu"></div>

    <?php $mobile_whats = wp_is_mobile() ?>

    <a href="#" title="Fale conosco pelo WhatsApp" class="whatsapp-right" data-bs-toggle="modal" data-bs-target="#modal_whatsapp">
        <img src="<?= retornar_image(get_template_directory_uri()); ?>/icone_whatsapp_2.png" alt="Fale conosco pelo WhatsApp" width="65" height="65">
    </a>

    <div class="modal fade" id="modal_whatsapp" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" data-bs-theme="dark">
                    <p>Insira seus dados abaixo e redirecionaremos imediatamente o WhatsApp.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form_whatsapp w-form-whatsapp" id="<?= $mobile_whats ? 'Form_WhatsAppmobile' :  'Form_WhatsAppDesktop'; ?>" action="<?= get_template_directory_uri(); ?>/template-parts/envio_form/form.php" method="post">
                        <input type="hidden" name="tipo_form" value="<?= $mobile_whats ? 'formulario_whatsapp_mobile' :  'formulario_whatsapp_desktop'; ?>">
                        <?php get_template_part('template-parts/envio_form/campos', 'form-whatsapp'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>