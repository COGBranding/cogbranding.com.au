<?php
function get_post_author()
{
    ob_start();

    // Get post author information
    $author_id = get_the_author_meta('ID');
    $author_first_name = get_the_author_meta('first_name');
    $author_last_name = get_the_author_meta('last_name');
    $author_username = get_the_author_meta('display_name');
    $author_email = get_the_author_meta('user_email');
    $author_description = get_user_meta($author_id, 'custom_wysiwyg_field', true);
    $author_url = get_author_posts_url($author_id);

    // Determine the author name
    $author_name = '';

    if (!empty($author_first_name) && !empty($author_last_name)) {
        $author_name = $author_first_name . ' ' . $author_last_name;
    } elseif (!empty($author_username)) {
        $author_name = $author_username;
    }

    // Get the Gravatar image URL or default image URvL
    $gravatar_url = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($author_email))) . '?s=300';
    $default_avatar_url = get_avatar_url($author_id);

    // Use default avatar if no Gravatar image available
    if (empty($gravatar_url)) {
        $gravatar_url = $default_avatar_url;
    }
?>

    <div class="section post-author">
        <div class="row post-author__row">
            <div class="post-author__col post-author__col--image">
                <img src="<?php echo esc_url($gravatar_url); ?>" alt="Author Avatar" class="post-author__avatar">

                <div class="post-author__emoji heading-sm">
                    ✏️
                </div>
            </div>
            <div class="post-author__col post-author__col--content">
                <div class="post-author__content">
                    <p class="text-uppercase text-uppercase--sm">
                        Author
                    </p>

                    <h2 class="heading-sm">
                        <?php echo $author_name; ?> </h2>
                </div>

				<div class="post-author__meta">
					<?php echo $author_description; ?>

					<a href="<?php echo $author_url; ?>" class="text-uppercase text-uppercase--sm">
						Posts by <?php echo $author_name; ?>
					</a>
				</div>
            </div>
        </div>
    </div>

<?php
    return ob_get_clean();
}

add_shortcode('get_post_author', 'get_post_author');
