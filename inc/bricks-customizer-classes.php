<?php
/**
 * WPBricks extra customizetion manage classes.
 *
 * @package wpbricks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WPBricks range control manage.
 */
class WPBricks_Custom_Range_Control extends WP_Customize_Control {

	public function render_content() {
		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<div class="cs-range-control">
				<input data-input-type="range" type="range" <?php $this->input_attrs(); ?>
					value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
			</div>
			<div class="cs-range-value">
				<?php echo esc_html( $this->value() . 'px' ); ?>
			</div>
		</label>
		<script type="text/javascript">
			jQuery(window).on("load", function () {
				jQuery(document).on('change', 'input[data-input-type="range"]', function () {
					var val = jQuery(this).val();
					var current_val = val + 'px';
					jQuery(this).parent('.cs-range-control').next('.cs-range-value').html(current_val);
					jQuery(this).val(val);
				});
			});
		</script>
		<?php
	}

}

/**
 * WPBricks range control manage.
 */
class WPBricks_Custom_Opacity_Range_Control extends WP_Customize_Control {

	public function render_content() {
		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<div class="cs-range-control">
				<input input-type="range" type="range" <?php $this->input_attrs(); ?>
					value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
			</div>
			<div class="cs-range-value">
				<?php echo esc_html( $this->value() ); ?>
			</div>
		</label>
		<script type="text/javascript">
			jQuery(window).on("load", function () {
				jQuery(document).on('change', 'input[input-type="range"]', function () {
					var current_val = jQuery(this).val();
					jQuery(this).parent('.cs-range-control').next('.cs-range-value').html(current_val);
					jQuery(this).val(current_val);
				});
			});
		</script>
		<?php
	}

}

/**
 * WPBricks radio with image control manage.
 */
class WPBricks_Custom_Radio_Image_Control extends WP_Customize_Control {

	public function render_content() {

		if ( empty( $this->choices ) ) {
			return;
		}

		$name = '_customize-radio-' . $this->id;

		?>
		<span class="customize-control-title">
			<?php echo esc_attr( $this->label ); ?>
		</span>
		<div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
			<?php foreach ( $this->choices as $value => $label ) : ?>
				<div class="image-select-wrap">
					<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>"
						id="<?php echo esc_attr( $this->id . $value ); ?>"
						name="<?php echo esc_attr( $name ); ?>" <?php $this->link();
					checked( $this->value(), $value ); ?> />
					<label class="headerlayout <?php echo esc_attr( $this->value() ); ?>"
						for="<?php echo esc_attr( $this->id . $value ); ?>">
						<img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>"
							title="<?php echo esc_attr( $value ); ?>">
					</label>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}
}

/**
 * WPBricks layout toggle control manage.
 */
class WPBricks_Custom_Toggle_Checkbox_control extends WP_Customize_Control {

	public function render_content() {
		?>
		<div class="bricks_toggle_switch">
			<span class="customize-control-title bricks_toggle_label"><?php echo esc_html( $this->label ); ?></span>
			<div class="bricks_toggle">
				<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>"
					name="<?php echo esc_attr( $this->id ); ?>" class="bricks_toggle_checkbox"
					value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link();
				checked( $this->value() ); ?>>
				<label class="bricks_toggle_label" for="<?php echo esc_attr( $this->id ); ?>"></label>
			</div>
		</div>
		<?php
	}
}

/**
 * WPBricks logo.
 */
function wpbricks_header_logo_status() {
	$custom_logo = get_theme_mod( 'custom_logo' );
	if ( $custom_logo ) {
		return true;
	} else {
		return false;
	}
}

/**
 * WPBricks header sticky toggle status in header section.
 */
function wpbricks_header_sticky_status() {
	$wpbricks_page_header_setting = get_theme_mod( 'bricks_page_header_setting' );
	if ( $wpbricks_page_header_setting ) {
		return false;
	} else {
		return true;
	}
}

/**
 * WPBricks header transparent toggle status in header section.
 */
function wpbricks_header_transparent_status() {
	$wpbricks_header_sticky       = get_theme_mod( 'bricks_header_sticky' );
	$wpbricks_page_header_setting = get_theme_mod( 'bricks_page_header_setting' );
	if ( $wpbricks_header_sticky ) {
		if ( $wpbricks_page_header_setting ) {
			return false;
		} else {
			return true;
		}
	} else {
		return false;
	}
}

/**
 * WPBricks footer background image status in footer section.
 */
function wpbricks_footer_bg_image_status() {

	$wpbricks_footer_background_selection = get_theme_mod( 'bricks_footer_background_selection' );

	if ( 'background-image' === $wpbricks_footer_background_selection ) {
		return true;
	} else {
		return false;
	}
}

/**
 * WPBricks footer background color status in footer section.
 */
function wpbricks_bricks_footer_bg_color_status() {

	$wpbricks_footer_background_selection = get_theme_mod( 'bricks_footer_background_selection' );

	if ( 'background-color' === $wpbricks_footer_background_selection ) {
		return true;
	} else {
		return false;
	}
}

/**
 * WPBricks footer text status in footer section.
 */
function wpbricks_text_setting_status() {

	$wpbricks_copy_write_text_status = get_theme_mod( 'bricks_copy_write_text_status' );

	if ( $wpbricks_copy_write_text_status ) {
		return true;
	} else {
		return false;
	}
}

/**
 * WPBricks footer widgets toggle status in footer section.
 */
function wpbricks_footer_layout_status() {

	$wpbricks_footer_enable = get_theme_mod( 'bricks_layout_status' );

	if ( $wpbricks_footer_enable ) {
		return true;
	} else {
		return false;
	}
}

/**
 * WPBricks footer widgets-1 status in footer secotion.
 */
function wpbricks_footer_widgets_1_status() {

	if ( 1 <= get_theme_mod( 'bricks_footer_layout' ) && wpbricks_footer_layout_status() ) {
		return true;
	} else {
		return false;
	}
}

/**
 * WPBricks footer widgets-2 status in footer secotion.
 */
function wpbricks_footer_widgets_2_status() {

	if ( 2 <= get_theme_mod( 'bricks_footer_layout' ) && wpbricks_footer_layout_status() ) {
		return true;
	} else {
		return false;
	}
}

/**
 * WPBricks footer widgets-3 status in footer secotion.
 */
function wpbricks_footer_widgets_3_status() {

	if ( 3 <= get_theme_mod( 'bricks_footer_layout' ) && wpbricks_footer_layout_status() ) {
		return true;
	} else {
		return false;
	}
}

/**
 * WPBricks footer widgets-4 status in footer secotion.
 */
function wpbricks_footer_widgets_4_status() {

	if ( 4 <= get_theme_mod( 'bricks_footer_layout' ) && wpbricks_footer_layout_status() ) {
		return true;
	} else {
		return false;
	}
}

/**
 * WPBricks add dynamic dropdown widget in footer secotion.
 */
function wpbricks_widget_array() {

	global $wp_registered_sidebars;

	$sidebars = array( '' => 'select' );

	foreach ( $wp_registered_sidebars as $wp_registered_sidebar ) {

		$sidebars[ strtolower( $wp_registered_sidebar['name'] ) ] = $wp_registered_sidebar['name'];

	}

	return $sidebars;
}

/**
 * WPBricks social icon display condition check.
 */
function wpbricks_social_icon() {

	$wpbricks_footer_enable = get_theme_mod( 'bricks_social_icon_status' );

	if ( $wpbricks_footer_enable ) {
		return true;
	} else {
		return false;
	}
}
