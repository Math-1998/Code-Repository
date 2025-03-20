# Função que gera scheme automático

 **Descrição**  
Esse código irá gerar automáticamente um schema, basta incluí-lo no functions.php

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
function gerar_breadcrumb_json_ld() {
    if (is_front_page()) return;

    $breadcrumb = array();
    $breadcrumb[] = array(
        "@type" => "ListItem",
        "position" => 1,
        "name" => "Home",
        "item" => home_url()
    );

    if (is_single()) {
        $categories = get_the_category();
        if (!empty($categories)) {
            $category = $categories[0]; 
            $breadcrumb[] = array(
                "@type" => "ListItem",
                "position" => 2,
                "name" => $category->name,
                "item" => get_category_link($category->term_id)
            );
        }
        $breadcrumb[] = array(
            "@type" => "ListItem",
            "position" => 3,
            "name" => get_the_title(),
            "item" => get_permalink()
        );
    } elseif (is_category()) {
        $category = get_queried_object();
        $breadcrumb[] = array(
            "@type" => "ListItem",
            "position" => 2,
            "name" => $category->name,
            "item" => get_category_link($category->term_id)
        );
    } elseif (is_page()) {
        global $post;
        if ($post->post_parent) {
            $parent = get_post($post->post_parent);
            $breadcrumb[] = array(
                "@type" => "ListItem",
                "position" => 2,
                "name" => get_the_title($parent),
                "item" => get_permalink($parent)
            );
        }
        $breadcrumb[] = array(
            "@type" => "ListItem",
            "position" => 3,
            "name" => get_the_title(),
            "item" => get_permalink()
        );
    }

    $json_ld = array(
        "@context" => "https://schema.org/",
        "@type" => "BreadcrumbList",
        "itemListElement" => $breadcrumb
    );

    echo '<script type="application/ld+json">' . json_encode($json_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}

add_action('wp_head', 'gerar_breadcrumb_json_ld');
```
