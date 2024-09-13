# Template Utilidades

 **Descrição**  
O código abaixo estipula o tempo de leitura de um texto dentro de um post. 

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
// Exibe o tempo de leitura da página
function tt_reading_time()
{
	$content = get_post_field('post_content');
	$word_count = str_word_count(strip_tags($content));
	$min = floor($word_count / 200); // tempo médio de leitura: 200 palavras
	$tempo = 'min. de leitura';
	if ($min <= 1) {
		$tempo = '1 ' . $tempo;
	} else {
		$tempo = $min . ' ' . $tempo;
	}
	return $tempo;
}

function tt_reading_time_filter($content)
{
	$custom_content = '<span id="tt-temp-estim">' . tt_reading_time() . '</span>';
	//$custom_content .= $content;
	return $custom_content;
}
add_shortcode('reading_filter', 'tt_reading_time_filter');



<?php echo do_shortcode('[reading_filter]'); ?>
```
