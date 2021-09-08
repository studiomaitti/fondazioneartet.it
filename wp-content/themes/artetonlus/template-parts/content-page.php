<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

	<?php artetonlus_post_thumbnail(); ?>

    <div class="entry-content">
		<?php
		the_content();

		/*
		wp_link_pages(
			array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'artetonlus' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'artetonlus' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			)
		);
		*/
		?>
    </div><!-- .entry-content -->

	<?php
	edit_post_link(
		sprintf(
		/* translators: %s: Post title. */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'artetonlus' ),
			get_the_title()
		),
		'<footer class="entry-footer"><span class="edit-link">',
		'</span></footer><!-- .entry-footer -->'
	);
	?>

</article><!-- #post-<?php the_ID(); ?> -->
