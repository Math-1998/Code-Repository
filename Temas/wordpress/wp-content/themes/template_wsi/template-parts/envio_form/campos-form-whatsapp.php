<input type="hidden" id="url_conversao_formulario_whatsapp" name="url_conversao" value="<?php echo 'https://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
<input type="hidden" id="url_de_origem_formulario_whatsapp" class="inputCurrent" name="url_de_origem">
<input type="hidden" id="url_referrer_formulario_whatsapp" class="inputReferrer" name="url_referrer">

<div class="mb-3">
    <input type="text" class="form-control" id="nome_formulario_whatsapp" name="nome" placeholder="Nome*" required>
</div>

<div class="mb-3">
    <input type="email" class="form-control" id="email_formulario_whatsapp" name="email" placeholder="Email*" required>
</div>

<div class="mb-3">
    <input type="text" class="form-control" id="celular_formulario_whatsapp" name="celular" placeholder="Telefone*" required pattern="(\([0-9]{2}\))([0-9]{5})-([0-9]{4})">
</div>

<div class="mb-3">
    <textarea class="form-control" id="mensagem_formulario_whatsapp" rows="2" name="mensagem" placeholder="Mensagem*" required></textarea>
</div>

<div class="mb-3 form-check">
    <input class="form-check-input" type="radio" name="aceito" id="aceito_whatsapp" checked>
    <label class="form-check-label" for="aceito_whatsapp">Ao clicar em enviar os dados, você concorda com a <strong><a href="<?php echo home_url('politica-de-privacidade/') ?>" target="_blank">POLÍTICA DE PRIVACIDADE</a></strong></label>
</div>

<div>
    <input id="botao_whatsapp_mobile" name="submit" type="submit" value="Enviar Formulário">
</div>