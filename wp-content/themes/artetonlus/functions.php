<?php
/**
 * Artet onlus functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://developer.wordpress.org/plugins/}
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */

/**
 * Artet onlus only works in WordPress 4.4 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Artet onlus Configuration Management
 */
require get_template_directory() . '/inc/artetonlus-theme-option.php';
require get_template_directory() . '/inc/artetonlus-widget.php';
require get_template_directory() . '/inc/shortcode_mkdf_elements_holder.php';


if (!function_exists('artetonlus_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own artetonlus_setup() function to override in a child theme.
     *
     * @since Artet onlus 1.0
     */
    function artetonlus_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/artetonlus
         * If you're building a theme based on Artet onlus, use a find and replace
         * to change 'artetonlus' to the name of your theme in all the template files
         */
        load_theme_textdomain('artetonlus');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for custom logo.
         *
         *  @since Artet onlus 1.2
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 240,
                'width'       => 240,
                'flex-height' => true,
            )
        );
         */

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 9999);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'artetonlus'),
                'secondary' => __('Secondary Menu', 'artetonlus'),
                'top_small' => __('Top Left Small Menu', 'artetonlus'),
                'social' => __('Social Links Menu', 'artetonlus'),
                //'header-link' => __('Menu Header Link', 'artetonlus'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            )
        );

        /*
         * Enable support for Post Formats.
         *
         * See: https://wordpress.org/support/article/post-formats/
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'status',
                'audio',
                'chat',
            )
        );
         */

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css'));

        // Load regular editor styles into the new block-based editor.
        add_theme_support('editor-styles');

        // Load default block styles.
        add_theme_support('wp-block-styles');

        // Add support for responsive embeds.
        add_theme_support('responsive-embeds');

        // Add support for custom color scheme.
        add_theme_support(
            'editor-color-palette',
            array(
                array(
                    'name' => __('Dark Gray', 'artetonlus'),
                    'slug' => 'dark-gray',
                    'color' => '#1a1a1a',
                ),
                array(
                    'name' => __('Medium Gray', 'artetonlus'),
                    'slug' => 'medium-gray',
                    'color' => '#8e9293',
                ),
                array(
                    'name' => __('White', 'artetonlus'),
                    'slug' => 'white',
                    'color' => '#fff',
                ),
                array(
                    'name' => __('Bright Red', 'artetonlus'),
                    'slug' => 'bright-red',
                    'color' => '#ea1c3c',
                ),
                array(
                    'name' => __('Orange', 'artetonlus'),
                    'slug' => 'orange',
                    'color' => '#fcb72b',
                ),
            )
        );

        // Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support('customize-selective-refresh-widgets');

        //Creo i tagli necessari
        add_image_size('thumb-progetti', 600, 350, true); // (cropped)
        add_image_size('thumb-square', 480, 480, true); // (cropped)
        add_image_size('thumb-archive', 480, 200, true); // (cropped)
    }
endif; // artetonlus_setup
add_action('after_setup_theme', 'artetonlus_setup');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Artet onlus 1.0
 */
function artetonlus_content_width()
{
    $GLOBALS['content_width'] = apply_filters('artetonlus_content_width', 840);
}

add_action('after_setup_theme', 'artetonlus_content_width', 0);

/**
 * Add preconnect for Google Fonts.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 *
 * @return array $urls           URLs to print for resource hints.
 * @since Artet onlus 1.6
 *
 */
