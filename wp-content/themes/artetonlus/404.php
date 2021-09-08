<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Artet_magazine
 * @since Artet onlus 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title" style="font-size: 30px;"><?php _e( 'That page can&rsquo;t be found.', 'artetonlus' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content" style="font-size: 22px;">
                <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'artetonlus' ); ?></p>

				<?php get_search_form(); ?>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->

    </main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
