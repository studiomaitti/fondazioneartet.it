<?php
$options = get_option('artet_options');
$header_text = isset($options['artet_header_text']) ? $options['artet_header_text'] : '';
$header_text = nl2br($header_text);
$header_auth = isset($options['artet_header_author']) ? $options['artet_header_author'] : '';
if (is_front_page()) {
    $header_image = isset($options['artet_default_header_image']) ? $options['artet_default_header_image'] : '';
    if (!empty($header_image)) {
        $image_attributes = wp_get_attachment_image_src($options['artet_default_header_image'], 'full');
        $src = $image_attributes[0];
    }
} elseif (is_archive() || is_single() || is_page()) {
    // get the current taxonomy term
    $term = get_queried_object();
    $image = get_field('header_image', $term);
    if (!empty($image)) {
        $src = $image['url'];
    }
}

if (empty($src)) {
    $header_image = isset($options['artet_default_header_image']) ? $options['artet_default_header_image'] : '';
    if (!empty($header_image)) {
        $image_attributes = wp_get_attachment_image_src($options['artet_default_header_image'], 'full');
        $src = $image_attributes[0];
    } else {
        $src = 'https://via.placeholder.com/955x320.png/dddddd/333333?text=Artet+Onlus';
    }
}
?>
<div class="header-section-image">
    <!--
    <div class="container">
        <img src="<?php echo $src; ?>" alt="" title=""/> <a href="<?php echo get_home_url(); ?>" class="logo" rel="home"></a>
        <span class="text"><?php echo $header_text; ?></span> <span class="author"><?php echo $header_auth; ?></span>
    </div>
    -->
</div>