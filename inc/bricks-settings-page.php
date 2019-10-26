<?php
/**
 * WPBricks Customizer Menu Add.
 *
 * @package wpbricks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function wpbricks_customizer_menu_fun() {
	add_theme_page( 'Bricks Manager', __( 'Bricks Manager', 'wpbricks' ), 'edit_theme_options', 'bricks-theme', 'wpbricks_customizer_menu_callable_fun' );
}

add_action( 'admin_menu', 'wpbricks_customizer_menu_fun' );
/**
 * WPBricks Customizer Setting form
 */
function wpbricks_customizer_menu_callable_fun() {
	?>
	<div class="bricks_setting_form">
		<div class="bricks-settings">
			<div class="container">
				<div class="bricks_title"><h1><?php esc_html_e( 'Bricks Theme Settings', 'wpbricks' ); ?></h1></div>
				<div class="bricks-setting-buttons">
					<a href="#site_setting" class="button button-primary button-hero"><?php esc_html_e( 'Site indentity', 'wpbricks' ); ?></a>
					<a href="#header-setting" class="button button-primary button-hero"><?php esc_html_e( 'Header Setting', 'wpbricks' ); ?></a>
					<a href="#general-setting" class="button button-primary button-hero"><?php esc_html_e( 'General Setting', 'wpbricks' ); ?></a>
					<a href="#footer-setting" class="button button-primary button-hero"><?php esc_html_e( 'Footer Setting', 'wpbricks' ); ?></a>
					<a href="#menu-setting" class="button button-primary button-hero"><?php esc_html_e( 'Menu Setting', 'wpbricks' ); ?></a>
					<a href="#footer-setting" class="button button-primary button-hero"><?php esc_html_e( 'Footer Setting', 'wpbricks' ); ?></a>
				</div>
			</div>
		</div>

		<div class="bricks-settings" id="site_setting">
			<div class="container">
				<div class="bricks-setting-penal">
					<div class="Site_Indentity_Setting">
						<h2><?php esc_html_e( 'Site Indentity Setting', 'wpbricks' ); ?></h2>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Site Title', 'wpbricks' ); ?></a>
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Tagline', 'wpbricks' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bricks-settings" id="header-setting">
				<div class="container">
					<div class="bricks-setting-penal">
						<div class="logo-styles">
							<h2><?php esc_html_e( 'Header Basic Setting', 'wpbricks' ); ?></h2>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Add logo', 'wpbricks' ); ?></a>
							</div>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Logo width', 'wpbricks' ); ?></a>
							</div>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Header width', 'wpbricks' ); ?></a>
							</div>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Header background', 'wpbricks' ); ?></a>
							</div>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Header text color', 'wpbricks' ); ?></a>
							</div>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Header bottom border', 'wpbricks' ); ?></a>
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Header bottom border Color', 'wpbricks' ); ?></a>
							</div>
						</div>

						<div class="header-layout">
							<div class="bricks_button_wrap">
								<h2><?php esc_html_e( 'Header layout Setting', 'wpbricks' ); ?></h2>

								<div class="layout-images">
									<div class="image-select-wrap">
										<label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/header-layouts/left-logo-right-menu.png' ); ?>"></label>
									</div>
									<div class="image-select-wrap">
										<label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/header-layouts/center-logo-bottom-center-menu.png' ); ?>"></label>
									</div>
									<div class="image-select-wrap">
										<label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/header-layouts/left-menu-right-logo.png' ); ?>"></label>
									</div>
								</div>
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_layout_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Header layout', 'wpbricks' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bricks-settings" id="general-setting">
				<div class="container">
					<div class="bricks-setting-penal">
						<div class="menu-general-setting">
							<h2><?php esc_html_e( 'General Setting', 'wpbricks' ); ?></h2>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=general_setting_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Font Setting', 'wpbricks' ); ?></a>
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=general_setting_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Background Setting', 'wpbricks' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bricks-settings" id="menu-setting">
				<div class="container">
					<div class="bricks-setting-penal">
						<div class="menu-general-setting">
							<h2><?php esc_html_e( 'Menus Setting', 'wpbricks' ); ?></h2>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=nav_menu[2]' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Add Menu', 'wpbricks' ); ?></a>
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=menu_locations' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Menu Location', 'wpbricks' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bricks-settings" id="footer-setting">
				<div class="container">
					<div class="bricks-setting-penal">
						<div class="footer-general-setting">
							<h2><?php esc_html_e( 'Footer Setting', 'wpbricks' ); ?></h2>
							<p><?php esc_html_e( 'Note: In order to display the menu in the Footer section, please enable "Layout Status" option from Footer Settings >> Layouts >> Layout Status.', 'wpbricks' ); ?></p>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Footer background color', 'wpbricks' ); ?></a>
							</div>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Footer title color', 'wpbricks' ); ?></a>
							</div>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Footer text Color', 'wpbricks' ); ?></a>
							</div>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Footer top border', 'wpbricks' ); ?></a>
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Footer top border color', 'wpbricks' ); ?></a>
							</div>
							<div class="bricks_button_wrap">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Footer text', 'wpbricks' ); ?></a>
							</div>
						</div>
						<div class="footer-layout">
							<h2><?php esc_html_e( 'Footer layout', 'wpbricks' ); ?></h2>
							<div class="bricks_button_wrap">

								<div class="layout-images">
									<div class="image-select-wrap">
										<label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/one-column.png' ); ?>"></label>
									</div>
									<div class="image-select-wrap">
										<label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/two-column.png' ); ?>"></label>
									</div>
									<div class="image-select-wrap">
										<label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/three-column.png' ); ?>"></label>
									</div>
									<div class="image-select-wrap">
										<label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/four-column.png' ); ?>"></label>
									</div>
								</div>
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_layout_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Footer layout', 'wpbricks' ); ?></a>
							</div>
						</div>
						<div class="footer-social">
							<h2><?php esc_html_e( 'Social Media Icons', 'wpbricks' ); ?></h2>
							<div class="bricks_button_wrap">
								<div class="layout-images">
									<div class="image-select-wrap">
										<label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/social-left.png' ); ?>"></label>
									</div>
									<div class="image-select-wrap">
										<label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/social-right.png' ); ?>"></label>
									</div>
								</div>
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=bricks_social_section' ) ); ?>"
								class="button button-hero"><?php esc_html_e( 'Social Media Icons', 'wpbricks' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	<?php
}
