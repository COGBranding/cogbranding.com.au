<?php
get_header();
while (have_posts()) :
    the_post();
    $post_category = get_the_category();
    $post_hero_background = "#f69651";
?>
<?php
    $id = $post->ID;

    $page_title = get_the_title();

    $hero = get_field('global_hero_section', $id);

    $hero_heading = (!empty($hero['hero_section_title'])) ? $hero['hero_section_title'] : get_the_excerpt();
    $hero_body_text = (!empty($hero['hero_section_desc'])) ? $hero['hero_section_desc'] : "";
    $button_one_text = (!empty($hero['hero_section_button_one_text'])) ? $hero['hero_section_button_one_text'] : "";
    $button_one_url = (!empty($hero['hero_section_button_one_url'])) ? $hero['hero_section_button_one_url'] : "";
    $button_two_text = (!empty($hero['hero_section_button_two_text'])) ? $hero['hero_section_button_two_text'] : "";
    $button_two_url = (!empty($hero['hero_section_button_two_url'])) ? $hero['hero_section_button_two_url'] : "";
    $hero_image = (!empty($hero['hero_section_image'])) ? $hero['hero_section_image'] : get_the_post_thumbnail_url();

    // Render the hero section
    get_template_part(
        GLOBALTEMPLATEPART,
        'hero',
        [
            'page_title' => $page_title,
            'hero_content' => $hero_heading,
            'hero_body_text' => $hero_body_text,
            'button_one_text' => $button_one_text,
            'button_one_url' => $button_one_url,
            'button_two_text' => $button_two_text,
            'button_two_url' => $button_two_url,
            'hero_image' => $hero_image,
        ]
    );
    ?>
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
            echo get_the_content();
        endif;
        ?>
</div>


<?php

    $is_hub_page = get_field('is_hub_page');
    if ($is_hub_page == 1) {
        echo do_shortcode('[get_news_posts]');
    }
endwhile;

get_footer();