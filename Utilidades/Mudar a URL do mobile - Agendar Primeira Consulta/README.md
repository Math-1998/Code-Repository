# Template Utilidades

 **Descrição**  
Código que utilizamos no scripts.php (inc/scripts.php) para evitar que o usuário saia da página de agendar primeira consulta no mobile.

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
<?php
if(get_page_template_slug() == "page-agendar-consulta.php"){
    $url_mobile = home_url('agendar-primeira-consulta/');
}else{
    $url_mobile = home_url('/');
}

$rdtheme_localize_data = array(
    'siteLogo'   => '<a href="' . esc_url( $url_mobile ) . '" title="' . esc_attr( get_bloginfo( 'title' ) ) . '"><img class="logo-small" src="'.retornar_image(esc_url( $rdtheme_dark_logo )).'" width="190" height="56" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '"/>',
);
wp_localize_script( 'seoengine-main', 'SEOEngineObj', $rdtheme_localize_data );
?>
```
