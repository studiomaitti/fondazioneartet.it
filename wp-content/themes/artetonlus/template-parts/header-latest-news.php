<?php
$args = array(
    'cat' => __CAT__NEWS_EVENTS__,
    'posts_per_page' => 4
);
$the_query = new WP_Query($args);

if ($the_query->have_posts()) :
    ?>
    <div class="header-section-news">
        <div class="news-list owl-carousel owl-theme">
            <?php
            $i = 0;
            while ($the_query->have_posts()):
                $the_query->the_post();
                $i++;
                $url_thumb = get_the_post_thumbnail_url(null,'thumb-square');
                $style = '';
                if($url_thumb){
                    $style= "background-image: url('{$url_thumb}');";
                }
                $post_date = get_the_date( 'j F Y' );
                ?>
                <div class="item item-<?php echo $i; ?>" style="<?php echo $style; ?>">
                    <a href="<?php echo esc_url(get_permalink()) ?>" title="<?php echo esc_attr(get_the_title()) ?>" rel="bookmark">
                        <span class="post-title"><?php the_title(); ?></span>
                        <span class="post-author">by <?php the_author(); ?></span>
                        <span class="post-date"><?php echo $post_date; ?></span>
                    </a>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
<?php
endif;
wp_reset_postdata();
