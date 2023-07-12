<?php
$url = (isset($args['imageurl']) && !empty($args['imageurl'])) ? $args['imageurl'] : '';
?>
<div class="single_post_gallery__image">
    <img src="<?php echo esc_url($url) ?>" alt="cog digital gallery images">
</div>