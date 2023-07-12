<?php
// Get the hero section background
$background_color = get_field('background_color');
?>

<div class="section single-project__hero" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
    <div class="single-project__hero__overlay"></div>
</div>

<div class="section single-project__hero__content">
    <div class="row single-project__hero__content__row">
        <h1 class="single-project__title hide-text visually-hidden">
            <?php the_title(); ?>
        </h1>

        <div class="single-project__excerpt">
            <?php the_excerpt(); ?>
        </div>
    </div>
</div>