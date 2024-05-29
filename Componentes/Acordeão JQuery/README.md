# Carrossel Automático

 **Descrição**  
Código para acordeão feito em JQuery, código menor e animação suave.
## HTML
```
<h3 class="accordion-sanfona">Exemplo de Título</h3>
<div class="panel-sanfona">
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lacinia vel urna ac gravida. Nullam arcu ante, eleifend non nisl in, dictum euismod nunc. Sed id laoreet nulla. Aliquam ac lacus id nibh malesuada interdum pharetra at dolor. Quisque eget egestas ex. Integer placerat ex non eros dignissim dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vitae nisl ut risus facilisis eleifend. Aenean posuere rhoncus lorem, non imperdiet elit interdum id. Quisque venenatis eleifend nunc, sit amet semper turpis tempor ut. </p>
</div>
```
## CSS
```
	.accordion-sanfona{position:relative;cursor:pointer;outline:none;transition:0.4s;color: var(--color-primary);font-size:20px;padding:5px 50px 5px 30px;border-radius: 10px;font-family: var(--font-style-1); margin: 0}
	.panel-sanfona{padding:1rem 2rem 2rem;display:none;}
	.accordion-sanfona.active-sanfona{background-color: transparent;color: var(--color-primary);}
	.accordion-sanfona.active-sanfona:after{content:"\f068";}
	.accordion-sanfona:after{content:"\f067";font-family:'FontAwesome';position:absolute;top: 50%;right:3%;transform: translateY(-50%);font-size: 25px;}
```
## JavaScript
```
<script>
    $(document).ready(function() {
        $(".accordion-sanfona").click(function() {
            $(".accordion-sanfona").not(this).removeClass("active-sanfona").next(".panel-sanfona").slideUp();

            $(this).toggleClass("active-sanfona");
            $(this).next(".panel-sanfona").slideToggle();
        });
    });
</script>
```
## PHP
```

```

