<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <?php artetonlus_post_thumbnail(); ?>

    <div class="entry-content">
        <!-- PROGETTI DI RICERCA -->
        <?php
        $args = array(
            'post_type' => 'progetto',
            'posts_per_page' => -1
        );
        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) :
            ?>
            <?php
            $i = 0;
            while ($the_query->have_posts()):
                $the_query->the_post();
                $i++;
                $url_thumb = get_the_post_thumbnail_url(null, 'thumb-progetti');
                $style = '';
                if ($url_thumb) {
                    $style = "background-image: url('{$url_thumb}');";
                }
                $post_date = get_the_date('j F Y');
                ?>
            <div class="prj-ricerca-container">
                <?php if($i==1): ?>
                <h2><?php _e('RESEARCH PROJECTS', 'artetonlus')?></h2>
                <?php endif; ?>

                <!--<div class="prj-ricerca-list owl-carousel owl-theme">-->
                <div class="prj-ricerca-list">
                        <div class="item item-<?php echo $i; ?>">
                            <div class="item-image">
                                <a href="<?php echo esc_url(get_permalink()) ?>" title="<?php echo esc_attr(get_the_title()) ?>" rel="bookmark">
                                    <img src="<?php echo $url_thumb ?>"/> </a>
                            </div>
                            <div class="item-data">
                                <div class="item-category"><?php the_category(); ?></div>
                                <div class="item-date"><?php the_date('j F Y'); ?></div>
                                <div class="item-title"><?php the_title(sprintf('<a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a>'); ?></div>
                                <div class="item-postmeta">
                                    <div class="item-nome">
                                        <strong><?php _e('Short name', 'artetonlus')?></strong>
                                        <?php echo get_field('prj_nome_breve'); ?>
                                    </div>
                                    <div class="item-inizio">
                                        <strong><?php _e('Start project', 'artetonlus')?></strong>
                                        <?php echo get_field('prj_inizio_progetto'); ?>
                                    </div>
                                    <div class="item-durata">
                                        <strong><?php _e('Project duration', 'artetonlus')?></strong>
                                        <?php echo get_field('prj_durata_progetto'); ?>
                                    </div>
                                    <div class="item-status">
                                        <strong><?php _e('Status', 'artetonlus')?></strong>
                                        <?php echo get_field('prj_status'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
            <?php
            endwhile;
            ?>
        <?php
        endif;
        wp_reset_postdata();
        ?>

        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'artetonlus') . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'pagelink' => '<span class="screen-reader-text">' . __('Page', 'artetonlus') . ' </span>%',
                'separator' => '<span class="screen-reader-text">, </span>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <?php
    edit_post_link(
        sprintf(
        /* translators: %s: Post title. */
            __('Edit<span class="screen-reader-text"> "%s"</span>', 'artetonlus'),
            get_the_title()
        ),
        '<footer class="entry-footer"><span class="edit-link">',
        '</span></footer><!-- .entry-footer -->'
    );
    ?>

</article><!-- #post-<?php the_ID(); ?> -->
