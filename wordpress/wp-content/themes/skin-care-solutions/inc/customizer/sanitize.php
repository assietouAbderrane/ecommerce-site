<?php
/**
* Custom Functions.
*
* @package Skin Care Solutions
*/

if( !function_exists( 'skin_care_solutions_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function skin_care_solutions_sanitize_sidebar_option( $skin_care_solutions_input ){

        $skin_care_solutions_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $skin_care_solutions_input,$skin_care_solutions_metabox_options ) ){

            return $skin_care_solutions_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'skin_care_solutions_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function skin_care_solutions_sanitize_checkbox( $skin_care_solutions_checked ) {

		return ( ( isset( $skin_care_solutions_checked ) && true === $skin_care_solutions_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'skin_care_solutions_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function skin_care_solutions_sanitize_select( $skin_care_solutions_input, $skin_care_solutions_setting ) {
        $skin_care_solutions_input = sanitize_text_field( $skin_care_solutions_input );
        $skin_care_solutions_choices = $skin_care_solutions_setting->manager->get_control( $skin_care_solutions_setting->id )->choices;
        return ( array_key_exists( $skin_care_solutions_input, $skin_care_solutions_choices ) ? $skin_care_solutions_input : $skin_care_solutions_setting->default );
    }

endif;