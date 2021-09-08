<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */
$css_class = !empty($css_class)?$css_class:'';
$location = get_field('mkdf_event_location');
$date = get_field('mkdf_event_start_date');


?>

<article id="post-<?php the_ID(); ?>" <?php post_class($css_class); ?> >
    <div class="archive-article-container">
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        </header><!-- .entry-header -->


        <div class="entry-extra">
            <span class="location"><?php echo $location; ?></span> -
            <span class="location"><?php echo $date; ?></span>
        </div><!-- .entry-summary -->

        <div class="entry-summary">
            <?php echo artetonlus_the_excerpt(280, null, 'content'); ?>
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
