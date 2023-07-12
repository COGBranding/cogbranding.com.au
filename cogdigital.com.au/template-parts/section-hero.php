<div class="section hero">
    <div class="row hero__row">
        <div class="hero__content">
            <?php if (!empty($args['page_title'])) : ?>
                <p class="hero__page-title text-uppercase text-uppercase--sm span-text">
                    <?php echo $args['page_title']; ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($args['hero_content'])) : ?>
                <h2 class="hero__heading heading-md span-text">
                    <?php echo $args['hero_content']; ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($args['hero_body_text'])) : ?>
                <p class="hero__body span-text">
                    <?php echo $args['hero_body_text']; ?>
                </p>
            <?php endif; ?>
        </div>

        <?php if (!empty($args['button_one_text']) || !empty($args['button_two_text'])) : ?>
            <div class="hero__btn-wrapper btn--wrapper">
                <?php if (!empty($args['button_one_text'])) : ?>
                    <a href="<?php echo $args['button_one_url']; ?>">
                        <button type="button" class="btn btn--white">
                            <?php echo $args['button_one_text']; ?>
                        </button>
                    </a>
                <?php endif; ?>

                <?php if (!empty($args['button_two_text'])) : ?>
                    <a href="<?php echo $args['button_two_url']; ?>">
                        <button type="button" class="btn btn--primary">
                            <?php echo $args['button_two_text']; ?>
                        </button>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($args['hero_image'])) : ?>
            <div class="hero__image parallax reveal-image" style="background-image: url('<?php echo $args['hero_image']; ?>'"></div>
        <?php endif; ?>
    </div>
</div>

<?php
if (isset($args['display_logo_slider']) && $args['display_logo_slider'] == true && isset($args['slider_id'])) :
    echo do_shortcode('[get_logo_slider id="' . $args['slider_id'] . '"]');
endif;
