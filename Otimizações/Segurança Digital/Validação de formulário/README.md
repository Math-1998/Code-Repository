# Validação de formulário

 **Descrição**  
Basta inserir o código no envio_form.php que ele irá realizar a validação dos campos dos formulários

## HTML
```

```
## CSS
```

```
## JavaScript
```

```
## PHP
```
/* Validação */

function validar_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    // Bloquear padrões suspeitos
    if (preg_match('/[\'\";]+/', $email)) {
        return false;
    }
    return true;
}

function limpar_input($input) {
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

function validar_campos_obrigatorios($dados, $campos_obrigatorios) {
    foreach ($campos_obrigatorios as $campo) {
        if (empty($dados[$campo])) {
            return false;
        }
    }
    return true;
}

$campos_obrigatorios = ['email'];

$nome_form = limpar_input($_POST["nome"]);
$email_form = limpar_input($_POST["email"]);
$celular_form = limpar_input($_POST["celular"]);
$mensagem_form = limpar_input($_POST["mensagem"]);

if (!validar_email($email_form)) {
    die("Erro: O e-mail informado é inválido.");
}
```
