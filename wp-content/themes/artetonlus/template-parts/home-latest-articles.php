<?php
if (have_posts()) :

    ?>
    <div class="article-list">
        <?php
        // The Loop
        $i = 0;
        $mod = 0;
        while (have_posts()) :
            the_post();
            $i++;
            $css_class = 'post-mod-' . ($mod % 4);
            $mod++;

            $post_id = get_the_ID();
            $css_class .= ' post-i-' . $i;
            $css_class .= ' post-i-mod-' . ($i%2);
            ?>
            <article id="post-<?php echo $post_id; ?>" <?php post_class($css_class); ?>>
                <div class="home-article-container">
                    <header class="entry-header">
                        <h2 class="entry-title"><?php the_title(); ?></h2>
                    </header><!-- .entry-header -->

                    <div class="entry-summary">
                        <?php the_content(); ?>
                    </div><!-- .entry-summary -->

                </div>
            </article><!-- #post-<?php echo $post_id; ?> -->
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
<?php
endif;
?>