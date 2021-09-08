<?php

/**
 * Adds Artetonlus_latestpost widget.
 */
class Artetonlus_LatestPost_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'artetonlus_latestpost', // Base ID
            'Artet Onlus: LatestPost', // Name
            array('description' => __('Latest Post', 'artetonlus'),) // Args
        );
        add_action('widgets_init', function () {
            register_widget('Artetonlus_LatestPost_Widget');
        });
    }

    public $args = array(
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget' => '</div></div>'
    );

    public function widget($args, $instance)
    {

        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        echo '<div class="latest-post-container">';

        $args = array(
                'cat' => 1,
                'posts_per_page' => 4
        );
        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {
            echo '<ul>';
            while ($the_query->have_posts()) {
                $the_query->the_post();
                ?>
                <li>
                    <div class="post-date"><?php echo get_the_date();?></div>
                    <div class="post-title">
                        <?php the_title(sprintf('<a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a>'); ?>
                    </div>
                    <?php if(has_post_thumbnail()): ?>
                    <div class="post-image">
                        <a href="<?php echo esc_url(get_permalink());?>">
                            <?php the_post_thumbnail('thumb-archive')?>
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="post-exerpt">
                        <?php echo artetonlus_the_excerpt(2200); ?>
                    </div>
                </li>
                <?php
            }
            echo '</ul>';
        }

        /* Restore original Post Data */
        wp_reset_postdata();

        echo '</div>';

        echo $args['after_widget'];

    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'artetonlus'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }

}

$aoLatestPostWidget = new Artetonlus_LatestPost_Widget();