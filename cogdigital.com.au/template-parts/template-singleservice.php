<?php
global $post;
$id = $post->ID;

$page_title = get_the_title();

$hero = get_field('global_hero_section', $id);

$hero_heading = $hero['hero_section_title'];
$hero_body_text = $hero['hero_section_desc'];
$button_one_text = $hero['hero_section_button_one_text'];
$button_one_url = $hero['hero_section_button_one_url'];
$button_two_text = $hero['hero_section_button_two_text'];
$button_two_url = $hero['hero_section_button_two_url'];
$hero_image = $hero['hero_section_image'];

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

<?php
if (have_rows('contents_title_text')) : ?>
    <section class="service__contents">
        <?php while (have_rows('contents_title_text')) : the_row();
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            /**
             * Get template part called titletext from template-parts >global > section-title_text.php
             */
            get_template_part(GLOBALTEMPLATEPART, 'title_text', [
                'title' => $title,
                'text' => $text
            ]);

        endwhile;
    else :
        // Do something...
        ?>
        </div>
    <?php endif;
