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

$author_id = get_query_var('author');
if (empty($author_id)) {
    exit();
}
$author_info = get_userdata($author_id);
$a_roles = $author_info->roles;
$roles = count($a_roles)?$a_roles[0]:'';
$roles_name = '';
$avatar = get_avatar($author_id);

if($roles){
    switch ($roles){
        case 'editor-in-chief':
            $roles_name = 'Editor in chief';
            break;
        case 'scientific-coordinator':
            $roles_name = 'Scientific coordinator';
            break;
        case 'author':
            $roles_name = '';
            break;
        case 'administrotor':
            $roles_name = 'Editorial office';
            break;
    }
}
if($roles_name){
    $roles_name='<span class="role-name">'.$roles_name.'</span> - ';
}
get_header();

$description = nl2br(get_the_archive_description());
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <header class="page-header">
            <h2 class="page-title">AUTHORS</h2>
        </header><!-- .page-header -->
        <header class="page-header-author">
            <?php the_archive_title('<h1 class="page-title-author">'.$roles_name, '</h1>'); ?>
            <div class="author-avatar">
                <?php echo $avatar; ?>
            </div>

            <div class="taxonomy-description"><?php echo $description; ?></div>
        </header><!-- .page-header -->

        <?php if (have_posts()) : ?>

        <div class="article-list">

            <?php
            // Start the Loop.
            while (have_posts()) :
                the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('template-parts/content');

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
            endif;
            ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
