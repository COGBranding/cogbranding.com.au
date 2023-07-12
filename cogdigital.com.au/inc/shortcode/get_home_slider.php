<?php
function get_home_slider($atts = [])
{
    global $post;

    ob_start();

    // override default attributes with user attributes
    $wp_atts = shortcode_atts(
        array(
            'id' => '',
        ),
        $atts
    );
    $id = $wp_atts['id'];

    // Check if rows exist
    if (have_rows('image_slider', $id)) : ?>

        <div class="section hero-slider">
            <div class="row hero-slider__items">
                <?php
                // Loop through the rows
                while (have_rows('image_slider', $id)) :
                    // Initialise the row
                    the_row();

                    // Get sub fields
                    $selected_project = get_sub_field('select_a_project', $id);
                    $project_subheading = get_sub_field('project_subheading', $id);
                    $left_image = get_sub_field('left_image', $id);
                    $right_image = get_sub_field('right_image', $id);

                    // Get the category assigned to the project
                    $terms = get_the_terms($selected_project, 'categories');
                    $term = !empty($terms) ? esc_html($terms[0]->name) : '';

                    // Hero slider actions
                    $hero_actions =
                        '<div class="hero-slider__item__actions__primary">
                            <div class="hero-slider__item__actions__counter">
                                <span class="hero-slider__item__actions__counter--current heading-md"></span>
                                <span class="hero-slider__item__actions__counter--separator heading-md">/</span>
                                <span class="hero-slider__item__actions__counter--total heading-md"></span>
                            </div>

                            <img class="hero-slider__item__actions__button-next" src="/wp-content/uploads/2023/07/icon-arrow.svg" />
                        </div>

                        <div class="hero-slider__item__actions__secondary">
                            <svg width="36" height="36" xmlns="http://www.w3.org/2000/svg" class="hero-slider__item__loader--back">
	                            <circle cx="18" cy="18" r="14" stroke="#fff" stroke-width="4" fill-opacity="0" />
                            </svg>

                            <svg width="36" height="36" xmlns="http://www.w3.org/2000/svg" class="hero-slider__item__loader--front">
	                            <circle cx="18" cy="18" r="14" stroke="#fff" stroke-width="4" fill-opacity="0" />
                            </svg>
                        </div>';
                ?>

                    <div class="hero-slider__item">
                        <div class="hero-slider__item__col hero-slider__item__col--left" style="background-image: url('<?php echo $left_image; ?>')">
                            <div class="hero-slider__item__col__overlay"></div>

                            <div class="hero-slider__item__meta">
                                <p class="hero-slider__item__category text-uppercase text-uppercase--sm">
                                    <?php echo $term; ?>
                                </p>

                                <a href="<?php echo get_the_permalink($selected_project); ?>" class="hero-slider__item__link text-uppercase text-uppercase--sm">
                                    View project
                                </a>
                            </div>

                            <div class="hero-slider__item__heading">
                                <h2 class="hero-slider__item__title heading-md span-text">
                                    <?php echo get_the_title($selected_project); ?>
                                </h2>

                                <?php if (!empty($project_subheading)) : ?>
                                    <h4 class="hero-slider__item__subheading heading-md span-text">
                                        <?php echo $project_subheading; ?>
                                    </h4>
                                <?php endif; ?>
                            </div>

                            <div class="hero-slider__item__actions show-for-tablet">
                                <?php echo $hero_actions; ?>
                            </div>
                        </div>

                        <div class="hero-slider__item__col hero-slider__item__col--right" style="background-image: url('<?php echo $right_image; ?>')">
                            <div class="hero-slider__item__col__overlay"></div>

                            <div class="hero-slider__item__actions show-for-desktop">
                                <?php echo $hero_actions; ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
<?php endif;

    wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode('get_home_slider', 'get_home_slider');
