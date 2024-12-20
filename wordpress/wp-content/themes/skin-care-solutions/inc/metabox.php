<?php
/**
* Sidebar Metabox.
*
* @package Skin Care Solutions
*/

$skin_care_solutions_post_sidebar_fields = array(
    'global-sidebar' => array(
        'id'        => 'post-global-sidebar',
        'value' => 'global-sidebar',
        'label' => esc_html__( 'Global sidebar', 'skin-care-solutions' ),
    ),
    'right-sidebar' => array(
        'id'        => 'post-left-sidebar',
        'value' => 'right-sidebar',
        'label' => esc_html__( 'Right sidebar', 'skin-care-solutions' ),
    ),
    'left-sidebar' => array(
        'id'        => 'post-right-sidebar',
        'value'     => 'left-sidebar',
        'label'     => esc_html__( 'Left sidebar', 'skin-care-solutions' ),
    ),
    'no-sidebar' => array(
        'id'        => 'post-no-sidebar',
        'value'     => 'no-sidebar',
        'label'     => esc_html__( 'No sidebar', 'skin-care-solutions' ),
    ),
);

function skin_care_solutions_category_add_form_fields_callback() {
    $skin_care_solutions_image_id = null; ?>
    <div id="category_custom_image"></div>
    <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
    <div style="margin-bottom: 20px;">
        <span><?php esc_html_e('Category Image','skin-care-solutions'); ?></span>
        <a href="#" class="button custom-button-upload" id="custom-button-upload"><?php esc_html_e('Upload Image','skin-care-solutions'); ?></a>
        <a href="#" class="button custom-button-remove" id="custom-button-remove" style="display: none"><?php esc_html_e('Remove Image','skin-care-solutions'); ?></a>
    </div>
    <?php 
}
add_action( 'category_add_form_fields', 'skin_care_solutions_category_add_form_fields_callback' );

function skin_care_solutions_custom_create_term_callback($skin_care_solutions_term_id) {
    // add term meta data
    add_term_meta(
        $skin_care_solutions_term_id,
        'term_image',
        esc_url($_REQUEST['category_custom_image_url'])
    );
}
add_action( 'create_term', 'skin_care_solutions_custom_create_term_callback' );

function skin_care_solutions_category_edit_form_fields_callback($ttObj, $taxonomy) {
    $skin_care_solutions_term_id = $ttObj->term_id;
    $skin_care_solutions_image = '';
    $skin_care_solutions_image = get_term_meta( $skin_care_solutions_term_id, 'term_image', true ); ?>
    <tr class="form-field term-image-wrap">
        <th scope="row"><label for="image"><?php esc_html_e('Image','skin-care-solutions'); ?></label></th>
        <td>
        <?php if ( $skin_care_solutions_image ): ?>
            <span id="category_custom_image">
               <img src="<?php echo $skin_care_solutions_image; ?>" style="width: 100%"/>
            </span>
            <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
            <span>
                <a href="#" class="button custom-button-upload" id="custom-button-upload" style="display: none"><?php esc_html_e('Upload Image','skin-care-solutions'); ?></a>
                <a href="#" class="button custom-button-remove"><?php esc_html_e('Remove Image','skin-care-solutions'); ?></a>                    
            </span>
        <?php else: ?>
            <span id="category_custom_image"></span>
            <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
            <span>
               <a href="#" class="button custom-button-upload" id="custom-button-upload"><?php esc_html_e('Upload Image','skin-care-solutions'); ?></a>
               <a href="#" class="button custom-button-remove" style="display: none"><?php esc_html_e('Remove Image','skin-care-solutions'); ?></a>
            </span>
            <?php endif; ?>
        </td>
    </tr>
    <?php
}
add_action ( 'category_edit_form_fields', 'skin_care_solutions_category_edit_form_fields_callback', 10, 2 );

function skin_care_solutions_edit_term_callback($skin_care_solutions_term_id) {
    $skin_care_solutions_image = '';
    $skin_care_solutions_image = get_term_meta( $skin_care_solutions_term_id, 'term_image' );
    if ( $skin_care_solutions_image )
    update_term_meta( 
        $skin_care_solutions_term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );
    else
    add_term_meta( 
        $skin_care_solutions_term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );
}
add_action( 'edit_term', 'skin_care_solutions_edit_term_callback' );