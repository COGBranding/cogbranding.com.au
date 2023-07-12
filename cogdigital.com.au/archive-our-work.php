<?php
get_header();
?>

<div class="section our-work__hero">
    <div class="row our-work__hero__row">
        <h1 class="our-work__hero__title heading-lg">
            Work
        </h1>
    </div>
</div>

<div class="section our-work">
    <div class="row our-work__items">
        <?php

        $args = array(
            'post_type' => 'our-work',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'hide_from_projects_page',
                    'value' => '0',
                    'compare' => '='
                ),
            ),
        );

        $query = new WP_Query($args);

        // Loop over the projects
        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post();

                // Get the category assigned to the project
                $terms = get_the_terms($post, 'categories');
                $term = !empty($terms) ? esc_html($terms[0]->name) : '';

                // Only show projects where hide_from_projects_page is not set to true
                // Loop output
        ?>
                <div id="post-<?php echo get_the_ID(); ?>" class="our-work__item" data-id="<?php echo get_the_ID(); ?>">
                    <a href="<?php echo get_the_permalink(); ?>">
                        <div class="our-work__item__image parallax-sm reveal-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>

                        <div class="our-work__item__content">
                            <div class="our-work__item__title-wrapper">
                                <h2 class="our-work__item__title heading-xs font-reg">
                                    <?php echo get_the_title(); ?>
                                </h2>

                                <p class="our-work__item__category text-uppercase text-uppercase--sm">
                                    <?php echo $term; ?>
                                </p>
                            </div>

                            <p class="our-work__item__excerpt">
                                <?php echo get_the_excerpt(); ?>
                            </p>
                        </div>
                    </a>
                </div>
        <?php


            endwhile;
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
