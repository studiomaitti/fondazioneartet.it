<?php
//[mkdf_button
//  text=”PUBMED”
//  target=”_self”
//  icon_pack=””
//  font_weight=””
//  text_transform=””
//  link=”https://www.ncbi.nlm.nih.gov/pubmed/30990000″
//  hover_background_color=”#484c47″ hover_border_color=”#484c47″ background_color=”#e72d4b” border_color=”#e72d4b”]
function artet_mkdf_button( $atts, $content = null ){

    $link = $atts['link'];
    $text = $atts['text'];
    $target = $atts['target'];
    return '<div><a itemprop="url" href="'.$link.'" target="'.$target.'"  class="mkdf-btn mkdf-btn-medium mkdf-btn-solid" >
    <span class="mkdf-btn-text">'.$text.'</span>
    </a></div>';
}
add_shortcode( 'mkdf_button', 'artet_mkdf_button' );

function artet_mkdf_elements_holder_item( $atts, $content = null ){
    return do_shortcode($content);
}
add_shortcode( 'mkdf_elements_holder_item', 'artet_mkdf_elements_holder_item' );

function artet_mkdf_elements_holder( $atts, $content = null ){
    return do_shortcode($content);
}
add_shortcode( 'mkdf_elements_holder', 'artet_mkdf_elements_holder' );

//[mkdf_icon_with_text type=”icon-left” icon_pack=”dripicons” dripicon=”dripicons-article” title_tag=”h4″ title=”Pubblicazioni 2019″ link=”https://dev.studiomaitti.it/pubblicazioni-2019/” icon_color=”#e72d4b” icon_hover_color=”#484c47″]
function artet_mkdf_icon_with_text( $atts, $content = null ){
    $link = $atts['link'];
    $text = $atts['title'];
    $target = '_self';

    return '<a itemprop="url" href="'.$link.'" target="'.$target.'"  class="mkdf-btn mkdf-btn-full-witdh mkdf-btn-medium mkdf-btn-solid" >
    <span class="mkdf-btn-text">'.$text.'</span>
    </a>';
}
add_shortcode( 'mkdf_icon_with_text', 'artet_mkdf_icon_with_text' );
