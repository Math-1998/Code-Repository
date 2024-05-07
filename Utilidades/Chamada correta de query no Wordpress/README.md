# Template Utilidades

 **Descrição**  
Essa é a forma mais correta de encontramos de chamar o query e evitar que o código fique quebrado.

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
$query = new WP_Query(
    array(
        'post_type' => 'page',
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-home.php'
    )
);

if ($query->have_posts()) :
    while ($query->have_posts()) :    $query->the_post(); 
?>

<!-- HTML -->

<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
```
