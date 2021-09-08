<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */

$post_id = get_the_ID();
$link = get_field('pbl_link');
$anno_pubblicazione = wp_get_post_terms($post_id, 'anno_pubblicazione');
if (!empty($anno_pubblicazione) && count($anno_pubblicazione)) {
    /** @var WP_Term $obj_anno */
    $obj_anno = $anno_pubblicazione[0];
    $anno = $obj_anno->name;
    $anno_id = $obj_anno->term_id;
} else {
    $anno = '';
    $anno_id = 0;
}
?>

<?php if (!empty($anno)): ?>
    <div class="category-title">
        <h2><?php echo __('Publications', 'artetonlus') . ' ' . $anno; ?></h2>
    </div>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <div class="link-to">
            <a target="_blank" rel="noopener noreferrer" href="<?php echo $link; ?>"><span>PUBMED</span></a>
        </div>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<div class="taxonomy-list">
    <!--h2><?php _e('Years of publication', 'artetonlus'); ?></h2-->
    <div class="link-anno-pubbl">
        <?php
        $taxonomies = get_terms(array(
            'taxonomy' => 'anno_pubblicazione',
            'order' => 'DESC'
        ));

        if (!empty($taxonomies)) :
            foreach ($taxonomies as $term) {
                if ($term->parent == 0) {
                    $current_term_id = $anno_id;
                    if ($current_term_id == $term->term_id) {
                        ?>
                        <a rel="noopener noreferrer" href="<?php echo get_term_link($term->term_id); ?>" class="selected"><span><?php echo __('Publications', 'artetonlus').' '.$term->name; ?></span></a>
                        <?php
                    } else {
                        ?>
                        <a rel="noopener noreferrer" href="<?php echo get_term_link($term->term_id); ?>"><span><?php echo __('Publications', 'artetonlus').' '.$term->name; ?></span></a>
                        <?php
                    }
                }
            }
        endif;
        ?>
    </div>
</div><!-- .entry-footer -->
