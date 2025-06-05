<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Erro: Método inválido.");
}
if (!empty($_POST['site_url'])) {
    die("Erro: tentativa de spam detectada.");
}

$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once($parse_uri[0] . 'wp-load.php');

$whatsapp = retornar_Numero(RDTheme::$options['whatsapp']);
// ---------------------Envio de Email------------------------------------------ //

$campos_formulario = array(
    "nome" => "Nome:",
    "email" => "Email:",
    "celular" => "Celular:",
    "mensagem" => "Mensagem:",
    "url_conversao" => "Url da conversão:"
);

function convertHtml($postVar)
{
    return htmlspecialchars(trim($postVar), ENT_QUOTES, 'UTF-8');
}

function printHtml($campos_formulario)
{
    $output = "";

    foreach ($campos_formulario as $key => $title) {
        if (isset($_POST[$key]) && !empty($_POST[$key])) {
            $value = convertHtml($_POST[$key]);
            $output .= "
            <div style='border-bottom: 1px solid #d7d7d7;margin-bottom: 3rem;'>
                <p style='font-weight: bold;'>{$title}</p>
                <p>{$value}</p>
            </div>
            ";
        }
    }

    return $output;
}

$Body = "
<div style='position:relative;margin:1rem auto;border-radius:.5rem;border:1px solid #bbb;overflow:hidden;'>
    <div style='padding: 1rem;font-size:1.2em;color:#fff;box-sizing:border-box;background:#034c67;background-repeat: no-repeat;background-size: cover;background-position: bottom center;'>
        <h2 style='text-transform: uppercase;text-align:center;color: #fff;font-weight: bold;'>
            Olá, Você tem um novo lead!
        </h2>
    </div>
    <div style='padding: 1rem 3rem;font-size:1.4em;'>
        " . printHtml($campos_formulario) . "
    </div>
</div> 
";

// ---------------------Integração com o Traction------------------------------- //

$tipo_form = $_POST["tipo_form"];

if ($tipo_form == "formulario_agendamento") {
    $url_traction = "https://app.pipelead.to/webhook/lead/74ZzFHvcon";
    $url_page_obrigado = home_url('/obrigado-pelo-contato');
    $subject = "Formulário: Contato";
}

if ($tipo_form == "formulario_whatsapp_mobile" || $tipo_form == "formulario_whatsapp_desktop") {
    $url_traction = "https://app.pipelead.to/webhook/lead/X5VbuM6glJ";
    $subject = "Formulario: WhatsApp";
}

if ($tipo_form == "formulario_whatsapp_mobile" || $tipo_form == "formulario_whatsapp_desktop" || $tipo_form == "formulario_contato") {
    $paramentro_pipe = array(
        'headers' => array('Content-Type' => 'application/json'),
        'body' => json_encode(array(
            'name' => $_POST["nome"],
            'email' => $_POST["email"],
            'phone' => $_POST["celular"],
            'mensagem' => $_POST["mensagem"],
            'conversao' => $_POST["url_conversao"],
            'current_uri' => $_POST["url_de_origem"],
            'referrer_uri' => $_POST["url_referrer"]
        )),
    );
}

if ($tipo_form == "formulario_whatsapp_mobile") {
    $url_page_obrigado = 'https://wa.me/55' . $whatsapp . '?text=' . $_POST["mensagem"] . '';
}

if ($tipo_form == "formulario_whatsapp_desktop") {
    $url_page_obrigado = 'https://web.whatsapp.com/send?phone=55' . $whatsapp . '&text=' . $_POST["mensagem"] . '';
}

// --------------------- Integração Pipelead ------------------------------- //

wp_remote_post($url_traction, $paramentro_pipe);

// --------------------- Integração com n8n E-mail ------------------------------- //

wp_remote_post('https://webhook.sebavieira.com.br/webhook/2266c71a-bbd4-4267-a81a-1cf7b5bcf49a', array(
    'headers' => array('Content-Type' => 'application/json'),
    'body' => json_encode(array(
        'name' => $_POST["nome"],
        'email' => RDTheme::$options['email'],
        'copia' => RDTheme::$options['copia_email'],
        'body_email' => $Body,
        'email_reply_to' => $_POST["email"],
        'assunto' => $subject
    )),
));

header("Location: $url_page_obrigado");

die();
