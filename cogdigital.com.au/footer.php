<?php
$phone =   get_theme_mod('cog_phone');
$email =   get_theme_mod('cog_email');
$apt =   get_theme_mod('cog_apt_street');
$addr =   get_theme_mod('cog_full_address');
$fb =   get_theme_mod('custom_facebook_link');
$insta =   get_theme_mod('custom_instagram_link');
$linked =   get_theme_mod('custom_linkedin_link');
$twt =   get_theme_mod('custom_twitter_link');
$newsletter_image = wp_get_attachment_url(get_theme_mod('newsletter_image'));

?>
<footer class="section footer">
    <div class="row footer__row">
        <div class="footer__col">
            <h4 class="footer__heading text-uppercase text-uppercase--sm">
                <?php _e('Talk'); ?>
            </h4>

            <div class="footer__items">
                <p>Call: <a href="tel:+61<?php echo preg_replace("/\s+/", "", $phone) ?>">0<?php echo $phone ?></a><br>
                    Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email ?></a>
                </p>
            </div>
        </div>

        <div class="footer__col">
            <h4 class="footer__heading text-uppercase text-uppercase--sm">
                Meet
            </h4>

            <div class="footer__items">
                <p>
                    <?php echo $apt; ?><br>
                    <?php echo $addr; ?>
                </p>
            </div>
        </div>

        <div class="footer__col">
            <h4 class="footer__heading text-uppercase text-uppercase--sm">
                Subscribe
            </h4>

            <div class="footer__items">
                <a href="#" id="newsletter-popup">
                    Join our newsletter
                </a>
            </div>
        </div>
        <div class="footer__col">
            <h4 class="footer__heading text-uppercase text-uppercase--sm">
                Social
            </h4>

            <div class="footer__items social_links">
                <?php
                if ($fb) {
                    echo '<a href="' . esc_url($fb) . '"><span class="fb_icon"></span></a>';
                }
                if ($insta) {
                    echo '<a href="' . esc_url($insta) . '"><span class="insta_icon"></span></a>';
                }
                if ($twt) {
                    echo '<a href="' . esc_url($twt) . '"><span class="twt_icon"></span></a>';
                }
                if ($linked) {
                    echo '<a href="' . esc_url($linked) . '"><span class="linked_icon"></span></a>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="newsletter-popup">
        <?php if (!empty($newsletter_image)) : ?>
            <div class="newsletter-popup__image" style="background-image: url('<?php echo $newsletter_image; ?>')"></div>
        <?php endif; ?>

        <div class="newsletter-popup__content">
            <h4 class="heading-xxs">Join our newsletter</h4>

            <div class="newsletter-popup__close-icon">
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="newsletter-popup__form">
            <?php echo do_shortcode('[contact-form-7 id="456" title="Newsletter Form"]'); ?>
        </div>
    </div>
</footer>

</body>

</html>
<?php wp_footer();
