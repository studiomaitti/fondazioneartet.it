<?php
/**
 * Custom Artet onlus template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */

if (!function_exists('artetonlus_entry_meta')) :
    /**
     * Prints HTML with meta information for the categories, tags.
     *
     * Create your own artetonlus_entry_meta() function to override in a child theme.
     *
     * @since Artet onlus 1.0
     */
    function artetonlus_entry_meta($post_id = null)
    {

        if ('post' === get_post_type($post_id)) {
            if($post_id){
                $post_author_id = get_post_field( 'post_author', $post_id );
            } else {
                $post_author_id = false;
            }

            $author_avatar_size = apply_filters('artetonlus_author_avatar_size', 49);
        }

        if (in_array(get_post_type(), array('post', 'attachment'))) {
            artetonlus_entry_date();
        }

        $format = get_post_format();
        if (current_theme_supports('post-formats', $format)) {
            printf(
                '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
                sprintf('<span class="screen-reader-text">%s </span>', _x('Format', 'Used before post format.', 'artetonlus')),
                esc_url(get_post_format_link($format)),
                get_post_format_string($format)
            );
        }
    }
endif;

if (!function_exists('artetonlus_entry_date')) :
    /**
     * Prints HTML with date information for current post.
     *
     * Create your own artetonlus_entry_date() function to override in a child theme.
     *
     * @since Artet onlus 1.0
     */
    function artetonlus_entry_date($post_id=null)
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        if (get_the_time('U',$post_id) !== get_the_modified_time('U',$post_id)) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date('c', $post_id)),
            get_the_date('',$post_id),
            esc_attr(get_the_modified_date('c',$post_id)),
            get_the_modified_date('',$post_id)
        );

        printf(
            '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
            _x('Posted on', 'Used before publish date.', 'artetonlus'),
            esc_url(get_permalink($post_id)),
            $time_string
        );
    }
endif;

if (!function_exists('artetonlus_entry_taxonomies')) :
    /**
     * Prints HTML with category and tags for current post.
     *
     * Create your own artetonlus_entry_taxonomies() function to override in a child theme.
     *
     * @since Artet onlus 1.0
     */
    function artetonlus_entry_taxonomies()
    {
        $categories_list = get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'artetonlus'));
        if ($categories_list && artetonlus_categorized_blog()) {
            printf(
                '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                _x('Categories', 'Used before category names.', 'artetonlus'),
                $categories_list
            );
        }

        $tags_list = get_the_tag_list('', _x(', ', 'Used between list items, there is a space after the comma.', 'artetonlus'));
        if ($tags_list && !is_wp_error($tags_list)) {
            printf(
                '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                _x('Tags', 'Used before tag names.', 'artetonlus'),
                $tags_list
            );
        }
    }
endif;

if (!function_exists('artetonlus_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     *
     * Create your own artetonlus_post_thumbnail() function to override in a child theme.
     *
     * @since Artet onlus 1.0
     */
    function artetonlus_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); ?>
            </a>

        <?php
        endif; // End is_singular()
    }
endif;

if (!function_exists('artetonlus_excerpt')) :
    /**
     * Displays the optional excerpt.
     *
     * Wraps the excerpt in a div element.
     *
     * Create your own artetonlus_excerpt() function to override in a child theme.
     *
     * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
     *
     * @since Artet onlus 1.0
     *
     */
    function artetonlus_excerpt($class = 'entry-summary')
    {
        $class = esc_attr($class);
        ?>
        <div class="<?php echo $class; ?>">
            <?php the_excerpt(); ?>
        </div><!-- .<?php echo $class; ?> -->
        <?php
    }
endif;

if (!function_exists('artetonlus_excerpt_more') && !is_admin()) :
    /**
     * Replaces "[...]" (appended to automatically generated excerpts) with ... and
     * a 'Continue reading' link.
     *
     * Create your own artetonlus_excerpt_more() function to override in a child theme.
     *
     * @return string 'Continue reading' link prepended with an ellipsis.
     * @since Artet onlus 1.0
     *
     */
    function artetonlus_excerpt_more()
    {
        return '';
        $link = sprintf(
            '<a href="%1$s" class="more-link">%2$s</a>',
            esc_url(get_permalink(get_the_ID())),
            /* translators: %s: Post title. */
            sprintf(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'artetonlus'), get_the_title(get_the_ID()))
        );

        return ' &hellip; ' . $link;
    }

    add_filter('excerpt_more', 'artetonlus_excerpt_more', 12);
endif;

if (!function_exists('artetonlus_categorized_blog')) :
    /**
     * Determines whether blog/site has more than one category.
     *
     * Create your own artetonlus_categorized_blog() function to override in a child theme.
     *
     * @return bool True if there is more than one category, false otherwise.
     * @since Artet onlus 1.0
     *
     */
    function artetonlus_categorized_blog()
    {
        $all_the_cool_cats = get_transient('artetonlus_categories');
        if (false === $all_the_cool_cats) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(
                array(
                    'fields' => 'ids',
                    // We only need to know if there is more than one category.
                    'number' => 2,
                )
            );

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('artetonlus_categories', $all_the_cool_cats);
        }

        if ($all_the_cool_cats > 1 || is_preview()) {
            // This blog has more than 1 category so artetonlus_categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so artetonlus_categorized_blog should return false.
            return false;
        }
    }
endif;

/**
 * Flushes out the transients used in artetonlus_categorized_blog().
 *
 * @since Artet onlus 1.0
 */
function artetonlus_category_transient_flusher()
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient('artetonlus_categories');
}

add_action('edit_category', 'artetonlus_category_transient_flusher');
add_action('save_post', 'artetonlus_category_transient_flusher');


