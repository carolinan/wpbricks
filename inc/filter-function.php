<?php
/**
 * File include all the filters callback functions.
 */

/**
 * Filter function for excerpt read more
 */
function wpbricks_excerpt_more() {
	global $post;
	return '... <a href="' . esc_url( get_permalink($post->ID) ) . '">' . esc_html__( 'Read More &raquo;', 'wpbricks' ) . '</a>';
}
