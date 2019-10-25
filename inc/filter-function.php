<?php
/**
 * file include all the filters callback functions.
 */

/*
 * Filter function for excerpt read more
 */
function wpbricks_excerpt_more() {
	global $post;
	return '... <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
}