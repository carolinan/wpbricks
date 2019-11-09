<?php
/**
 * All the additional functions are in this file.
 *
 * @package wpbricks
 */

/**
 * Checks to see if we're on the homepage or not.
 */
function wpbricks_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Function to sanitize the checkbox value.
 *
 * @param $input
 *
 * @return bool
 */
function wpbricks_sanitize_checkbox( $input ) {
	// Returns true if checkbox is checked.
	return ( ! empty( $input ) ? true : false );
}

/**
 * Function to sanitize the value of selectbox.
 *
 * @param $input
 * @param $setting
 *
 * @return string
 */
function wpbricks_sanitize_select( $input, $setting ) {

	// Input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
	$input = sanitize_key( $input );

	// Get the list of possible select options.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// Return input if valid or return default option.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

/**
 * Function to sanitize the value of opacity box.
 *
 * @param $input
 *
 * @return string
 */
function wpbricks_sanitize_opacitybox( $input ) {
	if ( $input >= 0 && $input <= 1 ) {
		return $input;
	} else {
		return 0;
	}
}

/**
 * Function to sanitize the value of radio button.
 *
 * @param $input
 * @param $setting
 *
 * @return string
 */
function wpbricks_sanitize_radio( $input, $setting ) {

	// Input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
	$input = sanitize_key( $input );

	// Get the list of possible radio box options.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// Return input if valid or return default option.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}
