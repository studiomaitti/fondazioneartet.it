<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="archive-article-container">
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr(get_the_title()) ?>">
                <?php the_post_thumbnail('thumb-archive'); ?>
            </a>
        </div> <!--.post-thumbnail -->
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        </header><!-- .entry-header -->

        <div class="entry-summary">
            <?php echo artetonlus_the_excerpt(120); ?>
        </div><!-- .entry-summary -->

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
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
