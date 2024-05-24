# Mouseover 1

 **Descrição**  
Caixa com um titulo à esquerda e um botão de saiba mais à direita, ambos posicionados no rodapé. Ao passar o mouse por cima da caixa o conteúdo irá subir junto de um botão saiba mais.

## HTML
```
<div class="row row-cols-lg-1 row-cols-xl-4 area-facial">
    <?php while ($query_facial->have_posts()) : $query_facial->the_post(); ?>
    <div class="col mb-4">
        <div class="box"
            style="background-image: url(<?php echo retornar_image(get_the_post_thumbnail_url()); ?>), var(--filtro-image);">
            <div class="box-titulo">
                <div class="box-content">
                    <h3 class="title_line title_line-white">
                        <?php echo get_field('titulo_listagem') ? get_field('titulo_listagem') : get_the_title(); ?>
                    </h3>
                    <span class="icon-style"><i class="fa fa-plus"></i></span>
                </div>
            </div>
            <div class="box-lista">
                <?php the_field('texto_listagem'); ?>
                <?php if (get_post_status() == 'publish') : ?>
                <p class="botao-primary"><a title="Saiba Mais" href="<?php the_permalink(); ?>">Saiba Mais</a></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile;
    wp_reset_query(); ?>
</div>
```
## CSS
```
.area-facial .box{cursor: pointer;position: relative;overflow: hidden;height: 55vh;border-radius: 30px;background-blend-mode:multiply;background-size: cover;background-position: center;background-repeat: no-repeat;transition: all .6s ease-in-out;}
.area-facial .box > div{position: absolute;width: 100%;height: 100%;padding: 2rem;transition: all .6s ease-in-out;display: flex;flex-direction: column;}
.area-facial .box > div *{color: #fff;font-size: 15px;}
.area-facial .box > div h3{font-size: 22px;font-weight: 600;font-family: var(--font-family-primary);}
.area-facial .box .box-titulo{justify-content: end;visibility: visible;opacity: 1;}
.area-facial .box .box-titulo p{margin: 0;font-size: 25px;}
.area-facial .box .box-titulo .icon-style i{border: 1px solid;padding: 8px 9px;border-radius: 100%;font-size: 22px;}
.area-facial .box .box-titulo .box-content{display: flex;justify-content: space-between;}
.area-facial .box .box-lista{justify-content: center;visibility: hidden;opacity: 0;transform: translateY(100%);}	
.area-facial .box:hover{background-color: #3B3B3B;}
.area-facial .box:hover .box-titulo{visibility: hidden;opacity: 0;transform: translateY(-100%);}
.area-facial .box:hover .box-lista{transform: none;visibility: visible;opacity: 1;}
```
## JavaScript
```

```
## PHP

```

```
## Gif 

![Animação](https://s12.gifyu.com/images/Sf07h.gif)

