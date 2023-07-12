<div class="section single-project__overview">
    <div class="row single-project__overview__row">
        <div class="single-project__overview__col">
            <div class="section__title_text single-project__content-item <?php (isset($args['layout']) && !empty($args['layout'])) ? _e($args['layout'], 'cog') : ""; ?>">
                <p class="single-project__content-item__heading text-uppercase text-uppercase--sm section__title">
                    <?php (isset($args['title']) && !empty($args['title'])) ? _e($args['title'], 'cog') : ""; ?>
                </p>

                <div class="single-project__content-item__content section__text">
                    <?php echo (isset($args['text']) && !empty($args['text'])) ?  wp_kses_post($args['text'], 'cog') : ""; ?>
                </div>
            </div>
        </div>
    </div>
</div>