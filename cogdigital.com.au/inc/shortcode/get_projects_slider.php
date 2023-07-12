<?php
if (!defined('WPINC')) {
    die;
}

function get_project_slider()
{
    global $post;

    $output = '';
    $display_limit = 6;

    $args = array(
        'post_type' => 'our-work',
        'post_status' => 'publish',
        'orderby' => 'rand',
        'posts_per_page' => $display_limit,

    );

    if ($post) {
        $args['post__not_in'] = array($post->ID);
    }
    $query = new WP_Query($args);

    $displayed_posts = 0;

    // Loop over the posts
    while ($query->have_posts() && $displayed_posts < ($display_limit + 1)) :
        $query->the_post();

        $output .= get_project_item_html();

        $displayed_posts++;
    endwhile;

    wp_reset_postdata();

    // Determine the heading text based on is_singular
    $heading_text = is_singular('our-work') ? 'Up next' : 'Explore our work';

    // Return the final HTML output
    $return_text =
        '<div class="section project-slider">
            <div class="row project-slider__row">
                <div class="project-slider__col">
                    <h2 class="project-slider__col__heading heading-lg">' . $heading_text . '</h2>

                    <div class="project-slider__navigation">
                        <button class="btn--slick btn--slick-prev" id="slickPrev"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg></button>
                        <button class="btn--slick btn--slick-next" id="slickNext"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg></button>
                    </div>
                </div>
                
                <div class="project-slider__items">' . $output . '</div>
            </div>
        </div>';

    return $return_text;
}

function get_project_item_html()
{
    global $post;

    ob_start();

    // Get the category assigned to the project
    $terms = get_the_terms($post->ID, 'categories');
    $term = !empty($terms) ? esc_html($terms[0]->name) : '';
?>

    <div id="post-<?php echo get_the_ID(); ?>" class="project-slider__item" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
        <a href="<?php echo the_permalink(); ?>">
            <div class="project-slider__item__overlay"></div>

            <div class="project-slider__item__content">
                <p class="project-slider__item__category text-uppercase text-uppercase--sm">
                    <?php echo $term; ?>
                </p>

                <h4 class="project-slider__item__title heading-xxs">
                    <?php echo get_the_title(); ?>
                </h4>
            </div>

            <div class="project-slider__item__cta">
                <a href="<?php echo the_permalink(); ?>" class="project-slider__item__cta__link">View project</a>
            </div>
        </a>
    </div>

<?php return ob_get_clean();
}

add_shortcode('get_project_slider', 'get_project_slider');
