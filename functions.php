<?php

// Add scripts and stylesheets
function simple_scripts() {
  wp_enqueue_style('materialize_css', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css');
  wp_enqueue_script('materialize_js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js', array('jquery'));
  wp_enqueue_style('stylesheet', get_template_directory_uri() . '/css/stylesheet.css');
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'simple_scripts' );

// WordPress Titles
add_theme_support( 'title-tag' );


// Changing excerpt more - only works where excerpt is NOT hand-crafted
add_filter('excerpt_more', 'auto_excerpt_more');
function auto_excerpt_more($more) {
    return '&hellip;';
}

// Changing behavior of adding pics to content. Ignores alignment and width style
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
    if ( ! isset( $attr['caption'] ) ) {
        if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
        $content = $matches[1];
        $attr['caption'] = trim( $matches[2] );
        }
    }

    $output = apply_filters('img_caption_shortcode', '', $attr, $content);
    if ( $output != '' )
    return $output;

    extract(shortcode_atts(array(
        'id' => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) )
    return $content;

    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

    return '<div ' . $id . 'class="wp-caption">' . do_shortcode( $content ) . '<p>' . $caption . '</p></div>';
}


// function improved_trim_excerpt($text) {
//         global $post;
//         if ( '' == $text ) {
//                 $text = get_the_content('');
//                 $text = apply_filters('the_content', $text);
//                 $text = str_replace('\]\]\>', ']]&gt;', $text);
                // $text = preg_replace('@<script[^>]*.*?</script>@si', '', $text);
//                 $text = strip_tags($text, '<img>');
//                 $excerpt_length = 80;
//                 $words = explode(' ', $text, $excerpt_length + 1);
//                 if (count($words)> $excerpt_length) {
//                         array_pop($words);
//                         array_push($words, '[...]');
//                         $text = implode(' ', $words);
//                 }
//         }
//         return $text;
// }
// remove_filter('get_the_excerpt', 'wp_trim_excerpt');
// add_filter('get_the_excerpt', 'improved_trim_excerpt');