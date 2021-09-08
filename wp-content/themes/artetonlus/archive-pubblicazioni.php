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

//https://www.lab21.gr/blog/wordpress-wp_query-order-posts-by-taxonomy/
$pubblicazioni_taxonomies = get_terms(array(
    'fields' => 'ids',   //get the IDs
    'taxonomy' => 'anno_pubblicazione',
    'orderby' => 'name',
    'order' => 'DESC',
    'hide_empty' => true,
));

//add my filter to change the order by of the query done by WP_QUERY:
add_filter('posts_orderby', 'my_pubblicazioni_orderby');

function my_pubblicazioni_orderby($orderby_statement)
{
    $orderby_statement = " object_id DESC, " . $orderby_statement; //keeps the current orderby, but also adds the term_order in front
    return $orderby_statement;
}

$the_query = new WP_Query(array(
    'post_type' => 'pubblicazioni',
    'post_status' => 'publish',
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'ignore_sticky_posts' => true,
    'posts_per_page' => -1,
    'no_found_rows' => true,
    //same as the initial query, only now i am adding 'tax_query' just to force an inner join to the taxonomies table
    'tax_query' => array(
        array(
            'taxonomy' => 'anno_pubblicazione',
            'field' => 'term_id',
            'terms' => $pubblicazioni_taxonomies
        )
    ),
));

//after i am done, i remove the filter:
remove_filter('posts_orderby', 'my_pubblicazioni_orderby');

//now i can loop though the results as i would normally do:
// The Loop
/* Restore original Post Data */

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        if ($the_query->have_posts()) :
            ?>
            <div class="article-list">

            <?php
            // Start the Loop.
            $i = 0;
            $mod = 0;
            $term_name = '';
            while ($the_query->have_posts()):
                $the_query->the_post();
                $post_id = get_the_ID();

                $i++;
                $css_class = 'post-mod-' . ($mod % 4);
                $mod++;

                $css_class .= ' post-i-' . $i;
                $css_class .= ' post-i-mod-' . ($i % 2);

                $css_class = !empty($css_class) ? $css_class : '';
                $link = get_field('pbl_link');
                $terms = wp_get_post_terms($post_id, 'anno_pubblicazione');

                if (!empty($terms)) {
                    if ($i == 1 || $terms[0]->name != $term_name) {
                        $i = 1;
                        $show_title = true;
                        $term_name = $terms[0]->name;
                    } else {
                        $show_title = false;
                    }
                }
                ?>

                <?php if ($show_title == 1) { ?>
                </div><!-- article-list -->

                <header class="page-header page-header-<?php echo $i;?>">
                    <h2 class="page-title"><?php echo __('Publications', 'artetonlus') . ' ' . $term_name; ?></h2>
                    <?php
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    ?>
                </header><!-- .page-header -->

                <div class="article-list">
            <?php } ?>

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
        endif;

        wp_reset_postdata();
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
