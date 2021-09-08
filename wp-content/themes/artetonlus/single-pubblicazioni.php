<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) :
			the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'pubblicazioni' );

            /*
			if ( is_singular( 'attachment' ) ) {
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation(
					array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'artetonlus' ) . '</span> ' .
						               '<span class="screen-reader-text">' . __( 'Next post:', 'artetonlus' ) . '</span> ' .
						               '<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'artetonlus' ) . '</span> ' .
						               '<span class="screen-reader-text">' . __( 'Previous post:', 'artetonlus' ) . '</span> ' .
						               '<span class="post-title">%title</span>',
                        'in_same_term' => true
					)
				);
			}
            */

			// End of the loop.
		endwhile;
		?>

    </main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
