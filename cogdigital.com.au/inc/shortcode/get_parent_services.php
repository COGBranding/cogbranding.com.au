<?php
if (!defined('WPINC')) {
    die;
}

function get_parent_services()
{
    global $post;

    $args = array(
        'post_type' => 'services',
        'post_status' => 'publish',
        'post_parent' => 0,
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'show_on_service_page',
                'value' => '1',
                'compare' => '=',
            ),
        ),
    );

    $query = new WP_Query($args);

    ob_start();

    // ACF fields
    $services = get_field('services_section', 'option');
    $services_heading_text = $services['heading_text'];
    $services_body_text = $services['body_text'];

    $services_acronym = get_field('title_acronym');
    $services_class = is_front_page() ? "services--slider" : "";
?>

    <div class="section services <?php echo $services_class; ?>">
        <div class="row services__row">
            <div class="services__content">
                <h2 class="services__heading heading-lg">
                    <?php echo $services_heading_text; ?>
                </h2>

                <p>
                    <?php echo $services_body_text; ?>
                </p>
            </div>

            <div class="services__items">
                <?php if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post(); ?>

                        <div class="services__item">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="services__item__acronym">
                                    <p class="services__item__acronym__content">
                                        <?php echo $services_acronym; ?>
                                    </p>
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

                <?php endwhile;
                endif; ?>
            </div>

            <?php if (is_front_page()) :
                get_template_part(
                    GLOBALTEMPLATEPART,
                    'slick-navigation',
                );
            endif; ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}

add_shortcode('get_parent_services', 'get_parent_services');
