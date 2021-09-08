<?php
/**
 * template name: comitato scientifico
 */

get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">
        <?php
        // Start the loop.
        while (have_posts()) :
            the_post();
            ?>
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
                    <?php the_content(); ?>
                </div><!-- .entry-content -->

                <div class="lista-persone-container">
                    <div class="blocco-i">
                        <!--
                        <div class="title">
                            <h2><?php _e('Scientific Committee', 'artetonlus'); ?></h2>
                        </div>
                        -->
                        <div class="lista-persone">
                            <?php
                            $args = array(
                                'post_type' => 'people',
                                'posts_per_page' => -1,
                                'order' => 'ASC',
                                'orderby' => 'menu_order',
                                'meta_key' => 'pp_ruolo_1',
                                'meta_value' => 'comitato-scientifico'
                            );
                            $the_query = new WP_Query($args);

                            // The Loop
                            if ($the_query->have_posts()) {
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    $post_id = get_the_ID();
                                    $role_1 = get_post_meta($post_id, 'pp_ruolo_1', true);
                                    $role_2 = get_post_meta($post_id, 'pp_ruolo_2', true);
                                    $breve_testo = get_post_meta($post_id, 'pp_breve_testo', true);
                                    $language = (defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'it');
                                    if($language == 'it'){
                                        $vc = get_field('pp_cv');
                                    } else {
                                        $vc = get_field('pp_cv');
                                    }

                                    $img = get_the_post_thumbnail($post_id, 'thumb-square');
                                    ?>
                                    <div class="persona">
                                        <div class="foto">
                                            <?php echo $img; ?>
                                        </div>
                                        <div class="nome"><?php echo get_the_title(); ?></div>

                                        <?php if (!empty($role_2)): ?>
                                            <div class="ruolo"><?php echo $role_2; ?></div>
                                        <?php endif; ?>

                                        <?php if (!empty($breve_testo)): ?>
                                            <div class="descrizione"><?php echo $breve_testo; ?></div>
                                        <?php endif; ?>

                                        <?php if (!empty($vc)): ?>
                                            <div class="cv">
                                                <a href="<?php echo $vc; ?>" target="_blank">curriculum vitae</a>
                                            </div>
                                        <?php endif; ?>

                                    </div>

                                    <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>


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

        <?php
            // End of the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->

    <?php get_sidebar('content-bottom'); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
