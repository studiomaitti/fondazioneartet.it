<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */
$location = get_field('mkdf_event_location');
$date = get_field('mkdf_event_start_date');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <div class="categories-list">
            <span class="cat-links">

            <span class="screen-reader-text">Categories </span>
            <?php
            $terms = get_the_terms(get_the_ID(), 'category');

            if ($terms && !is_wp_error($terms)) :
                $a_links = array();
                $hide_father = false;
                $a_fathers = array();
                foreach ($terms as $term) {
                    if ($term->parent) {
                        $a_fathers[] = $term->parent;
                        $hide_father = true;
                    }
                    $a_links[] = $term;
                }

                if($hide_father){
                    //recupero i padri
                    foreach ($a_links as $k=>$v){
                        if($v->parent == 0 && in_array($v->term_id, $a_fathers)){
                            unset($a_links[$k]);
                        }
                    }
                }

                $s_links = '';
                $i = 0;
                foreach ($a_links as $k=>$v):
                    $i++;
                    ?>
                    <a href="<?php echo get_category_link($v) ?>" rel="category tag"><?php echo $v->name?></a><?php if($i<count($a_links)){ echo ', ';}?>
                <?php
                endforeach;

            endif; ?>

            </span>
            <?php
            //echo do_shortcode('[easy-social-share]')
            ?>
        </div>
        <div class="post-date">
            <span class="location"><?php echo $location; ?></span> -
            <span class="date"><?php echo $date; ?></span>

        </div>
    </header><!-- .entry-header -->


    <div class="entry-content collapsed">
        <?php the_content(); ?>

        <?php
        wp_link_pages(
            array(
                'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'artetonlus') . '</span>',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'pagelink' => '<span class="screen-reader-text">' . __('Page', 'artetonlus') . ' </span>%',
                'separator' => '<span class="screen-reader-text">, </span>',
            )
        );

        ?>
        <div class="gradient"></div>
    </div><!-- .entry-content -->

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
</article><!-- #post-<?php the_ID(); ?> -->
