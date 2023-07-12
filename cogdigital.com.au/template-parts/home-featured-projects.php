<?php
// Get the ACF relationship field
$featured_projects = get_field('featured_projects');
?>

<div class="section featured-project">
    <?php if ($featured_projects) : ?>
        <div class="row featured-project__items">
            <?php foreach ($featured_projects as $project) :

                // Get the post ID from the $project object
                $post_id = $project->ID;

                // Get the category assigned to the project
                $terms = get_the_terms($post_id, 'categories');
                $term = !empty($terms) ? esc_html($terms[0]->name) : '';

                // Setup this project for WP functions
                $post = get_post($post_id);
                setup_postdata($post);

                // Get the home page image
                $home_page = get_field('home_page');
                $home_page_image = $home_page['home_page_image'];
                $display_home_page_image = !empty($home_page_image) ? $home_page_image['url'] : get_the_post_thumbnail_url();
            ?>
                <a class="featured-project__item" href="<?php the_permalink(); ?>">
                    <div class="featured-project__item__col featured-project__item__col--content">
                        <div class="featured-project__item__title-wrapper">
                            <h2 class="featured-project__item__title text-uppercase text-uppercase--sm">
                                <?php echo the_title(); ?>
                            </h2>

                            <p class="featured-project__item__category text-uppercase text-uppercase--sm">
                                <?php echo $term; ?>
                            </p>
                        </div>

                        <div class="featured-project__item__excerpt body-xl">
                            <?php echo the_excerpt(); ?>
                        </div>
                    </div>

                    <div class="
                    featured-project__item__col
                    featured-project__item__col--image parallax-sm" style="background-image: url('<?php echo $display_home_page_image; ?>');">
                    </div>
                </a>

            <?php endforeach ?>

            <?php
            // Reset post data after the loop
            wp_reset_postdata();
            ?>
        </div>
    <?php endif; ?>
</div>