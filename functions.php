<?php
/**
 * WPBricks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpbricks
 */

/**
 * All the actions.
 */
require get_template_directory() . '/inc/action.php';
/**
 * Included all the callback functions of action.
 */
require get_template_directory() . '/inc/action-function.php';

/**
 * All the actions.
 */

require get_template_directory() . '/inc/filter.php';
/**
 * Included all the callback functions of action.
 */
require get_template_directory() . '/inc/filter-function.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Common functions.
 */
require get_template_directory() . '/inc/common-function.php';

/**
 * Extra customizer css additions.
 */
require get_template_directory() . '/inc/bricks-customizer-css.php';

/**
 * Customizer setting page.
 */
require get_template_directory() . '/inc/bricks-settings-page.php';
