<?php

function index_video($atts)
{
    $atts = shortcode_atts([
        'src' => '',
        'img' => '',
        'title' => 'Vídeo Indexável',
        'description' => 'Assista ao vídeo para conhecer mais detalhes.',
        'upload_date' => date('Y-m-d')
    ], $atts);

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

    // Salva na variável global
    global $video_structured_data;
    if (!isset($video_structured_data)) $video_structured_data = [];

    $video_structured_data[] = <<<JSON
    {
    "@context": "https://schema.org",
    "@type": "VideoObject",
    "name": "{$atts['title']}",
    "description": "{$atts['description']}",
    "thumbnailUrl": "{$video_img_url}",
    "uploadDate": "{$atts['upload_date']}",
    "contentUrl": "{$video_url}",
    "embedUrl": "{$embed_url}"
    }
JSON;

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

function insert_video_structered_data() {
    global $video_structured_data;

    if (!empty($video_structured_data)) {
        foreach ($video_structured_data as $json) {
            echo "\n<script type=\"application/ld+json\">\n$json\n</script>\n";
        }
    }
}
add_action('wp_head', 'insert_video_structered_data');

add_action('template_redirect', function () {
    if (is_singular()) {
        global $post;

        if ($post && has_shortcode($post->post_content, 'index_video')) {
            apply_filters('the_content', $post->post_content); // Executa os shortcodes
        }
    }
});


