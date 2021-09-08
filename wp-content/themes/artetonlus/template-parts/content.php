<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */
$css_class = !empty($css_class)?$css_class:'';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($css_class); ?> >
    <div class="archive-article-container">
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        </header><!-- .entry-header -->

        <!--
    <div class="post-thumbnail">
        <?php the_post_thumbnail('thumb-archive'); ?>
    </div> .post-thumbnail -->

        <div class="entry-summary">
            <?php echo artetonlus_the_excerpt(280); ?>
        </div><!-- .entry-summary -->

        <!--
        <footer class="entry-footer">
            <?php artetonlus_entry_meta(); ?>
            <?php
            edit_post_link(
                sprintf(
                /* translators: %s: Post title. */
                    __('Edit<span class="screen-reader-text"> "%s"</span>', 'artetonlus'),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer>
        .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
