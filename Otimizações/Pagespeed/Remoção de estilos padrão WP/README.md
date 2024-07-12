# Template Otimização

 **Descrição**  
Esse código deve ser inserido no functions.php e remove os estilos padrão que o Wordpress traz, ajudando a reduzir o tamanho do código.

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
function remove_head_scripts() {
remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
```
