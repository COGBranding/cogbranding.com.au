<?php
get_header();

get_template_part(
    'template-parts/single-project',
    'hero',
);

/* Overview section
* Get the ACF Field group */
$overview_section = get_field('overview_section');

// Get the subfields from the group
$overview_introduction_text = $overview_section['introduction_text'];
$overview_overview_text = $overview_section['overview_text'];
$overview_scope_items = $overview_section['scope_items'];
$overview_link_items = $overview_section['link_items'];

/**
 * Overview section
 */
get_template_part(
    'template-parts/single-project',
    'overview',
    [
        'introduction_text' => $overview_introduction_text,
        'overview_text' => $overview_overview_text,
        'scope_item' => $overview_scope_items,
        'link_item' => $overview_link_items,
    ]
);


/**
 * Project Details
 * 
 */

if (have_rows('project_detail')) :
    while (have_rows('project_detail')) : // loop through the project_details repeater field of each projects
        the_row();

        $heading_text = get_sub_field('heading_text');
        $body_text = get_sub_field('body_text');

        if (have_rows('images_section')) : ?>
            <div class="section single-project__images__wrapper">
                <?php while (have_rows('images_section')) : // loop through the images_section repeater field of inside project_detail repeater
                    the_row();
                    $layout = get_sub_field('image_format'); //get the format of image display selected
                    $full_image = (get_sub_field('image') != "") ?  get_sub_field('image')['url'] : ""; // get image url of the full width image if empty set it to empty string
                    $left_image = (get_sub_field('left_column_image') != "") ? get_sub_field('left_column_image')['url'] : ""; // get image url of the left column image if empty set it to empty string
                    $right_image = (get_sub_field('right_column_image') != "") ? get_sub_field('right_column_image')['url'] : ""; // get image url of the right column image if empty set it to empty string

                    switch ($layout):  //check the case for selected format and assign template to its respective template name so that it can be used to call the template part
                        case 'fullwidth':
                            $template = 'image_fullwidth';
                            break;
                        case 'three-quarter':
                            $template = 'image_75_25';
                            break;
                        case 'half':
                            $template = 'image_50_50';
                            break;
                        case 'one-quarter':
                            $template = 'image_25_75';
                            break;

                    endswitch;

                    get_template_part('template-parts/our-work/section', $template, [
                        'layout' => $layout,
                        'fullwidth_image' => $full_image,
                        'left_image' => $left_image,
                        'right_image' => $right_image,
                    ]); // get the template part as per $template name


                endwhile; ?>
            </div>
<?php endif;
        get_template_part('template-parts/our-work/section', 'work_details', [
            'heading' => $heading_text,
            'body' => $body_text
        ]);

    endwhile;
endif;

// Render the related projects section
echo do_shortcode('[get_project_slider]');

get_footer();
