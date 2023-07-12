<?php
get_header(); ?>

<div class="section page-container">
    <div class="row">
        <div class="page-title heading-lg">
            <?php the_title(); ?>
        </div>

        <div class="page-content">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
