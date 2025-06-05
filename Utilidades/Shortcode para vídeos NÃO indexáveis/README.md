# Shortcode para vídeos com ACF

 **Descrição**  
Esse shortcode é pensado na inserção de vídeos NÃO indexáveis e voltado para performance. O usuário precisa da url do vídeo e a url da thumbnail para inserir no shortcode.

**IMPORTANTE:** Cuidado para não inserir a url e no editor de blocos ele realizar a inclusão de um link, tenha a certeza de que o shortcode está recebendo um texto.A thumbnail precisa estar hospedada no wordpress do site

**IMPORTANTE:** O shortcode depende de um código JS, insira ambos no tema.

**EXEMPLO DE USO**
[no_index_video src="https://www.youtube.com/watch?v=4pB2IhK_zWo" img="http://theme.wsilab.com.br/wp-content/uploads/2025/05/Mask-group-1.png"]

## HTML
```

```
## CSS
```

```
## JavaScript
```
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.no-index-video-trigger').forEach(function (picture) {
        picture.addEventListener('click', function () {
            const targetId = picture.getAttribute('data-video-id');
            const container = document.getElementById(targetId);

            if (container) {
                const videoUrl = container.getAttribute('data-src');
                const iframe = document.createElement('iframe');

                const attributes = {
                    src: videoUrl,
                    width: '1200',
                    height: '450',
                    frameborder: '0',
                    allowfullscreen: '',
                    allow: 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
                };

                for (let attr in attributes) {
                    iframe.setAttribute(attr, attributes[attr]);
                }

                const styles = {
                    opacity: '0',
                    transition: 'opacity 0.5s ease',
                    width: '100%',
                    height: '380'
                };

                for (let prop in styles) {
                    iframe.style[prop] = styles[prop];
                }

                container.classList.remove('d-none');
                container.appendChild(iframe);

                requestAnimationFrame(() => {
                    iframe.style.opacity = '1';
                });
          
                picture.remove();
            }
        });
    });
});
```
## PHP
```
function no_index_video($atts)
{
    static $counter = 0;
    $counter++;

    $atts = shortcode_atts(
        array(
            'src' => '',
            'img' => '',
        ),
        $atts
    );

    $convert_to_embed_url = function ($url) {
        if (preg_match('/youtube\.com\/watch\?v=([^\&\?]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }
        if (preg_match('/youtu\.be\/([^\&\?]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }
        return $url;
    };

    $video_url = $convert_to_embed_url(esc_url($atts['src']));
    $video_img_id = attachment_url_to_postid($atts['img']);
    $unique_id = 'no-index-video-' . $counter;

    $img_tag = "<picture data-video-id='{$unique_id}' class='no-index-video-trigger ratio ratio-16x9 my-4' style='cursor: pointer; display: inline-block;'>" .
        wp_get_attachment_image(
            $video_img_id,
            'medium_large',
            false,
            ['class' => 'img-fluid w-100']
        ) .
        "</picture>";

    $video_div = "<div id='{$unique_id}' class='d-none my-4' data-src='{$video_url}'></div>";

    return $img_tag . $video_div;
}
add_shortcode('no_index_video', 'no_index_video');

```