function artetonlus_resource_hints($urls, $relation_type)
{
    if (wp_style_is('artetonlus-fonts', 'queue') && 'preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}

add_filter('wp_resource_hints', 'artetonlus_resource_hints', 10, 2);

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Artet onlus 1.0
 */
function artetonlus_widgets_init()
{
    register_sidebar(
        array(
            'name' => __('Sidebar', 'artetonlus'),
            'id' => 'sidebar-1',
            'description' => __('Add widgets here to appear in your sidebar.', 'artetonlus'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name' => __('Registration newsletter', 'artetonlus'),
            'id' => 'pre-header',
            'description' => '',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name' => __('Under Category News Posts List', 'artetonlus'),
            'id' => 'under-category-news-list',
            'description' => '',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'artetonlus_widgets_init');


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Artet onlus 1.0
 */
function artetonlus_javascript_detection()
{
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'artetonlus_javascript_detection', 0);

/**
 * Enqueues scripts and styles.
 *
 * @since Artet onlus 1.0
 */
function artetonlus_scripts()
{
    // Add Genericons, used in the main stylesheet.
    wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1');

    // Theme stylesheet.
    wp_enqueue_style('artetonlus-style', get_stylesheet_uri(), array(), '20200107');
    wp_enqueue_style('artetonlus-theme', get_template_directory_uri() . '/css/style-theme.css', array(), date('Ymdhis'));

    // Theme block stylesheet.
    //wp_enqueue_style('artetonlus-block-style', get_template_directory_uri() . '/css/blocks.css', array('artetonlus-style'), '20190102');

    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style('artetonlus-ie', get_template_directory_uri() . '/css/ie.css', array('artetonlus-style'), '20170530');
    wp_style_add_data('artetonlus-ie', 'conditional', 'lt IE 10');

    // Load the Internet Explorer 8 specific stylesheet.
    wp_enqueue_style('artetonlus-ie8', get_template_directory_uri() . '/css/ie8.css', array('artetonlus-style'), '20170530');
    wp_style_add_data('artetonlus-ie8', 'conditional', 'lt IE 9');

    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style('artetonlus-ie7', get_template_directory_uri() . '/css/ie7.css', array('artetonlus-style'), '20170530');
    wp_style_add_data('artetonlus-ie7', 'conditional', 'lt IE 8');

    // Load the html5 shiv.
    wp_enqueue_script('artetonlus-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3');
    wp_script_add_data('artetonlus-html5', 'conditional', 'lt IE 9');

    wp_enqueue_script('artetonlus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170530', true);

    //OWLCARO
    wp_enqueue_style('owlcarousel', get_template_directory_uri() . '/js/owlcarousel/dist/assets/owl.carousel.min.css', array(), '20170530');
    wp_enqueue_style('owlcarousel-theme', get_template_directory_uri() . '/js/owlcarousel/dist/assets/owl.theme.default.min.css', array(), '20170530');
    wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/js/owlcarousel/dist/owl.carousel.min.js', array('jquery'), '20181217', true);

    //TOOLTIPSTER
    wp_enqueue_style('tooltipster-css', get_template_directory_uri() . '/js/tooltipster/dist/css/tooltipster.bundle.min.css', array(), '20170530');
    wp_enqueue_style('tooltipster-css-light', get_template_directory_uri() . '/js/tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css', array(), '20170530');
    wp_enqueue_script('tooltipster-js', get_template_directory_uri() . '/js/tooltipster/dist/js/tooltipster.bundle.min.js', array('jquery'), '20181217', true);

    //JQUERY SIMPLE MODAL
    wp_enqueue_script('jquery-modal', get_template_directory_uri() . '/js/jquery-modal/jquery.modal.min.js', array('jquery'), '20181217', true);
    wp_enqueue_style('jquery-modal-css', get_template_directory_uri() . '/js/jquery-modal/jquery.modal.min.css', array(), '20170530');

    //FONTAWASOME
    //wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/fontawesome/css/all.min.css', array(), '20170530');

    //JQUERY UI
    wp_enqueue_style('jquery-ui-theme', get_template_directory_uri() . '/js/jquery-ui/jquery-ui.min.css', array(), '20170530');
    wp_enqueue_script('jquery-ui');
    wp_enqueue_script('jquery-ui-dialog');
    wp_enqueue_script('snap-svg', get_template_directory_uri() . '/js/snap.svg-min.js', array('jquery'), '20181217', true);

    /* 201912 gio NO COMMENT
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    */

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('artetonlus-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20170530');
    }

    wp_enqueue_script('jquery-inview', get_template_directory_uri() . '/js/jquery.inview/jquery.inview.min.js', array('jquery'), '20181217', true);

    wp_enqueue_script('artetonlus-script-a-fasce', get_template_directory_uri() . '/js/functions-a-fasce.js', array('jquery'), '20181217', true);
    wp_enqueue_script('artetonlus-script-home', get_template_directory_uri() . '/js/functions-home.js', array('jquery'), '20181217', true);
    wp_enqueue_script('artetonlus-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20181217', true);


    wp_localize_script(
        'artetonlus-script',
        'screenReaderText',
        array(
            'expand' => __('expand child menu', 'artetonlus'),
            'collapse' => __('collapse child menu', 'artetonlus'),
        )
    );
    wp_localize_script(
        'artetonlus-script',
        'artetonlus',
        array(
            'language' => (defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'it'),
        )
    );

}

add_action('wp_enqueue_scripts', 'artetonlus_scripts');

/**
 * Enqueue styles for the block-based editor.
 *
 * @since Artet onlus 1.6
 */
function artetonlus_block_editor_styles()
{
    // Block styles.
    wp_enqueue_style('artetonlus-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20190102');
    wp_enqueue_style('artetonlus-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '20190102');
}

add_action('enqueue_block_editor_assets', 'artetonlus_block_editor_styles');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array (Maybe) filtered body classes.
 * @since Artet onlus 1.0
 *
 */
function artetonlus_body_classes($classes)
{
    // Adds a class of custom-background-image to sites with a custom background image.
    if (get_background_image()) {
        $classes[] = 'custom-background-image';
    }

    // Adds a class of group-blog to sites with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of no-sidebar to sites without active sidebar.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}

add_filter('body_class', 'artetonlus_body_classes');

/**
 * Converts a HEX value to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 *
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 * @since Artet onlus 1.0
 *
 */
function artetonlus_hex2rgb($color)
{
    $color = trim($color, '#');

    if (strlen($color) === 3) {
        $r = hexdec(substr($color, 0, 1) . substr($color, 0, 1));
        $g = hexdec(substr($color, 1, 1) . substr($color, 1, 1));
        $b = hexdec(substr($color, 2, 1) . substr($color, 2, 1));
    } elseif (strlen($color) === 6) {
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));
    } else {
        return array();
    }

    return array(
        'red' => $r,
        'green' => $g,
        'blue' => $b,
    );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array $size Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 *
 * @return string A source size value for use in a content image 'sizes' attribute.
 * @since Artet onlus 1.0
 *
 */
function artetonlus_content_image_sizes_attr($sizes, $size)
{
    $width = $size[0];

    if (840 <= $width) {
        $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
    }

    if ('page' === get_post_type()) {
        if (840 > $width) {
            $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
        }
    } else {
        if (840 > $width && 600 <= $width) {
            $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
        } elseif (600 > $width) {
            $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
        }
    }

    return $sizes;
}

add_filter('wp_calculate_image_sizes', 'artetonlus_content_image_sizes_attr', 10, 2);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @param array $attr Attributes for the image markup.
 * @param int $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 *
 * @return array The filtered attributes for the image markup.
 * @since Artet onlus 1.0
 *
 */
function artetonlus_post_thumbnail_sizes_attr($attr, $attachment, $size)
{
    if ('post-thumbnail' === $size) {
        if (is_active_sidebar('sidebar-1')) {
            $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
        } else {
            $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
        }
    }

    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'artetonlus_post_thumbnail_sizes_attr', 10, 3);

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @param array $args Arguments for tag cloud widget.
 *
 * @return array The filtered arguments for tag cloud widget.
 * @since Artet onlus 1.1
 *
 */
function artetonlus_widget_tag_cloud_args($args)
{
    $args['largest'] = 1;
    $args['smallest'] = 1;
    $args['unit'] = 'em';
    $args['format'] = 'list';

    return $args;
}

add_filter('widget_tag_cloud_args', 'artetonlus_widget_tag_cloud_args');


function artetonlus_the_excerpt($limit, $excerpt = null, $source = null, $show_more = false)
{
    if (empty($excerpt)) {
        $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    }

    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '...';
    if ($show_more) {
        $excerpt = $excerpt . ' <a href="' . get_the_permalink() . '">more</a>';
    }
    return $excerpt;
}

function artetonlus_the_excerpt_author($excerpt = null, $source = null, $show_more = false)
{
    if (empty($excerpt)) {
        $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    }
    $excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    //var_dump($excerpt);

    $posizione_punto = strpos($excerpt, '.');
    if ($posizione_punto !== false) {
        $excerpt = substr($excerpt, 0, $posizione_punto);
    }
    return $excerpt;
}

function artetonlus_get_the_archive_title($title)
{
    if (is_category()) {
        $title = sprintf('%s', single_cat_title('', false));
    } elseif (is_tag()) {
        $title = sprintf('%s', single_tag_title('', false));
    } elseif (is_author()) {
        $title = sprintf('%s', '<span class="vcard">' . get_the_author() . '</span>');
    } elseif (is_year()) {
        /* translators: Yearly archive title. %s: Year. */
        $title = sprintf(__('Year: %s'), get_the_date(_x('Y', 'yearly archives date format')));
    } elseif (is_month()) {
        /* translators: Monthly archive title. %s: Month name and year. */
        $title = sprintf(__('Month: %s'), get_the_date(_x('F Y', 'monthly archives date format')));
    } elseif (is_day()) {
        /* translators: Daily archive title. %s: Date. */
        $title = sprintf(__('Day: %s'), get_the_date(_x('F j, Y', 'daily archives date format')));
    } elseif (is_tax('post_format')) {
        if (is_tax('post_format', 'post-format-aside')) {
            $title = _x('Asides', 'post format archive title');
        } elseif (is_tax('post_format', 'post-format-gallery')) {
            $title = _x('Galleries', 'post format archive title');
        } elseif (is_tax('post_format', 'post-format-image')) {
            $title = _x('Images', 'post format archive title');
        } elseif (is_tax('post_format', 'post-format-video')) {
            $title = _x('Videos', 'post format archive title');
        } elseif (is_tax('post_format', 'post-format-quote')) {
            $title = _x('Quotes', 'post format archive title');
        } elseif (is_tax('post_format', 'post-format-link')) {
            $title = _x('Links', 'post format archive title');
        } elseif (is_tax('post_format', 'post-format-status')) {
            $title = _x('Statuses', 'post format archive title');
        } elseif (is_tax('post_format', 'post-format-audio')) {
            $title = _x('Audio', 'post format archive title');
        } elseif (is_tax('post_format', 'post-format-chat')) {
            $title = _x('Chats', 'post format archive title');
        }
    } elseif (is_post_type_archive()) {
        /* translators: Post type archive title. %s: Post type name. */
        $title = sprintf('', post_type_archive_title('', false));
    } elseif (is_tax()) {
        $queried_object = get_queried_object();
        if ($queried_object) {
            $tax = get_taxonomy($queried_object->taxonomy);
            /* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term. */
            $title = sprintf(__('%1$s: %2$s'), $tax->labels->singular_name, single_term_title('', false));
        }
    }

    return $title;
}

add_filter('get_the_archive_title', 'artetonlus_get_the_archive_title', 12, 1);

/**
 * Builds custom HTML.
 *
 * With this function, I can alter WPP's HTML output from my theme's functions.php.
 * This way, the modification is permanent even if the plugin gets updated.
 *
 * @param array $mostpopular
 * @param array $instance
 * @return    string
 */
function my_custom_popular_posts_html_list($popular_posts, $instance)
{
    $output = '';
    ob_start();

    // loop the array of popular posts objects
    foreach ($popular_posts as $popular_post) {
        $post_id = $popular_post->id;
        ?>
        <article id="post-<?php echo $post_id; ?>" <?php post_class('', $post_id); ?> >
            <div class="archive-article-container">
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="<?php echo get_the_permalink($post_id); ?>" rel="bookmark">
                            <?php echo get_the_title($post_id); ?>
                        </a>
                    </h2>
                </header><!-- .entry-header -->
                <div class="entry-summary">
                    <?php echo artetonlus_the_excerpt(120, get_the_excerpt($post_id)); ?>
                </div><!-- .entry-summary -->

                <footer class="entry-footer">
                    <?php artetonlus_entry_meta($post_id); ?>
                    <?php
                    edit_post_link(
                        sprintf(
                        /* translators: %s: Post title. */
                            __('Edit<span class="screen-reader-text"> "%s"</span>', 'artetonlus'),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>',
                        $post_id
                    );
                    ?>
                </footer><!-- .entry-footer -->
            </div>
        </article><!-- #post-<?php echo $post_id; ?> -->
        <?php

    }
    $output = ob_get_clean();

    return $output;
}

add_filter('wpp_custom_html', 'my_custom_popular_posts_html_list', 10, 2);

/**
 * @param WP_Query $query
 */
function artet_archive_per_page( $query ) {
    // It's always better to look for negative then returning
    // Makes our code cleaner and with less indentation
    if ( ! $query->is_main_query() ) {
        return; // Actions on WordPress require no Return
    }

    if ( $query->is_home() ){
        // Here we do our magic
        $query->set( 'category__in', 164 );
        $query->set('ignore_sticky_posts', true);
    } else if($query->is_tax('anno_pubblicazione')){
        $query->set( 'posts_per_page', -1 );
    } else if($query->is_archive('pubblicazioni')){
    } else if($query->is_category(1)){
        //News
        $query->set( 'posts_per_page', 2 );
    }
}
add_filter( 'pre_get_posts', 'artet_archive_per_page' );
