<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if (have_posts()) : ?>

        <header class="page-header">
            <h1 class="page-title"><?php _e('Events', 'artetonlus');?></h1>
        </header><!-- .page-header -->

        <div class="article-list">

            <?php
            // Start the Loop.
            $i = 0;
            $mod = 0;
            while (have_posts()) :
                the_post();
                $i++;
                $css_class = 'post-mod-' . ($mod % 4);
                $mod++;

                $css_class .= ' post-i-' . $i;
                $css_class .= ' post-i-mod-' . ($i%2);

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                include( locate_template( 'template-parts/content-event.php', false, false ) );

                // End the loop.
            endwhile;
            echo '</div>';
            // Previous/next page navigation.
            the_posts_pagination(
                array(
                    'prev_text' => __('Previous page', 'artetonlus'),
                    'next_text' => __('Next page', 'artetonlus'),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'artetonlus') . ' </span>',
                )
            );

            // If no content, include the "No posts found" template.
            else :
                get_template_part('template-parts/content', 'none');

            endif;
            ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
