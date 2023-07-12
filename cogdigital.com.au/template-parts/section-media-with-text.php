<div class="section media-with-text media-with-text--image-<?php echo $args['image_position']; ?>">
    <div class="row media-with-text__row">
        <?php if (isset($args['image_url']) && !empty($args['image_url'])) : ?>
            <div class="media-with-text__col media-with-text__col--image" style="background-image: url('<?php echo $args['image_url']; ?>')"></div>
        <?php endif; ?>

        <div class="media-with-text__col media-with-text__col--content">
            <div class="media-with-text__content">
                <?php if (isset($args['heading_text']) && !empty($args['heading_text'])) : ?>
                    <h2 class="media-with-text__heading heading-lg">
                        <?php echo $args['heading_text']; ?>
                    </h2>
                <?php endif; ?>

                <?php if (isset($args['body_text']) && !empty($args['body_text'])) : ?>
                    <div class="media-with-text__text">
                        <?php echo $args['body_text']; ?>
                    </div>
                <?php endif; ?>

                <?php if ((isset($args['button_one_text']) && !empty($args['button_one_text'])) || (isset($args['button_two_text']) && !empty($args['button_two_text']))) : ?>
                    <div class="media-with-text__btn-wrapper btn--wrapper">
                        <?php if (isset($args['button_one_text']) && !empty($args['button_one_text'])) : ?>
                            <a href="<?php echo $args['button_one_url']; ?>">
                                <button type="button" class="btn btn--white">
                                    <?php echo $args['button_one_text']; ?>
                                </button>
                            </a>
                        <?php endif; ?>

                        <?php if (isset($args['button_two_text']) && !empty($args['button_two_text'])) : ?>
                            <a href="<?php echo $args['button_two_url']; ?>">
                                <button type="button" class="btn btn--primary">
                                    <?php echo $args['button_two_text']; ?>
                                </button>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>