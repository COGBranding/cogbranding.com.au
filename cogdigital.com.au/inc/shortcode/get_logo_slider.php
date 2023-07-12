<?php
function get_logo_slider($atts = []) {
    ob_start();

    $atts = array_change_key_case((array) $atts, CASE_LOWER);

    // override default attributes with user attributes
    $wp_atts = shortcode_atts(
        array(
            'id' => '',
            'sections' => 2, // Number of sections (default is 2)
        ),
        $atts
    );
    $id = $wp_atts['id'];
    $sections = intval($wp_atts['sections']); // Convert to integer

    ?>
    <div class="section marquee">
        <?php for ($i = 1; $i <= $sections; $i++) : ?>
            <div class="row marquee__content scroll">
                <?php
                // Check rows exist
                if (have_rows('logo_slider', $id)) :
                    while (have_rows('logo_slider', $id)) :
                        the_row();
                        // Load subfields
                        $logo_image = get_sub_field('logo_image');
                        ?>

                        <div class="marquee__item">
                            <img 
                                src="<?php echo $logo_image['url']; ?>"
                                alt="<?php echo $logo_image['alt']; ?>"
                            />
                        </div>

                        <?php
                    endwhile;
                endif;
                ?>
            </div>
        <?php endfor; ?>
    </div>
    <?php

    return ob_get_clean();
}

add_shortcode('get_logo_slider', 'get_logo_slider');