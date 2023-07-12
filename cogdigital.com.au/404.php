<?php
get_header();

function generate_heading_marquee_content()
{
?>
    <div class="section marquee">
        <div class="row marquee__content marquee__content--heading scroll">
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <div class="marquee__item heading-xxl">
                    Page not found
                </div>
            <?php endfor; ?>
        </div>

        <div class="row marquee__content marquee__content--heading scroll">
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <div class="marquee__item heading-xxl">
                    Page not found
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php
}
function generate_body_marquee_content()
{
?>
    <div class="section marquee">
        <div class="row marquee__content marquee__content--body scroll">
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <div class="marquee__item text-uppercase text-uppercase--sm">
                    Page not found
                </div>
            <?php endfor; ?>
        </div>

        <div class="row marquee__content marquee__content--body scroll">
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <div class="marquee__item text-uppercase text-uppercase--sm">
                    Page not found
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php
}
?>

<div class="section error-404 reveal-image">
    <div class="row error-404__row">
        <div class="btn--wrapper">
            <a href="/" class="text-uppercase text-uppercase--sm">Return to home</a>
            <a href="/contact/" class="text-uppercase text-uppercase--sm">Contact us</a>
        </div>
    </div>

    <?php
    // Generate the marquee sections
    generate_heading_marquee_content();
    generate_body_marquee_content();
    generate_heading_marquee_content();
    generate_body_marquee_content();
    generate_heading_marquee_content();
    generate_body_marquee_content();
    ?>
</div>

<?php
// Render the project slider
echo do_shortcode('[get_project_slider]');

// Render the news slider
echo do_shortcode('[get_news_posts]');

get_footer();
