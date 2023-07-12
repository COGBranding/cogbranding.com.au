<?php
get_header();
while (have_posts()) :
    the_post();
    $post_category = get_the_category();
    $post_hero_background = "#f69651";
?>

    <div class="section single-post__hero " style="background-color: <?php echo $post_hero_background; ?>">
        <div class="row single-post__hero__row">
            <h1 class="single-post__hero__title heading-xl">
                <?php the_title(); ?>
            </h1>

            <div class="single-post__hero__content-row">
                <div class="single-post__hero__content__col single-post__hero__content__col--content">
                    <div class="single-post__hero__content">
                        <?php the_excerpt(); ?>
                    </div>
                    <?php if (!empty($post_category)) { ?>
                        <div class="single-post__hero__meta">
                            <p class="single-post__hero__category text-uppercase text-uppercase--sm">
                                <?php echo $post_category[0]->cat_name; ?>
                            </p>

                            <p class="single-post__hero__publish-date text-uppercase text-uppercase--sm">
                                <?php echo get_the_date(); ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>

                <div class="single-post__hero__content__col single-post__hero__content__col--image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">

                </div>
            </div>
        </div>
    </div>

    <div class="single-post__contents">
        <?php
        if (have_rows('flexible_layout_contents')) :
            while (have_rows('flexible_layout_contents')) :
                the_row();

                $layout = get_row_layout();

                switch ($layout):

                    case 'media_with_text':
                        // Load subfields
                        $image_position = get_sub_field('image_position');
                        $image = get_sub_field('image');
                        $heading_text = get_sub_field('heading_text');
                        $body_text = get_sub_field('body_text');
                        $button_one_text = get_sub_field('button_one_text');
                        $button_one_url = get_sub_field('button_one_url');
                        $button_two_text = get_sub_field('button_two_text');
                        $button_two_url = get_sub_field('button_two_url');

                        get_template_part(
                            '/template-parts/section',
                            'media-with-text',
                            [
                                'image_position' => $image_position,
                                'image_url' => $image,
                                'heading_text' => $heading_text,
                                'body_text' => $body_text,
                                'button_one_text' => $button_one_text,
                                'button_one_url' => $button_one_url,
                                'button_two_text' => $button_two_text,
                                'button_two_url' => $button_two_url,
                            ]
                        );
                        break;
                    case 'image':

                        $image = get_sub_field('image');
                        echo '<div class="single_post_image"><img src="' . $image . '" alt="cog-digital ' . get_the_title() . '-single"></div>';
                        break;
                    case 'title_with_text':

                        $title = get_sub_field('title');
                        $content = get_sub_field('text');
                        $layout = get_sub_field('layout');

                        get_template_part(GLOBALTEMPLATEPART, 'title_text', [
                            'title' => $title,
                            'text' => $content,
                            'layout' => $layout
                        ]);
                        break;
                    case 'logo_slider':

                        $sliderid = get_sub_field('slider');

                        echo do_shortcode('[get_logo_slider id="' . $sliderid . '"]');
                        break;
                    case 'gallery':
                        $gallery = get_sub_field('images');

                        if (!empty($gallery)) {
                            echo '<div class="single_post_gallery">';

                            foreach ($gallery as $image) {
                                get_template_part(GLOBALTEMPLATEPART, 'gallery', [
                                    'imageurl' => $image,
                                ]);
                            }
                            echo '</div>';
                        }
                        break;
                    default:
                        break;

                endswitch;
            endwhile;
        else :
            echo '<div class="section single-project__overview"><div class="row single-post__blog-content">';
            $post_content = get_the_content(); // Get the post content

            $updated_content = preg_replace('/\[.*?\]/', '', $post_content);

            echo $updated_content;

            echo '</div></div>';
        endif;
        ?>
    </div>

<?php
    // Render the post author section
    echo do_shortcode('[get_post_author]');

endwhile;
echo do_shortcode('[get_news_posts]');

get_footer();
