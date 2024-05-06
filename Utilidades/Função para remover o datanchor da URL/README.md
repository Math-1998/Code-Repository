# Template Animação

 **Descrição**  
Essa função encurta a URL para que quando o usuário clique nos links do menu a url não mostre a seção. A segunda parte do código  é opcional.

## HTML
```

```
## CSS
```

```
## JavaScript
```
<script>
	$(document).ready(function() {
		$('[data-anchor]').click(function(event) {
			event.preventDefault();
			var target = $(this.hash).offset().top;
			$('html,body').animate({
				scrollTop: target
			});
		});		
	});
</script>
```
## PHP
```

```
