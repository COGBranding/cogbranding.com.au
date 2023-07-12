<?php if (!empty($args['left_image']) || !empty($args['right_image'])) : ?>
    <div class="section single-project__images single-project__images--three-quarter">
        <div class="row single-project__images__row">
            <?php if (!empty($args['left_image'])) : ?>
                <div class="single-project__images__item single-project__images__item--left" style="background-image: url('<?php echo $args['left_image']; ?>')"></div>
            <?php endif; ?>

            <?php if (!empty($args['right_image'])) : ?>
                <div class="single-project__images__item single-project__images__item--right" style="background-image: url('<?php echo $args['right_image']; ?>')"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>