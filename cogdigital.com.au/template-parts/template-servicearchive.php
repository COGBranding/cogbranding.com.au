<?php
global $post;
$id = $post->ID;
$page_title = get_the_title();

$hero = get_field('global_hero_section', $id);

$hero_section_title = ($hero) ?  $hero['hero_section_title'] : "";
$hero_section_desc = ($hero) ?  $hero['hero_section_desc'] : "";

if ($hero) {
    if ($hero['hero_section_image']) {
        $hero_section_image = $hero['hero_section_image'];
    } else {
        $hero_section_image = "";
    }
}

?>

<div class="section hero">
    <?php
    /**
     * Get template part called servicehero from template-parts > template-servicehero.php
     * sends some dynamic value using args array
     */
    get_template_part(GLOBALTEMPLATEPART, 'hero', [
        'page_title' => $page_title,
        'hero_content' => $hero_section_desc,
        // 'hero_body_text' => $hero_section_desc,
        'hero_image' => $hero_section_image,
    ]);
    ?>
</div>

<?php
/**
 * Get template part called servicechildpage from template-parts > template-servicechildpage.php
 * 
 */
get_template_part(TEMPLATEPART, 'servicechildpage');
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
