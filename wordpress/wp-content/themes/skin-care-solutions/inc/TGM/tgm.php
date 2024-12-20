<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function skin_care_solutions_register_recommended_plugins() {
	$plugins = array(		
		array(
			'name'             => __( 'WooCommerce', 'skin-care-solutions' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'skin_care_solutions_register_recommended_plugins' );