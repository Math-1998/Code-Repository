# Shortcode para vídeos com ACF

 **Descrição**  
Shortcode de vídeo com ajuste de código para puxar as informações dos campos personalizados assim quando precisar subir um vídeo não precisa ser aberto uma nova tarefa, pessoal de SEO já consegue subir, além de reduzir bastante código.

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
function modal_youtube_video($attr, $content){
    if(have_rows('internas_videos')):
        while (have_rows('internas_videos')) : the_row();
        $output = '
        <span style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#modal_youtube_internas" title="Baixe agora mesmo!"><img loading="lazy" src="'.retornar_image(get_sub_field('thumbnail')).'" width="" height="" alt="Conheça a Clínica" class="image-center"><p class="text-center">clique aqui para assistir</p></span>
        
        <div class="modal fade" id="modal_youtube_internas" tabindex="-1" aria-labelledby="modal_galeria_Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content" style="background: transparent">
                    <div class="modal-header" style="border-bottom:0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding:0px">
                        <p class="text-align-center">
                            '.get_sub_field('url_video').'                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
        ';
        endwhile;
    endif;
    
    return $output;
}

add_shortcode('modal_youtube_video', 'modal_youtube_video');
```
