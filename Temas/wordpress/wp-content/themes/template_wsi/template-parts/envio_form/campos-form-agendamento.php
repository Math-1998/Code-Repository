<input type="hidden" id="url_conversao_formulario" name="url_conversao" value="<?= 'https://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
<input type="hidden" id="url_de_origem_formulario" class="inputCurrent" name="url_de_origem">
<input type="hidden" id="url_referrer_formulario" class="inputReferrer" name="url_referrer">
<input type="hidden" name="tipo_form" value="formulario_agendamento">

<div class="row row-cols-1 row-cols-lg-2">
    <div class="col">
        <div class="mb-3 campo-icon">
            <i class="fa fa-user-o"></i>
            <input class="form-control" type="text" id="nome_formulario" name="nome" placeholder="Nome*" required>
        </div>

        <div class="mb-3 campo-icon">
            <i class="fa fa-phone"></i>
            <input class="form-control" type="text" id="celular_formulario" name="celular" pattern="(\(\d{2}\))(\d{5})-(\d{4})" placeholder="(00)00000-0000" required>
        </div>

        <div class="mb-3 campo-icon">
            <i class="fa fa-envelope-o"></i>
            <input class="form-control" type="email" id="email_formulario" name="email" placeholder="E-mail*" required>
        </div>
    </div>

    <div class="col mb-3 campo-icon campo-icon-posi">
        <i class="fa fa-commenting-o"></i>
        <textarea rows="8" class="form-control" id="mensagem_formulario" name="mensagem" placeholder="Mensagem*" required></textarea>
    </div>
</div>

<div class="mb-3">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="aceito" id="aceito" checked>
        <label class="form-check-label" for="aceito">Ao clicar em "Enviar", você concorda com a <b><a href="<?= esc_url(home_url("politica-de-privacidade/")) ?>" target="_blank">POLÍTICA DE PRIVACIDADE</a></b></label>
    </div>
</div>

<div>
    <input id="botao_contato" class="mt-3" name="submit" type="submit" value="Enviar">
</div>