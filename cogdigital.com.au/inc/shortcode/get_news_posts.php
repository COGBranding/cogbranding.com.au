<?php
if (!defined('WPINC')) {
    die;
}

function get_news_posts($atts)
{
    ob_start();

    global $post;

    $current_post_id = ($post) ? $post->ID : "";

    // Parse the shortcode attributes
    $atts = shortcode_atts(
        array(
            'archive' => false,
        ),
        $atts
    );

    $archive = $atts['archive'];
    $output = '';
    $display_limit = is_home() ? 9 : 8; // If blog page, show 9, else show 8
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Get the current page number
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'DESC',
        'posts_per_page' => $display_limit,
        'post_not_in' => array(
            $current_post_id
        ),
        'paged' => $paged,
    );

    $query = new WP_Query($args);
    $displayed_posts = 0;

    // Loop over the posts
    if ($query->have_posts()) :
        while ($query->have_posts() && $displayed_posts < ($display_limit + 1)) :
            $query->the_post();

            $output .= get_post_html();

            $displayed_posts++;
        endwhile;
    else :
        _e('No posts published yet');
    endif;

    wp_reset_postdata();

    // Determine the class for the news grid container based on is_home()
    $news_grid_class = is_home() ? '' : 'news-grid__slider';


    //pagination
    $pagination_text = '';
    $slick_navigation = '';

    // if ($archive) {
    //     $pagination = get_pagination($query, $paged);
    //     $pagination_text .= $pagination;
    // } else {
    //     $slick_navigation .= get_template_part(
    //         GLOBALTEMPLATEPART,
    //         'slick-navigation',
    //     );
    // }

    // Return the final HTML output
    echo '<div class="section news-grid ' . $news_grid_class . '">
                        <h2 class="news-grid__heading heading-lg">News</h2>
                        <div class="row news-grid__items">'
        . $output .
        '</div>';

    if ($archive) {
        echo get_pagination($query, $paged);
        // $pagination_text .= $pagination;
    } else {
        get_template_part(
            GLOBALTEMPLATEPART,
            'slick-navigation',
        );
    }
    echo '</div>';
    $return_text = ob_get_clean();

    return $return_text;
}

function get_post_html()
{
    ob_start(); ?>

    <article id="post-<?php echo get_the_ID(); ?>" class="news-grid__item" data-id="<?php echo get_the_ID(); ?>">
        <a href="<?php the_permalink(); ?>">
            <div class="news-grid__item__image-wrapper">
                <div class="news-grid__item__featured-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
            </div>

            <div class="news-grid__item__content-wrapper">
                <p class="news-grid__item__publish-date text-uppercase text-uppercase--sm">
                    <?php echo get_the_date(); ?>
                </p>

                <h2 class="news-grid__item__title heading-xxs">
                    <?php the_title(); ?>
                </h2>

                <div class="news-grid__item__excerpt">
                    <?php the_excerpt(); ?>
                </div>

                <a href="<?php echo the_permalink(); ?>" class="news-grid__item__link text-uppercase text-uppercase--sm">
                    Read article
                </a>
            </div>
        </a>
    </article>

<?php
    return ob_get_clean();
}

function get_pagination($query, $paged)
{

    $pagination = paginate_links(
        array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '?paged=%#%',
            'current' => $paged,
            'total' => $query->max_num_pages,
            'prev_text' => __('Previous'),
            'next_text' => __('Next'),
        ),
    );

    //mimics the default for paginate_links()
    $pretext = 'Previous';
    $posttext = 'Next';

    //assuming this set of links goes at bottom of page
    $pre_deco = '<div id="bottom-deco-pre-link" class="prev page-numbers" disabled>' . $pretext . '</div>';
    $post_deco = '<div id="bottom-deco-post-link" class="next page-numbers" disabled>' . $posttext . '</div>';

    //key variable 
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

    //add decorative non-link to first page
    if (1 === $paged) {
        $pagination = $pre_deco . $pagination;
    }

    //add decorative non-link to last page    
    if ($query->max_num_pages ==  $paged) {
        $pagination = $pagination . $post_deco;
    }

    if ($pagination) {
        echo '<div class="pagination">' . $pagination . '</div>';
    }
}

// Register the shortcode with the function
add_shortcode('get_news_posts', 'get_news_posts');
