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

get_header();
$current_term_id = get_queried_object()->term_id;
$current_name = get_queried_object()->name;
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <h1 class="page-title"><?php echo __('Publications', 'artetonlus') . ' ' . $current_name; ?></h1>
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
                    $css_class .= ' post-i-mod-' . ($i % 2);

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */

                    $css_class = !empty($css_class) ? $css_class : '';
                    $link = get_field('pbl_link');
                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class($css_class); ?> >
                        <div class="archive-article-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><?php the_title(); ?></h2>
                                <?php /* the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');*/ ?>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <?php the_content(); ?>
                                <div class="link-to">
                                    <a target="_blank" rel="noopener noreferrer" href="<?php echo $link; ?>"><span>PUBMED</span></a>
                                </div>
                            </div><!-- .entry-content -->
                        </div>
                    </article><!-- #post-<?php the_ID(); ?> -->

                <?php
                endwhile;
                ?>
            </div>
        <?php

        // If no content, include the "No posts found" template.
        else :
            get_template_part('template-parts/content', 'none');

        endif;
        ?>


        <div class="taxonomy-list">
            <!-- h2><?php _e('Years of publication', 'artetonlus'); ?></h2 -->
            <div class="link-anno-pubbl">
                <?php
                $taxonomies = get_terms(array(
                    'taxonomy' => 'anno_pubblicazione',
                    'order' => 'DESC'
                ));

                if (!empty($taxonomies)) :
                    foreach ($taxonomies as $term) {
                        if ($term->parent == 0) {
                            if ($current_term_id == $term->term_id) {
                                ?>
                                <a rel="noopener noreferrer" href="<?php echo get_term_link($term->term_id); ?>" class="selected"><span><?php echo __('Publications', 'artetonlus') . ' ' . $term->name; ?></span></a>
                                <?php
                            } else {
                                ?>
                                <a rel="noopener noreferrer" href="<?php echo get_term_link($term->term_id); ?>"><span><?php echo __('Publications', 'artetonlus') . ' ' . $term->name; ?></span></a>
                                <?php
                            }
                        }
                    }
                endif;
                ?>
            </div>

        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
