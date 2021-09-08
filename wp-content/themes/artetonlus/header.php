<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */
$language = (defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'it');

$options = get_option('artet_options');
$sostienici_bb = isset($options['artet_sostienici_bb_' . $language]) ? nl2br($options['artet_sostienici_bb_' . $language]) : '';
$sostienici_5x1000 = isset($options['artet_sostienici_5x1000_' . $language]) ? nl2br($options['artet_sostienici_5x1000_' . $language]) : '';

$perc_txt = isset($options['artet_percentuale_testo_' . $language]) ? nl2br($options['artet_percentuale_testo_' . $language]) : '';
$perc_txt_mob = isset($options['artet_percentuale_testo_' . $language.'_mob']) ? nl2br($options['artet_percentuale_testo_' . $language.'_mob']) : '';

if(empty($perc_txt_mob)){
    $perc_txt_mob = $perc_txt;
}

$perc_1_num = isset($options['artet_percentuale_1_numero_' . $language]) ? nl2br($options['artet_percentuale_1_numero_' . $language]) : '';
$perc_2_num = isset($options['artet_percentuale_2_numero_' . $language]) ? nl2br($options['artet_percentuale_2_numero_' . $language]) : '';
$perc_3_num = isset($options['artet_percentuale_3_numero_' . $language]) ? nl2br($options['artet_percentuale_3_numero_' . $language]) : '';
$perc_1_txt = isset($options['artet_percentuale_1_testo_' . $language]) ? nl2br($options['artet_percentuale_1_testo_' . $language]) : '';
$perc_2_txt = isset($options['artet_percentuale_2_testo_' . $language]) ? nl2br($options['artet_percentuale_2_testo_' . $language]) : '';
$perc_3_txt = isset($options['artet_percentuale_3_testo_' . $language]) ? nl2br($options['artet_percentuale_3_testo_' . $language]) : '';

