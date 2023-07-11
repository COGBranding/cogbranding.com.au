<?php
get_header();

get_template_part(
    'template-parts/single-project',
    'hero',
);

/* Overview section
* Get the ACF Field group */
$single_project = get_field('single_project');

// Get the subfields from the group
$overview_section = $single_project['overview_section'];
$overview_introduction_text = $overview_section['introduction_text'];
$overview_overview_text = $overview_section['overview_text'];
$overview_scope_items = $overview_section['scope_items'];
$overview_link_items = $overview_section['link_items'];

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


if (have_rows('single_project')) :
    while (have_rows('single_project')) :
        the_row();
        if (have_rows('images_section')) :
            while (have_rows('images_section')) :
                the_row();
                $format = get_sub_field('image_format');
                echo $format;

            endwhile;
        endif;
    endwhile;
endif;
// // Render the first image section
// $images_section_one = $images_section['images_section'];


// foreach($images_section_one as $images){

//     $image_format = $images['image_format'];

//     $fullwidth_image_section = $images['fullwidth_image_section'];

//     print_r ($fullwidth_image_section);

//     get_template_part(
//         'template-parts/single-project',
//         'images',
//         [
//             'image_format' => $image_format,
//         ]
//     );
// }

// if ( have_rows ( 'images_section' ) ) :
//     while( have_rows( 'images_section' ) ) :
//         the_row();

//         print_r(the_row());
//         // Load subfield values
//         $image_format_one = get_sub_field('image_format');
//         echo $image_format_one;
//         die;

//         get_template_part(
//         'template-parts/single-project',
//         'images',
//         [
//             'images_section' => $images_section_one,
//             'image_format' => $image_format_one
//         ]
// );

//     endwhile;
// endif;



get_footer();
