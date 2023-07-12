<?php
// Add the custom field to the user profile page
function add_custom_user_fields($user)
{
    $custom_value = get_user_meta($user->ID, 'custom_wysiwyg_field', true); // Retrieve the saved value
?>
    <h3>Custom WYSIWYG Field</h3>
    <table class="form-table">
        <tr>
            <th><label for="custom_wysiwyg_field">Say something:</label></th>
            <td>
                <?php
                wp_editor($custom_value, 'custom_wysiwyg_field', array('textarea_name' => 'custom_wysiwyg_field'));
                ?>
            </td>
        </tr>
    </table>
<?php
}
add_action('show_user_profile', 'add_custom_user_fields');
add_action('edit_user_profile', 'add_custom_user_fields');

// Save the custom field value
function save_custom_user_fields($user_id)
{
    if (!current_user_can('edit_user', $user_id)) {
        return;
    }

    if (isset($_POST['custom_wysiwyg_field'])) {
        $custom_value = wp_kses_post($_POST['custom_wysiwyg_field']);
        update_user_meta($user_id, 'custom_wysiwyg_field', $custom_value);
    }
}
add_action('personal_options_update', 'save_custom_user_fields');
add_action('edit_user_profile_update', 'save_custom_user_fields');
