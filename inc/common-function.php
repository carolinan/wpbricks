<?php
/**
 * All the additional functions are in this file.
 */

/*
 * *
 * Checks to see if we're on the homepage or not.
 */

function wpbricks_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Apply inline style to the Storefront header.
 *
 * @uses  get_header_image()
 * @since  2.0.0
 */
function wpbricks_header_styles() {
	$is_header_image = get_header_image();

	if ( $is_header_image ) {
		$header_bg_image = 'url(' . esc_url( $is_header_image ) . ')';
	} else {
		$header_bg_image = 'none';
	}
	if ( $header_bg_image !== 'none' ) {
		$styles = apply_filters( 'wpbricks_header_styles', array(
			'background-image' => $header_bg_image,
		) );
	} else {
		$styles = apply_filters( 'wpbricks_header_styles', array(
			'background-color' => '#fff',
			'color'            => '#000'
		) );
	}


	foreach ( $styles as $style => $value ) {
		echo esc_attr( $style . ': ' . $value . '; ' );
	}
}

/**
 * Function to sanitize the checkbox value.
 *
 * @param $input
 *
 * @return bool
 */
function wpbricks_sanitize_checkbox( $input ) {

	//returns true if checkbox is checked
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

	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key( $input );

	//get the list of possible select options
	$choices = $setting->manager->get_control( $setting->id )->choices;

	//return input if valid or return default option
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

	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key( $input );

	//get the list of possible radio box options
	$choices = $setting->manager->get_control( $setting->id )->choices;

	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}
