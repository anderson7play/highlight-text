<?php
function highlight_text_shortcode($atts , $content = null) {
 
    // return '<span class="highlight" style="background: ' . $atts['background'] . '; color: ' . $atts['color'] . '">' . $content . '</span>';
    return '<span class="highlight">' . $content . '</span>';
} 
add_shortcode('highlight', 'highlight_text_shortcode');