# Shortcode para vídeos com ACF

 **Descrição**  
Esse shortcode é pensado na inserção de vídeos indexáveis para o Google. O usuário precisa preencher os campos e retornará um modal com o vídeo, além do dado estruturado do vídeo em questão. 

**IMPORTANTE**: Cuidado para não inserir a url e no editor de blocos ele realizar a inclusão de um link, tenha a certeza de que o shortcode está recebendo um texto. A thumbnail precisa estar hospedada no wordpress do site

O campo data é opcional, caso não seja preenchido irá pegar o do Wordpress localmente

**EXEMPLO DE USO:**
[index_video src="https://www.youtube.com/watch?v=4pB2IhK_zWo" img="http://theme.wsilab.com.br/wp-content/uploads/2025/05/Mask-group-1.png" title="Vídeo do youtube!" description="Vídeo educativo" upload_date="11/12/2025" duration="PT2M30S"]

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
function index_video($atts)
{
    $atts = shortcode_atts([
        'src' => '',
        'img' => '',
        'title' => 'Vídeo Indexável',
        'description' => 'Assista ao vídeo para conhecer mais detalhes.',
        'upload_date' => current_time('Y-m-d H:i:s'), // data e hora local WordPress
        'duration' => 'PT2M30S'
    ], $atts);

    // Escapa URLs
    $video_url = esc_url($atts['src']);
    $video_img_url = esc_url($atts['img']);
    $video_img_id = attachment_url_to_postid($video_img_url);

    $img_tag = "<picture>" .
        wp_get_attachment_image(
            $video_img_id,
            'medium_large',
            false,
            [
                'class' => 'img-fluid',
                'data-bs-toggle' => 'modal',
                'data-bs-target' => '#modal-' . $video_img_id,
                'style' => 'cursor: pointer; margin: 1rem 0'
            ]
        ) .
        "</picture>";

    $video_iframe = wp_oembed_get($video_url);

    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/', $video_url, $matches);
    $embed_url = isset($matches[1]) ? 'https://www.youtube.com/embed/' . $matches[1] : $video_url;


    $date = new DateTime($atts['upload_date'], wp_timezone());
    $date->setTimezone(new DateTimeZone('UTC'));
    $upload_date_iso = $date->format('Y-m-d\TH:i:s\Z');
    $logo = empty(RDTheme::$options['logo']['url']) ? RDTHEME_IMG_URL . 'logo-dark.png' : RDTheme::$options['logo']['url'];

    $publisher = [
        '@type' => 'Organization',
        'name' =>  get_bloginfo("name"),
        'logo' => [
            '@type' => 'ImageObject',
            'url' => $logo,
        ]
    ];

    $video_schema = [
        '@context' => 'https://schema.org',
        '@type' => 'VideoObject',
        'name' => $atts['title'],
        'description' => $atts['description'],
        'thumbnailUrl' => $video_img_url,
        'uploadDate' => $upload_date_iso,
        'duration' => $atts['duration'],
        'contentUrl' => $video_url,
        'embedUrl' => $embed_url,
        'publisher' => $publisher
    ];

    global $video_structured_data;
    if (!isset($video_structured_data)) $video_structured_data = [];

    $video_structured_data[] = json_encode($video_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    return <<<HTML
    $img_tag
    <!-- Modal -->
    <div class="modal fade" id="modal-$video_img_id" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
            <div class="ratio ratio-16x9">$video_iframe</div>
        </div>
        </div>
    </div>
    </div>
HTML;
}

add_shortcode('index_video', 'index_video');

function insert_video_structured_data()
{
    global $video_structured_data;

    if (!empty($video_structured_data)) {
        foreach ($video_structured_data as $json) {
            echo "\n<script type=\"application/ld+json\">\n$json\n</script>\n";
        }
    }
}

add_action('wp_head', 'insert_video_structured_data');

add_action('template_redirect', function () {
    if (is_singular()) {
        global $post;

        if ($post && has_shortcode($post->post_content, 'index_video')) {
            apply_filters('the_content', $post->post_content);
        }
    }
});

```
