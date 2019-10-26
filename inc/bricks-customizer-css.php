<?php
/**
 * WPBricks customizer css.
 *
 * @package wpbricks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WPBricks theme options setting css.
 */
function wpbricks_customize_option_setting_style() {

	wp_register_style( 'wpbricks-custom-css', false );
	wp_enqueue_style( 'wpbricks-custom-css' );

	// Get all customizer dynamic values.
	$wpbricks_general_text_font_family    = esc_attr( get_theme_mod( 'bricks_general_text_font_family', 'unset' ) );
	$wpbricks_general_text_font_weight    = esc_attr( get_theme_mod( 'bricks_general_text_font_weight', 'unset' ) );
	$wpbricks_general_text_font_transform = esc_attr( get_theme_mod( 'bricks_general_text_font_transform', 'none' ) );
	$wpbricks_general_text_color          = esc_attr( get_theme_mod( 'bricks_general_text_color', '#000000' ) );
	$wpbricks_site_title_color            = esc_attr( get_theme_mod( 'bricks_site_title_color', '#000' ) );
	$wpbricks_site_description_color      = esc_attr( get_theme_mod( 'bricks_site_description_color', '#000' ) );
	$wpbricks_header_bg_color             = esc_attr( get_theme_mod( 'bricks_header_bg_color', '#fff' ) );
	$wpbricks_header_bottom_border        = esc_attr( get_theme_mod( 'bricks_header_bottom_border', 'hidden' ) );
	$wpbricks_header_bottom_border_color  = esc_attr( get_theme_mod( 'bricks_header_bottom_border_color', '#fff' ) );
	$wpbricks_header_sub_menu_bg_color    = esc_attr( get_theme_mod( 'bricks_header_sub_menu_bg_color', '#fff' ) );
	$wpbricks_header_menu_color           = esc_attr( get_theme_mod( 'bricks_header_menu_color', '#000' ) );
	$wpbricks_header_sub_menu_color       = esc_attr( get_theme_mod( 'bricks_header_sub_menu_color', '#000' ) );
	$wpbricks_footer_top_border           = esc_attr( get_theme_mod( 'bricks_footer_top_border', 'hidden' ) );
	$wpbricks_footer_top_border_color     = esc_attr( get_theme_mod( 'bricks_footer_top_border_color', '#000' ) );
	$wpbricks_footer_bg_opacity           = esc_attr( get_theme_mod( 'bricks_footer_bg_opacity', '0.4' ) );
	$wpbricks_footer_title_color          = esc_attr( get_theme_mod( 'bricks_footer_title_color', '#000000' ) );
	$wpbricks_footer_text_color           = esc_attr( get_theme_mod( 'bricks_footer_text_color', '#000000' ) );

	// General text font size set condition.
	if ( 'initial' === get_theme_mod( 'bricks_general_text_font_size', 'initial' ) ) {
		$general_font_size = esc_attr( get_theme_mod( 'bricks_general_text_font_size' ) );
	} else {
		$general_font_size = esc_attr( get_theme_mod( 'bricks_general_text_font_size' ) ) . 'px';
	}

	// Site logo width set condition.
	if ( get_theme_mod( 'bricks_logo_size', '120' ) ) {
		$logo_width = esc_attr( get_theme_mod( 'bricks_logo_size' ) ) . 'px';
	}

	// Footer background image & color set condition.
	if ( 'background-image' === get_theme_mod( 'bricks_footer_background_selection', 'background-color' ) ) {
		$footer_bg_img      = 'url(' . esc_url( get_theme_mod( 'bricks_footer_bg_image' ) ) . ')';
		$footer_img_overlay = esc_attr( get_theme_mod( 'bricks_footer_bg_image_overlay', '#fff' ) );
		$footer_bg_color    = 'transparent';
	} else {
		$footer_bg_img      = 'none';
		$footer_img_overlay = 'transparent';
		$footer_bg_color    = esc_attr( get_theme_mod( 'bricks_footer_bg_color', '#eeeeee' ) );
	}

	$custom_css = "
		body h1, body h2, body h3, body h4, body h5, body h6, body span, body p, body a, body li {
			font-family: {$wpbricks_general_text_font_family};
			font-weight: {$wpbricks_general_text_font_weight};
			text-transform: {$wpbricks_general_text_font_transform};
			color: {$wpbricks_general_text_color};
		}
		body span, body p, body li{
			font-size: {$general_font_size};
		}
		.site-branding .custom-logo-link img {
			width: {$logo_width};
		}
		.site-header .site-branding .site-title a{
				color: {$wpbricks_site_title_color};
				font-weight: 600;
		}
		.site-header .site-branding p.site-description{
				color: {$wpbricks_site_description_color};
		}
		.site-header .site-header-inner{
			background-color: {$wpbricks_header_bg_color};
			border-bottom: {$wpbricks_header_bottom_border};
			border-color: {$wpbricks_header_bottom_border_color};
		}
		.sticky-header.transparent-header.header-scroll .site-header .site-header-inner{
			background-color: {$wpbricks_header_bg_color};
		}
		.sticky-header.transparent-header.header-scroll .site-header .site-header-inner ul.sub-menu{
			background-color: {$wpbricks_header_sub_menu_bg_color};
		}
		.site-header .main-navigation li a {
			color: {$wpbricks_header_menu_color};
		}
		.site-header button.menu-toggle i{
			background-color: {$wpbricks_header_menu_color};
		}
		.site-header .main-navigation ul.sub-menu {
			background-color: {$wpbricks_header_sub_menu_bg_color};
		}
		.site-header .main-navigation ul.sub-menu li a {
			color: {$wpbricks_header_sub_menu_color};
		}
		.site-header ul li .menu-btn:before, .site-header ul li .menu-btn:after{
			background-color: {$wpbricks_header_sub_menu_color};
		}
		.site-footer {
			background-color: {$footer_bg_color};
			background-image: {$footer_bg_img};
			border-top: {$wpbricks_footer_top_border};
			border-color: {$wpbricks_footer_top_border_color};
		}
		.site-footer .footer_inner:before{
			background-color: {$footer_img_overlay};
			opacity: {$wpbricks_footer_bg_opacity};
		}
		.footer-content h2 {
			color: {$wpbricks_footer_title_color}; 
		}
		.footer-content span, .footer-content ul li span, .footer-content ul li a, .footer-content p, .site-footer .site-info{ 
			color: {$wpbricks_footer_text_color};
		}";

	wp_add_inline_style( 'wpbricks-custom-css', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'wpbricks_customize_option_setting_style' );