$show_fascia_number = false;
if(is_front_page() || is_page(5824)){
    $show_fascia_number = true;
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177325198-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-177325198-1');
</script>


    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page-header" class="site">
    <div class="social-header">
        <div class="site-inner">
            <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'artetonlus'); ?></a>
            <div class="site-header" role="banner">
                <div class="site-header-main-top">

                    <div class="wpml_lng_sel_mobile">
                        <?php do_action('wpml_add_language_selector'); ?>
                    </div><!-- .content-area -->

                    <div class="content-area content-area-menu-top">
                        <div id="giorno-js"><span></span></div>
                    </div><!-- .content-area -->
                    <div class="sidebar sidebar-social-profile">
                        <?php if (has_nav_menu('social')) : ?>
                            <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Social Menu', 'artetonlus'); ?>">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'social',
                                        'menu_class' => 'social-links-menu',
                                        'depth' => 1,
                                        'link_before' => '<span class="screen-reader-text">',
                                        'link_after' => '</span>',
                                    )
                                );
                                ?>
                            </nav><!-- .main-navigation -->
                        <?php endif; ?>
                    </div><!-- .sidebar -->
                </div>
            </div><!-- .site-header -->
        </div>
    </div>

    <div class="pre-header">
        <div class="site-inner">
            <div class="header-link">
                <?php get_search_form(); ?>
            </div><!-- .header-link -->

            <aside id="sidebar-pre-header" class="sidebar widget-area" role="complementary">
                <a href="#ex1" rel="modal:open" class="newsletter"><?php _e('Newsletter subscription', 'artetonlus'); ?></a>
            </aside>

            <?php if (has_nav_menu('primary')): ?>
                <button id="menu-toggle" class="menu-toggle"><?php _e('Menu', 'artetonlus'); ?></button>
            <?php endif; ?>

        </div>
    </div>
    <div class="img-header">
        <div class="site-inner">
            <div class="support-us">
                <div class="support-content">
                    <div class="title"><?php _e('Support us', 'artetonlus'); ?></div>
                    <?php if (!empty($sostienici_bb)): ?>
                        <div class="support-i support-bb"><?php echo $sostienici_bb; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($sostienici_5x1000)): ?>
                        <div class="support-i support-5x1000"><?php echo $sostienici_5x1000; ?></div>
                    <?php endif; ?>
                    <div class="support-i support-paypal">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick"/>
                            <input type="hidden" name="hosted_button_id" value="V5NV58TCDLLS6"/>
                            <input type="image" src="https://www.paypalobjects.com/en_US/IT/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button"/>
                            <img alt="" border="0" src="https://www.paypal.com/en_IT/i/scr/pixel.gif" width="1" height="1"/>
                        </form>
                    </div>
                </div>
            </div><!-- .header-link -->
            <div class="logo">
                <a href="https://www.fondazioneartet.it/2021/09/08/roberta-villa-per-fondazione-artet/" title="ROBERTA VILLA PER FONDAZIONE ARTET"></a>
            </div>
        </div>
    </div>

    <div class="claim-header">
        <div class="site-inner">
            <?php if($show_fascia_number): ?>
            <h2>
                <span class="dsk"><?php echo $perc_txt; ?></span>
                <span class="mob"><?php echo $perc_txt_mob; ?></span>
            </h2>

            <div class="perc-container">
                <div class="percentuale-i percentuale-1" data-i="1" data-perc="<?php echo $perc_1_num; ?>">
                    <div class="graph">
                        <div class="percent"></div>
                        <svg class="svg svg-1">
                            <circle cx="50%" cy="50%" r="50%" stroke="rgba(237,87,54,0)" stroke-width="8" fill="#ffffff"/>
                        </svg>
                    </div>
                    <div class="label"><?php echo $perc_1_txt; ?></div>
                </div>

                <div class="percentuale-i percentuale-2" data-i="2" data-perc="<?php echo $perc_2_num; ?>">
                    <div class="graph">
                        <div class="percent"></div>
                        <svg class="svg svg-2">
                            <circle cx="50%" cy="50%" r="50%" stroke="rgba(237,87,54,0)" stroke-width="8" fill="#ffffff"/>
                        </svg>
                    </div>
                    <div class="label"><?php echo $perc_2_txt; ?></div>
                </div>

                <div class="percentuale-i percentuale-3" data-i="2" data-perc="<?php echo $perc_3_num; ?>">
                    <div class="graph">
                        <div class="percent"></div>
                        <svg class="svg svg-3">
                            <circle cx="50%" cy="50%" r="50%" stroke="rgba(237,87,54,0)" stroke-width="8" fill="#ffffff"/>
                        </svg>
                    </div>
                    <div class="label"><?php echo $perc_3_txt; ?></div>
                </div>
            </div>

            <?php endif; ?>
        </div>
    </div>

    <div class="header-menu">
        <div class="site-inner">
            <header id="masthead" class="site-header" role="banner">
                <div class="site-header-main">
                    <?php if (has_nav_menu('primary')): ?>
                        <div id="site-header-menu" class="site-header-menu">
                            <div class="header-menu-mobile">
                                <div class="logo">
                                    <a href="/" title="Home" referrerpolicy="origin"></a>
                                </div>
                                <div class="menuToggle close">
                                    <button id="menu-toggle-close" class="menu-toggle" aria-expanded="false" aria-controls="site-navigation social-navigation">
                                        <?php _e('Close', 'artetonlus') ?>
                                    </button>
                                </div>
                            </div>
                            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'artetonlus'); ?>">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'menu_class' => 'primary-menu',
                                        'link_before' => '<span>',
                                        'link_after' => '</span>',
                                    )
                                );
                                ?>
                            </nav><!-- .main-navigation -->
                        </div><!-- .site-header-menu -->
                    <?php endif; ?>
                </div><!-- .site-header-main -->
            </header><!-- .site-header -->
        </div>
    </div>
</div>
<!--
<div id="row-breadcrumbs" class="site">
    <div class="site-inner">
        <?php
if (!is_front_page() && function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}
?>
    </div>
</div>
-->
<div id="page" class="site">
    <div class="site-inner">

        <div id="content" class="site-content">
