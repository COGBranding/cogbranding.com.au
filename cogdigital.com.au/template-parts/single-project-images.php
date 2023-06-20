<?php
$image_format = $args['image_format'];

// Handle diferent image formats based on the selected option
switch ($image_format):
    case 'fullwidth':

        // Render fullwidth image section
        $fullwidth_image_section = $image_section[$args['fullwidth_image_section']];

        // Load the fullwidth image section fields
        $fullwidth_image = $fullwidth_image_section[$args['fullidth_image_section_image']];

        // Layout output ?>
        <div class="section single-project__images">
            <div class="row single-project__images__items single-project__images__items--<?php echo $image_format; ?>">
            <img src="<?php echo $args['fullwidth_image_url']; ?>" alt="">
            </div>
        </div>

    <?php
    break;

    case '75_25':

        // Render 75% + 25% image section
        $image_section_75_25 = $image_section[$args['75%_+_25%_image_section']];

        // Load the 75% + 25% image section fields
        $image_75_25_left = $image_section_75_25[$args['image_75_25_left']];
        $image_75_25_right = $image_section_75_25[$args['image_75_25_right']];                
    break;

    case '50_50':

        // Render 50% + 50% image section
        $image_section_50_50 = $image_section[$args['50%_+_50%_image_section']];

        // Load the 50% + 50% image section fields
        $image_50_50_left = $image_section_50_50[$args['image_50_50_left']];
        $image_50_50_right = $image_section_50_50[$args['image_50_50_right']];
    break;

    case '25_75':

        // Render 25% + 75% image section
        $image_section_25_75 = $image_section[$args['25%_+_75%_image_section']];
        
        // Load the 25% + 75% image section fields
        $image_25_75_left = $image_section_25_75[$args['image_25_75_left']];
        $image_25_75_right = $image_section_25_75[$args['image_25_75_right']];
    break;

    default:
        // Handle default case if necessary
    break;

endswitch;
