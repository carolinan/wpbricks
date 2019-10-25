<?php
/**
 * wpbricks Theme Customizer
 *
 * @package wpbricks
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wpbricks_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

add_action( 'customize_register', 'wpbricks_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wpbricks_customize_preview_js() {
	wp_enqueue_script( 'wpbricks_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'wpbricks_customize_preview_js' );

$custom_header = array(
	'default-image'          => '',
	'width'                  => 1000,
	'height'                 => 500,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $custom_header );

function wpbricks_register_theme_customizer( $wp_customize ) {
	/**
	 * Bricks customizer handle clssses.
	 */
	get_template_part('inc/bricks-customizer','classes') ;
	//require get_template_directory() . '/inc/bricks-customizer-classes.php';

	// Remove second for default
	$wp_customize->remove_section( 'colors' );

	$wp_customize->remove_section( 'header_image' );

	$wp_customize->remove_section( 'background_image' );

	/**
	 * Bricks customize header section.
	 */
	$wp_customize->add_panel( 'header_setings_panel', array(
		'title'      => __( 'Header Settings', 'wpbricks' ),
		'priority'   => 39,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_section( 'header_setings_section', array(
		'title'      => __( 'Basic setting', 'wpbricks' ),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		'panel'      => 'header_setings_panel'
	) );

	$wp_customize->add_section( 'header_layout_section', array(
		'title'      => __( "Layouts", "wpbricks" ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
		'panel'      => 'header_setings_panel'
	) );

	/**
	 * Bricks customize header setting.
	 */
	$wp_customize->add_setting( 'bricks_page_header_setting', array(
		'default'           => false,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_checkbox'
	) );

	$wp_customize->add_setting( 'bricks_header_sticky', array(
		'default'           => false,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_checkbox'
	) );

	$wp_customize->add_setting( 'bricks_header_transparent', array(
		'default'           => false,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_checkbox'
	) );

	$wp_customize->add_setting( 'bricks_logo_size', array(
		'default'           => '200',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_setting( 'bricks_site_title_color', array(
		'default'           => '#000',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_site_description_color', array(
		'default'           => '#000',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_header_size', array(
		'default'           => 'full-width',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_header_bg_color', array(
		'default'           => '#fff',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_header_menu_color', array(
		'default'           => '#000',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_header_sub_menu_bg_color', array(
		'default'           => '#fff',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_header_sub_menu_color', array(
		'default'           => '#000',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_header_layout', array(
		'default'           => 'left-logo-right-menu',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_header_bottom_border', array(
		'default'           => 'hidden',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_header_bottom_border_color', array(
		'default'           => '#fff',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	/**
	 * Bricks customize header controls.
	 */
	$wp_customize->add_control( new WP_Custom_Toggle_Checkbox_control( $wp_customize, 'bricks_page_header_setting', array(
		'label'   => __( 'Display Sticky Header Option Pagewise', 'wpbricks' ),
		'type'    => 'checkbox',
		'section' => 'header_setings_section',
	) ) );

	$wp_customize->add_control( new WP_Custom_Toggle_Checkbox_control( $wp_customize, 'bricks_header_sticky', array(
		'label'           => __( 'Header sticky', 'wpbricks' ),
		'type'            => 'checkbox',
		'section'         => 'header_setings_section',
		'active_callback' => 'wpbricks_header_sticky_status'
	) ) );

	$wp_customize->add_control( new WP_Custom_Toggle_Checkbox_control( $wp_customize, 'bricks_header_transparent', array(
		'label'           => __( 'Header transparent', 'wpbricks' ),
		'type'            => 'checkbox',
		'section'         => 'header_setings_section',
		'active_callback' => 'wpbricks_header_transparent_status',
	) ) );

	$wp_customize->add_control( new WP_Custom_Range_Control( $wp_customize, 'bricks_logo_size', array(
		'label'       => __( 'Logo width', 'wpbricks' ),
		'section'     => 'header_setings_section',
		'active_callback' => 'wpbricks_header_logo_status',
		'input_attrs' => array(
			'min'  => 100,
			'step' => 1,
			'max'  => 250
		)
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_site_title_color', array(
		'label'   => __( 'Site title color', 'wpbricks' ),
		'section' => 'header_setings_section',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_site_description_color', array(
		'label'   => __( 'Site description color', 'wpbricks' ),
		'section' => 'header_setings_section',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_header_size', array(
		'label'   => __( 'Header width', 'wpbricks' ),
		'type'    => 'select',
		'section' => 'header_setings_section',
		'choices' => array(
			'full-width'    => 'Full Width',
			'content-width' => 'Content Width'
		)
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_header_bg_color', array(
		'label'   => __( 'Header background color', 'wpbricks' ),
		'section' => 'header_setings_section',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_header_menu_color', array(
		'label'   => __( 'Main menu text color', 'wpbricks' ),
		'section' => 'header_setings_section',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_header_sub_menu_bg_color', array(
		'label'   => __( 'Sub menu background color', 'wpbricks' ),
		'section' => 'header_setings_section',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_header_sub_menu_color', array(
		'label'   => __( 'Sub menu text color', 'wpbricks' ),
		'section' => 'header_setings_section',
	) ) );

	$wp_customize->add_control( new WP_Custom_Radio_Image_Control( $wp_customize, 'bricks_header_layout', array(
		'label'   => __( 'Header layout', 'wpbricks' ),
		'section' => 'header_layout_section',
		'choices' => array(
			'left-logo-right-menu'           => get_template_directory_uri() . '/images/header-layouts/left-logo-right-menu.png',
			'left-logo-bottom-left-menu'     => get_template_directory_uri() . '/images/header-layouts/left-logo-bottom-left-menu.png',
			'left-logo-bottom-center-menu'   => get_template_directory_uri() . '/images/header-layouts/left-logo-bottom-center-menu.png',
			'left-logo-bottom-right-menu'    => get_template_directory_uri() . '/images/header-layouts/left-logo-bottom-right-menu.png',
			'center-logo-bottom-left-menu'   => get_template_directory_uri() . '/images/header-layouts/center-logo-bottom-left-menu.png',
			'center-logo-bottom-center-menu' => get_template_directory_uri() . '/images/header-layouts/center-logo-bottom-center-menu.png',
			'center-logo-bottom-right-menu'  => get_template_directory_uri() . '/images/header-layouts/center-logo-bottom-right-menu.png',
			'right-logo-bottom-left-menu'    => get_template_directory_uri() . '/images/header-layouts/right-logo-bottom-left-menu.png',
			'right-logo-bottom-center-menu'  => get_template_directory_uri() . '/images/header-layouts/right-logo-bottom-center-menu.png',
			'right-logo-bottom-right-menu'   => get_template_directory_uri() . '/images/header-layouts/right-logo-bottom-right-menu.png',
			'left-menu-right-logo'           => get_template_directory_uri() . '/images/header-layouts/left-menu-right-logo.png',
		)
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_header_bottom_border', array(
		'label'   => __( 'Header bottom border', 'wpbricks' ),
		'type'    => 'select',
		'section' => 'header_setings_section',
		'choices' => array(
			'none '  => 'None',
			'solid'  => 'Solid',
			'double' => 'Double',
			'dotted' => 'Dotted',
			'dashed' => 'Dashed',
			'groove' => 'Groove',
			'inset'  => 'Inset',
			'outset' => 'Outset',
			'ridge'  => 'Ridge',
			'hidden' => 'Hidden'
		)
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_header_bottom_border_color', array(
		'label'   => __( 'Header border bottom color', 'wpbricks' ),
		'section' => 'header_setings_section',
	) ) );

	/**
	 * Bricks customize general section.
	 */
	$wp_customize->add_section( 'general_setting_section', array(
		'title'    => __( 'General Settings', 'wpbricks' ),
		'priority' => 40,
	) );

	/**
	 * Bricks customize general setting.
	 */
	$wp_customize->add_setting( 'bricks_general_text_font_family', array(
		'default'           => 'unset',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_general_text_font_weight', array(
		'default'           => 'initial',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_general_text_font_size', array(
		'default'           => 'initial',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_setting( 'bricks_general_text_font_transform', array(
		'default'           => 'none',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_general_background_selection', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_checkbox'
	) );

	$wp_customize->add_setting( 'bricks_general_background', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url'
	) );

	$wp_customize->add_setting( 'background_color', array(
		'default'           => '#f7f7f7',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color_no_hash'
	) );

	$wp_customize->add_setting( 'bricks_general_text_color', array(
		'default'           => '#000',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	/**
	 * Bricks customize general controls.
	 */
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_general_text_font_family', array(
		'label'   => __( 'Text font family ', 'wpbricks' ),
		'type'    => 'select',
		'section' => 'general_setting_section',
		'choices' => array(
			'unset'                              => 'Default',
			'unset'                              => 'Default',
			'helvetica'                          => 'Helvetica',
			'verdana'                            => 'Verdana',
			'arial'                              => 'Arial',
			'times'                              => 'Times',
			'georgia'                            => 'Georgia',
			'courier'                            => 'Courier',
			'-webkit-body'                       => 'Webkit-Body',
			'inherit'                            => 'Inherit',
			'initial'                            => 'Initial',
			'monospace'                          => 'Monospace',
			'none'                               => 'None',
			'sans-serif'                         => 'Sans-Serif',
			'serif'                              => 'Serif',
		)
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_general_text_font_weight', array(
		'label'   => __( 'Text font weight ', 'wpbricks' ),
		'type'    => 'select',
		'section' => 'general_setting_section',
		'choices' => array(
			'unset'   => 'Default',
			'initial' => 'Initial',
			'normal'  => 'Normal',
			'bold'    => 'Bold',
			'bolder'  => 'Bolder',
			'lighter' => 'Lighter',
			'inherit' => 'Inherit',
		)
	) ) );

	$wp_customize->add_control( 'bricks_general_text_font_size', array(
		'label'   => __( 'Text font size', 'wpbricks' ),
		'type'    => 'number',
		'section' => 'general_setting_section',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_general_text_font_transform', array(
		'label'   => __( 'Text Transform ', 'wpbricks' ),
		'type'    => 'select',
		'section' => 'general_setting_section',
		'choices' => array(
			'none'       => 'Default',
			'capitalize' => 'Capitalize',
			'lowercase'  => 'Lowercase',
			'uppercase'  => 'Uppercase',
		)
	) ) );

	$wp_customize->add_control( new WP_Custom_Toggle_Checkbox_control( $wp_customize, 'bricks_general_background_selection', array(
		'label'   => __( 'Set background image', 'wpbricks' ),
		'type'    => 'checkbox',
		'section' => 'general_setting_section',
	) ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bricks_general_background', array(
		'label'           => __( 'Background image', 'wpbricks' ),
		'section'         => 'general_setting_section',
		'active_callback' => 'wpbricks_general_background_status',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label'           => __( 'Background color', 'wpbricks' ),
		'section'         => 'general_setting_section',
		'active_callback' => 'wpbricks_general_background_color_status',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_general_text_color', array(
		'label'   => __( 'Text color', 'wpbricks' ),
		'section' => 'general_setting_section',
	) ) );

	/**
	 * Bricks customize container section.
	 */
	$wp_customize->add_section( 'container_setting_section', array(
		'title'      => __( "Container Setting", "wpbricks" ),
		'priority'   => 41,
		'capability' => 'edit_theme_options',
	) );

	/**
	 * Bricks customize container setting.
	 */
	$wp_customize->add_setting( 'bricks_container_size', array(
		'default'           => 'container-content-width',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	/**
	 * Bricks customize container controls.
	 */
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_container_size', array(
		'label'   => __( 'Container width', 'wpbricks' ),
		'type'    => 'select',
		'section' => 'container_setting_section',
		'choices' => array(
			'container-full-width'    => 'Full Width',
			'container-content-width' => 'Content Width'
		)
	) ) );

	/**
	 * Bricks customize footer section.
	 */
	$wp_customize->add_panel( 'footer_setings_panel', array(
		'title'      => __( 'Footer Settings', 'wpbricks' ),
		'priority'   => 169,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_section( 'footer_settings_section', array(
		'title'      => __( 'Basic Settings', 'wpbricks' ),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		'panel'      => 'footer_setings_panel'
	) );

	$wp_customize->add_section( 'footer_layout_section', array(
		'title'      => __( "Layouts", 'wpbricks' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
		'panel'      => 'footer_setings_panel'
	) );

	$wp_customize->add_section( 'bricks_social_section', array(
		'title'      => __( 'Social Menu', 'wpbricks' ),
		'priority'   => 3,
		'capability' => 'edit_theme_options',
		'panel'      => 'footer_setings_panel',
	) );

	/**
	 * Bricks customize footer setting.
	 */
	$wp_customize->add_setting( 'bricks_footer_size', array(
		'default'           => 'footer-full-width',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_footer_background_selection', array(
		'default'           => 'background-color',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_footer_bg_image', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url'
	) );

	$wp_customize->add_setting( 'bricks_footer_bg_image_overlay', array(
		'default'           => '#fff',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_footer_bg_opacity', array(
		'default'           => '0',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_opacitybox'
	) );

	$wp_customize->add_setting( 'bricks_footer_bg_color', array(
		'default'           => '#eeeeee',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_footer_title_color', array(
		'default'           => '#000',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_footer_text_color', array(
		'default'           => '#000',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_footer_top_border', array(
		'default'           => 'hidden',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_footer_top_border_color', array(
		'default'           => '#eeeeee',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_setting( 'bricks_copy_write_text_status', array(
		'default'           => true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_checkbox'
	) );

	$wp_customize->add_setting( 'text_setting', array(
		'default'           => 'Proudly powered by WordPress.',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_setting( 'bricks_layout_status', array(
		'default'           => false,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_checkbox'
	) );

	$wp_customize->add_setting( 'bricks_footer_layout', array(
		'default'           => '4',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_radio'
	) );

	$wp_customize->add_setting( 'bricks_footer_widgets_1', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_footer_widgets_2', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_footer_widgets_3', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_footer_widgets_4', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_select'
	) );

	$wp_customize->add_setting( 'bricks_social_icon_status', array(
		'default'           => false,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_checkbox'
	) );

	$wp_customize->add_setting( 'bricks_social_layout', array(
		'default'           => 'right-menu',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wpbricks_sanitize_radio'
	) );

	$wp_customize->add_setting( 'Facebook', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url'
	) );

	$wp_customize->add_setting( 'Google_plus', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url'
	) );

	$wp_customize->add_setting( 'Linkedin', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url'
	) );

	$wp_customize->add_setting( 'Twitter', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url'
	) );

	$wp_customize->add_setting( 'Insta', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url'
	) );

	$wp_customize->add_setting( 'pinterest', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url'
	) );

	/**
	 * Bricks customize footer controls.
	 */
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_footer_size', array(
		'label'   => __( 'Footer width', 'wpbricks' ),
		'type'    => 'select',
		'section' => 'footer_settings_section',
		'choices' => array(
			'footer-full-width'    => 'Full Width',
			'footer-content-width' => 'Content Width',
		)
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_footer_background_selection', array(
		'label'   => __( 'Footer Background ', 'wpbricks' ),
		'type'    => 'select',
		'section' => 'footer_settings_section',
		'choices' => array(
			'background-color' => 'Background Color',
			'background-image' => 'Background Image',
		)
	) ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bricks_footer_bg_image', array(
		'label'           => __( 'Background image', 'wpbricks' ),
		'section'         => 'footer_settings_section',
		'active_callback' => 'wpbricks_footer_bg_image_status',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_footer_bg_image_overlay', array(
		'label'           => __( 'Image overlay color', 'wpbricks' ),
		'section'         => 'footer_settings_section',
		'active_callback' => 'wpbricks_footer_bg_image_status',
	) ) );

	$wp_customize->add_control( new WP_Custom_Opacity_Range_Control( $wp_customize, 'bricks_footer_bg_opacity', array(
		'label'           => __( 'Background opacity', 'wpbricks' ),
		'section'     => 'footer_settings_section',
		'active_callback' => 'wpbricks_footer_bg_image_status',
		'input_attrs' => array(
			'min'  => 0.1,
			'step' => 0.1,
			'max'  => 1
		)
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_footer_bg_color', array(
		'label'           => __( 'Background color', 'wpbricks' ),
		'section'         => 'footer_settings_section',
		'active_callback' => 'wpbricks_bricks_footer_bg_color_status'
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_footer_title_color', array(
		'label'   => __( 'Title color', 'wpbricks' ),
		'section' => 'footer_settings_section',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_footer_text_color', array(
		'label'   => __( 'Text Color', 'wpbricks' ),
		'section' => 'footer_settings_section',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_footer_top_border', array(
		'label'   => __( 'Top border', 'wpbricks' ),
		'type'    => 'select',
		'section' => 'footer_settings_section',
		'choices' => array(
			'none '  => 'None',
			'solid'  => 'Solid',
			'double' => 'Double',
			'dotted' => 'Dotted',
			'dashed' => 'Dashed',
			'groove' => 'Groove',
			'inset'  => 'Inset',
			'outset' => 'Outset',
			'ridge'  => 'Ridge',
			'hidden' => 'Hidden',
		)
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bricks_footer_top_border_color', array(
		'label'   => __( 'Top border color', 'wpbricks' ),
		'section' => 'footer_settings_section',
	) ) );

	$wp_customize->add_control( new WP_Custom_Toggle_Checkbox_control( $wp_customize, 'bricks_copy_write_text_status', array(
		'label'   => __( 'Copyright Status', 'wpbricks' ),
		'type'    => 'checkbox',
		'section' => 'footer_settings_section',
	) ) );

	$wp_customize->add_control( 'text_setting', array(
		'label'           => __( 'Footer Text Here', 'wpbricks' ),
		'type'            => 'textarea',
		'section'         => 'footer_settings_section',
		'active_callback' => 'wpbricks_text_setting_status',
	) );

	$wp_customize->add_control( new WP_Custom_Toggle_Checkbox_control( $wp_customize, 'bricks_layout_status', array(
		'label'   => __( 'Layout Status', 'wpbricks' ),
		'type'    => 'checkbox',
		'section' => 'footer_layout_section',
	) ) );

	$wp_customize->add_control( new WP_Custom_Radio_Image_Control( $wp_customize, 'bricks_footer_layout', array(
		'label'           => __( 'Footer column layout', 'wpbricks' ),
		'type'            => 'radio',
		'section'         => 'footer_layout_section',
		'active_callback' => 'wpbricks_footer_layout_status',
		'choices'         => array(
			'1' => get_template_directory_uri() . '/images/footer-layouts/one-column.png',
			'2' => get_template_directory_uri() . '/images/footer-layouts/two-column.png',
			'3' => get_template_directory_uri() . '/images/footer-layouts/three-column.png',
			'4' => get_template_directory_uri() . '/images/footer-layouts/four-column.png',
		)
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_footer_widgets_1', array(
		'label'           => __( 'First Widgets', 'wpbricks' ),
		'type'            => 'select',
		'section'         => 'footer_layout_section',
		'choices'         => wpbricks_widget_array(),
		'active_callback' => 'wpbricks_footer_widgets_1_status',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_footer_widgets_2', array(
		'label'           => __( 'Second Widgets', 'wpbricks' ),
		'type'            => 'select',
		'section'         => 'footer_layout_section',
		'choices'         => wpbricks_widget_array(),
		'active_callback' => 'wpbricks_footer_widgets_2_status',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_footer_widgets_3', array(
		'label'           => __( 'Third Widgets', 'wpbricks' ),
		'type'            => 'select',
		'section'         => 'footer_layout_section',
		'choices'         => wpbricks_widget_array(),
		'active_callback' => 'wpbricks_footer_widgets_3_status',
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bricks_footer_widgets_4', array(
		'label'           => __( 'Fourth Widgets', 'wpbricks' ),
		'type'            => 'select',
		'section'         => 'footer_layout_section',
		'choices'         => wpbricks_widget_array(),
		'active_callback' => 'wpbricks_footer_widgets_4_status',
	) ) );

	$wp_customize->add_control( new WP_Custom_Toggle_Checkbox_control( $wp_customize, 'bricks_social_icon_status', array(
		'label'    => __( 'Social menu', 'wpbricks' ),
		'type'     => 'checkbox',
		'section'  => 'bricks_social_section',
		'priority' => 1,
	) ) );

	$wp_customize->add_control( new WP_Custom_Radio_Image_Control( $wp_customize, 'bricks_social_layout', array(
		'label'           => __( 'Social menu layout', 'wpbricks' ),
		'type'            => 'radio',
		'priority'        => 2,
		'section'         => 'bricks_social_section',
		'active_callback' => 'wpbricks_social_icon',
		'choices'         => array(
			'social-right-menu' => get_template_directory_uri() . '/images/footer-layouts/social-right.png',
			'social-left-menu'  => get_template_directory_uri() . '/images/footer-layouts/social-left.png'
		)
	) ) );

	$wp_customize->add_control( 'Facebook', array(
		'label'           => __( "Facebook url", 'wpbricks' ),
		'section'         => 'bricks_social_section',
		'type'            => 'url',
		'priority'        => 3,
		'active_callback' => 'wpbricks_social_icon',
	) );

	$wp_customize->add_control( 'Google_plus', array(
		'label'           => __( "Google plus url", 'wpbricks' ),
		'section'         => 'bricks_social_section',
		'type'            => 'url',
		'priority'        => 4,
		'active_callback' => 'wpbricks_social_icon',
	) );

	$wp_customize->add_control( 'Linkedin', array(
		'label'           => __( "Linkedin url", 'wpbricks' ),
		'section'         => 'bricks_social_section',
		'type'            => 'url',
		'priority'        => 5,
		'active_callback' => 'wpbricks_social_icon',
	) );


	$wp_customize->add_control( 'Twitter', array(
		'label'           => __( "Twitter url", 'wpbricks' ),
		'section'         => 'bricks_social_section',
		'type'            => 'url',
		'priority'        => 6,
		'active_callback' => 'wpbricks_social_icon',
	) );

	$wp_customize->add_control( 'Insta', array(
		'label'           => __( "Instagram url", 'wpbricks' ),
		'section'         => 'bricks_social_section',
		'type'            => 'url',
		'priority'        => 7,
		'active_callback' => 'wpbricks_social_icon',
	) );

	$wp_customize->add_control( 'pinterest', array(
		'label'           => __( "Pinterest url", 'wpbricks' ),
		'section'         => 'bricks_social_section',
		'type'            => 'url',
		'priority'        => 8,
		'active_callback' => 'wpbricks_social_icon',
	) );
}

add_action( 'customize_register', 'wpbricks_register_theme_customizer' );
