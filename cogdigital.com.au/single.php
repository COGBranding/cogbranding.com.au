<?php

/**
 * The template for displaying all single posts
 */

get_header();

/* Start the Loop */
while (have_posts()) :
    the_post();

    the_title();

    if (is_attachment()) {
        // Parent post navigation.
        the_post_navigation(
            array(
                /* translators: %s: Parent post link. */
                'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone'), '%title'),
            )
        );
    }

    the_content();

    // If comments are open or there is at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) {
    }

    // Previous/next post navigation.
    $next = "->";
    $prev = "<-";

    $next_label     = esc_html__('Next post', 'twentytwentyone');
    $previous_label = esc_html__('Previous post', 'twentytwentyone');

    the_post_navigation(
        array(
            'next_text' => '<p class="meta-nav">' . $next_label . $next . '</p><p class="post-title">%title</p>',
            'prev_text' => '<p class="meta-nav">' . $prev . $previous_label . '</p><p class="post-title">%title</p>',
        )
    );
endwhile; // End of the loop.

get_footer();
