# Carrossel Automático

 **Descrição**  
Carrossel automático com ACF. O trecho a seguir dispensa a criação de vários carousel-item, fazendo isso através de um loop.

## HTML
```
<section id="Carousel-Home" class="carousel slide box-banner pb-5" data-bs-ride="carousel">
	<ol class="carousel-indicators">
		<?php
		$cHI = 0;
		while ($cHI < 3):?>
			<li data-bs-target="#Carousel-Home" class="<?php if ($cHI == 0) echo 'active'; ?>" data-bs-slide-to="<?php echo $cHI++; ?>"></li>
			<?php
		endwhile; ?>
	</ol>
	<div class="carousel-inner">
		<?php
		$cH = 1;
		while ($cH <= 3) :
			while (have_rows('banner_' . $cH)) : the_row(); ?>
				<div class="carousel-item banner-style <?php if ($cH == 1) echo 'active'; ?>" <?php if ($cH == 1) echo 'data-no-lazy="1"'; ?> style="background-image:url(<?php echo retornar_image(get_sub_field('imagem_desktop')); ?>);">
					<div class="box">
						<h2><?php echo get_sub_field('titulo'); ?></h2>
						<p><?php echo get_sub_field('texto'); ?></p>
						<?php if (get_sub_field('link') != null) : ?>
							<p class="botao-white mt-4"><a href="<?php echo get_sub_field('link'); ?>" title="<?php echo get_sub_field('titulo_link'); ?>"><?php echo get_sub_field('titulo_link'); ?></a></p>
						<?php endif; ?>
					</div>
				</div>
				<?php
			endwhile;
			$cH++;
		endwhile
		?>
	</div>

	<a class="carousel-control-prev" href="#Carousel-Home" aria-label="Botão com indicação para a esquerda" data-bs-slide="prev">
		<i class="fa fa-2x fa-angle-left" aria-hidden="true"></i>
	</a>
	<a class="carousel-control-next" href="#Carousel-Home" aria-label="Botão com indicação para a direita" data-bs-slide="next">
		<i class="fa fa-2x fa-angle-right" aria-hidden="true"></i>
	</a>
</section>
```
## CSS
```

```
## JavaScript
```

```
## PHP
```

```

