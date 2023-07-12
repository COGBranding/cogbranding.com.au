<?php

/**
 * Get list of all child pages to depth 1 of current page
 * 
 * here pages means service post type
 */
global $post;
$page_id = $post->ID;

$args = array(
    'post_type' => 'services',
    'post_status' => 'publish',
    'post_parent' => $page_id,
    'posts_per_page' => -1,

    'meta_query' => array(
        array(
            'key' => 'show_on_service_page',
            'value' => 1,
            'compare' => '=',
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="section services">
        <div class="row services__row">
            <div class="services__items">
                <?php while ($query->have_posts()) :
                    $query->the_post(); ?>

                    <div class="services__item">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <div class="services__item__acronym">
                                <p class="services__item__acronym__content"></p>
                            </div>

                            <div class="services__item__content">
                                <h4 class="services__item__title heading-xxs">
                                    <?php echo get_the_title(); ?>
                                </h4>

                                <p class="services__item__excerpt">
                                    <?php echo get_the_excerpt(); ?>
                                </p>

                                <a href="<?php echo get_the_permalink(); ?>" class="services__item__link">
                                    Learn more
                                </a>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif;

wp_reset_postdata();
