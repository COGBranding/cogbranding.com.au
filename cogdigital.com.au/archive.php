<?php
get_header(); ?>

<div class="section news-grid ">
    <h2 class="news-grid__heading heading-lg">
        <?php $archive_title = get_the_archive_title();
        echo $archive_title; ?>
    </h2>
    <div class="row news-grid__items">
        <?php

        if (have_posts()) :
            // Loop over the posts
            while (have_posts()) :
                the_post(); ?>
                <article id="post-<?php echo get_the_ID(); ?>" class="news-grid__item" data-id="<?php echo get_the_ID(); ?>">
                    <a href="<?php echo the_permalink(); ?>">
                        <div class="news-grid__item__image-wrapper">
                            <div class="news-grid__item__featured-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                        </div>

                        <div class="news-grid__item__content-wrapper">
                            <p class="news-grid__item__publish-date text-uppercase text-uppercase--sm">
                                <?php echo get_the_date(); ?>
                            </p>

                            <h2 class="news-grid__item__title heading-xxs">
                                <?php echo get_the_title(); ?>
                            </h2>

                            <div class="news-grid__item__excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php echo the_permalink(); ?>" class="news-grid__item__link text-uppercase text-uppercase--sm">
                                Read article
                            </a>
                        </div>
                    </a>
                </article>
        <?php
            endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer(); ?>