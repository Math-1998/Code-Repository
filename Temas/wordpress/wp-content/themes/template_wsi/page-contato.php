<?php
/*
Template Name:Page Contato
*/
get_header(); ?>

<main id="page-contato" class="py-5">
    <section class="container-lg pb-5">
        <h1>Fale com <br><span class="font-3 color-1">a gente!</span></h1>

        <div class="box-forms">
            <form class="form_contato wp-form-contato" action="<?= get_template_directory_uri(); ?>/template-parts/envio_form/form.php" method="post">
                <?php get_template_part('template-parts/envio_form/campos', 'form-agendamento'); ?>
            </form>
        </div>
    </section>

    <section id="cta" class="py-5">
        <div class="container-lg">
            <h2 class="text-center text-white fs-3">Mande uma mensagem para nosso <strong>WhatsApp</strong></h2>

            <div class="button-white text-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal_whatsapp" title="CTA Whatsapp">Whatsapp</a>
            </div>
        </div>
    </section>

    <section class="pt-5">
        <?php 
        $localizacao = Redux::getOption($opt_name, 'localizacao');
        echo $localizacao; ?>
    </section>
</main>
<style>
    #cta {background-color: var(--color-2);}
    span {color: var(--color-1);}
    iframe {width: 100%;}
</style>
<?php get_footer(); ?>