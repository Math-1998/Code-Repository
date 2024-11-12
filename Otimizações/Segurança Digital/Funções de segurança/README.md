# Template Otimização

 **Descrição**  
O Wordpress disponibiliza algumas funções de segurança que devem ser implementadas a fim de evitar injeções de SQL, invasões e etc.
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
esc_html() - Escapa texto puro para evitar a injeção de HTML. Usado para exibir conteúdo que não deve conter HTML.

esc_url() - Escapa URLs para evitar injeção de URL maliciosa. Ideal para links e redirecionamentos seguros.

esc_attr() - Escapa valores usados em atributos HTML, como classes e IDs, evitando problemas de injeção.

esc_textarea() - Escapa texto em campos de textarea para prevenir a injeção de código e manter o formato seguro.

wp_kses() - Permite apenas tags HTML específicas em uma string. Útil para limitar HTML seguro em conteúdos controlados.

wp_kses_post() - Versão simplificada de wp_kses() que permite apenas as tags HTML padrão de posts do WordPress.

wp_kses_data() - Parecido com wp_kses_post(), mas restringe ainda mais as tags permitidas para garantir segurança máxima.

sanitize_text_field() - Remove tags HTML e codifica caracteres especiais. Usado para salvar textos em campos de formulário.

sanitize_email() - Valida e formata um e-mail de forma segura, removendo caracteres inválidos.

sanitize_url() - Valida e sanitiza URLs, ideal para entradas de URLs em formulários ou configurações.

sanitize_file_name() - Sanitiza nomes de arquivos para evitar problemas com caracteres indesejados, como espaços e símbolos.

esc_js() - Escapa texto para uso em JavaScript, evitando injeções de script.
```
