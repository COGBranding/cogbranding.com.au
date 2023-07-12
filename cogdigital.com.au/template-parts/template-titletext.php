<div class="service__content_wrapper">
    <div class="service__contents__title">
        <h2><?php ($args['title']) ? _e($args['title'], 'divi') : ""; ?></h2>
    </div>
    <div class="service__contents__subheading">
        <p><?php echo ($args['text']) ?  wp_kses_post($args['text'], 'divi') : ""; ?></p>
    </div>
</div>