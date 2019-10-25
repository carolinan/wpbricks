<?php
/**
 * wpbricks customizer css.
 *
 * @package wpbricks
 */
if ( !defined( 'ABSPATH' ) ) {
	exit;
}
/**
 *  Bricks theme options setting css .
 */
function bricks_customize_option_setting_style() {

	wp_register_style('wpbricks-custom-css', false);
	wp_enqueue_style('wpbricks-custom-css');

	// get all customizer dynamic values.
	$bricks_general_text_font_family    = get_theme_mod( 'bricks_general_text_font_family', 'unset' );
	$bricks_general_text_font_weight    = get_theme_mod( 'bricks_general_text_font_weight', 'unset' );
	$bricks_general_text_font_transform = get_theme_mod( 'bricks_general_text_font_transform', 'none' );
	$bricks_general_text_color          = get_theme_mod( 'bricks_general_text_color', '#000000' );
	$bricks_site_title_color            = get_theme_mod( 'bricks_site_title_color', '#000' );
	$bricks_site_description_color      = get_theme_mod( 'bricks_site_description_color', '#000' );
	$bricks_header_bg_color             = get_theme_mod( 'bricks_header_bg_color', '#fff' );
	$bricks_header_bottom_border        = get_theme_mod( 'bricks_header_bottom_border', 'hidden' );
	$bricks_header_bottom_border_color  = get_theme_mod( 'bricks_header_bottom_border_color', '#fff' );
	$bricks_header_sub_menu_bg_color    = get_theme_mod( 'bricks_header_sub_menu_bg_color', '#fff' );
	$bricks_header_menu_color           = get_theme_mod( 'bricks_header_menu_color', '#000' );
	$bricks_header_sub_menu_color       = get_theme_mod( 'bricks_header_sub_menu_color', '#000' );
	$bricks_footer_top_border           = get_theme_mod( 'bricks_footer_top_border', 'hidden' );
	$bricks_footer_top_border_color     = get_theme_mod( 'bricks_footer_top_border_color', '#000' );
	$bricks_footer_bg_opacity           = get_theme_mod( 'bricks_footer_bg_opacity', '0.4' );
	$bricks_footer_title_color          = get_theme_mod( 'bricks_footer_title_color', '#000000' );
	$bricks_footer_text_color           = get_theme_mod( 'bricks_footer_text_color', '#000000' );

	// general background image display condition
	if ( get_theme_mod( 'bricks_general_background_selection', '0' ) ) {
		$general_bg_img = 'url(' . get_theme_mod( 'bricks_general_background' ) . ')';
	} else {
		$general_bg_img = 'none';
	}

	// general text font size set condition
	if ( 'initial' === get_theme_mod( 'bricks_general_text_font_size', 'initial' ) ) {
		$general_font_size = get_theme_mod( 'bricks_general_text_font_size' );
	} else {
		$general_font_size = get_theme_mod( 'bricks_general_text_font_size' ) . 'px';
	}

	// Site logo width set condition
	if ( get_theme_mod( 'bricks_logo_size', '120' ) ) {
		$logo_width = get_theme_mod( 'bricks_logo_size' ) . 'px';
	}

	// footer background image & color set condition
	if ( 'background-image' === get_theme_mod( 'bricks_footer_background_selection', 'background-color' ) ) {
		$footer_bg_img      = 'url(' . get_theme_mod( 'bricks_footer_bg_image' ) . ')';
		$footer_img_overlay = get_theme_mod( 'bricks_footer_bg_image_overlay', '#fff' );
		$footer_bg_color    = 'transparent';
	} else {
		$footer_bg_img      = 'none';
		$footer_img_overlay = 'transparent';
		$footer_bg_color    = get_theme_mod( 'bricks_footer_bg_color', '#eeeeee' );
	}

	$custom_css = "
	body{
      background-image: {$general_bg_img};
    }
    body h1, body h2, body h3, body h4, body h5, body h6, body span, body p, body a, body li {
      font-family: {$bricks_general_text_font_family};
      font-weight: {$bricks_general_text_font_weight};
      text-transform: {$bricks_general_text_font_transform};
      color: {$bricks_general_text_color};
    }
    body span, body p, body li{
      font-size: {$general_font_size};
    }
    .site-branding .custom-logo-link img {
      width: {$logo_width};
    }
    .site-header .site-branding .site-title a{
        color: {$bricks_site_title_color};
        font-weight: 600;
    }
    .site-header .site-branding p.site-description{
        color: {$bricks_site_description_color};
    }
    .site-header .site-header-inner{
      background-color: {$bricks_header_bg_color};
      border-bottom: {$bricks_header_bottom_border};
      border-color: {$bricks_header_bottom_border_color};
    }
    .sticky-header.transparent-header.header-scroll .site-header .site-header-inner{
      background-color: {$bricks_header_bg_color};
    }
    .sticky-header.transparent-header.header-scroll .site-header .site-header-inner ul.sub-menu{
      background-color: {$bricks_header_sub_menu_bg_color};
    }
    .site-header .main-navigation li a {
      color: {$bricks_header_menu_color};
    }
    .site-header button.menu-toggle i{
      background-color: {$bricks_header_menu_color};
    }
    .site-header .main-navigation ul.sub-menu {
      background-color: {$bricks_header_sub_menu_bg_color};
    }
    .site-header .main-navigation ul.sub-menu li a {
      color: {$bricks_header_sub_menu_color};
    }
    .site-header ul li .menu-btn:before, .site-header ul li .menu-btn:after{
      background-color: {$bricks_header_sub_menu_color};
    }
    .site-footer {
      background-color: {$footer_bg_color};
      background-image: {$footer_bg_img};
      border-top: {$bricks_footer_top_border};
      border-color: {$bricks_footer_top_border_color};
    }
    .site-footer .footer_inner:before{
      background-color: {$footer_img_overlay};
      opacity: {$bricks_footer_bg_opacity};
    }
    .footer-content h2 {
      color: {$bricks_footer_title_color}; 
    }
    .footer-content span, .footer-content ul li span, .footer-content ul li a, .footer-content p, .site-footer .site-info{ 
      color: {$bricks_footer_text_color};
    }";

	wp_add_inline_style( 'wpbricks-custom-css', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'bricks_customize_option_setting_style' );
