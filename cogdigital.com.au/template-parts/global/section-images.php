<?php
if (have_rows('images_section', 'option')) : ?>
    <div class="section images">
        <div class="row images__row">
            <?php while (have_rows('images_section', 'option')) :
                // Initialise
                the_row();

                // Get the subfields
                $image = get_sub_field('image');

                // Loop output            
            ?>

                <?php if (!empty($image)) : ?>
                    <div class="images__item" style="background-image: url('<?php echo $image; ?>')"></div>
                <?php endif; ?>

            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>