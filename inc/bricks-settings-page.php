<?php
/**
 * Bricks Customizer Menu Add.
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

function bricks_customizer_menu_fun() {
	add_theme_page( 'Bricks Manager', 'Bricks Manager', 'edit_theme_options', 'bricks-theme', 'bricks_customizer_menu_callable_fun' );
}

/**
 * Bricks Customizer Setting form
 */
add_action( 'admin_menu', 'bricks_customizer_menu_fun' );
function bricks_customizer_menu_callable_fun() {
	?>
    <div class="bricks_setting_form">
        <form method="post">

            <div class="bricks-settings">
                <div class="container">
                    <div class="bricks_title">
                        <h1>Bricks Theme Settings</h1>
                    </div>
                    <div class="bricks-setting-buttons">
                        <a href="#site_setting" class="button button-primary button-hero">Site indentity</a>
                        <a href="#header-setting" class="button button-primary button-hero">Header Setting</a>
                        <a href="#general-setting" class="button button-primary button-hero">General Setting</a>
                        <a href="#footer-setting" class="button button-primary button-hero">Footer Setting</a>
                        <a href="#menu-setting" class="button button-primary button-hero">Menu Setting</a>
                        <a href="#footer-setting" class="button button-primary button-hero">Footer Setting</a>
                        <!--<a href="#sup_and_cus" class="button button-primary button-hero button-hero">Support &
                            Customization</a>-->
                    </div>
                </div>
            </div>


            <div class="bricks-settings" id="site_setting">
                <div class="container">
                    <div class="bricks-setting-penal">
                        <div class="Site_Indentity_Setting">
                            <h2>Site Indentity Setting</h2>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>"
                                   class="button button-hero">Site Title</a>
                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>"
                                   class="button button-hero">Tagline</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bricks-settings" id="header-setting">
                <div class="container">
                    <div class="bricks-setting-penal">
                        <div class="logo-styles">
                            <h2>Header Basic Setting</h2>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
                                   class="button button-hero">Add logo</a>
                            </div>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
                                   class="button button-hero">Logo width</a>
                            </div>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
                                   class="button button-hero">Header width</a>
                            </div>
                            <div class="bricks_button_wrap">
                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
                                   class="button button-hero">Header background</a>
                            </div>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
                                   class="button button-hero">Header text color</a>
                            </div>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
                                   class="button button-hero">Header bottom border</a>
                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_setings_section' ) ); ?>"
                                   class="button button-hero">Header bottom border Color</a>
                            </div>
                        </div>

                        <div class="header-layout">
                            <div class="bricks_button_wrap">
                                <h2>Header layout Setting</h2>

                                <div class="layout-images">
                                    <div class="image-select-wrap">
                                        <label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/header-layouts/left-logo-right-menu.png' ) ?>"></label>
                                    </div>
                                    <div class="image-select-wrap">
                                        <label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/header-layouts/center-logo-bottom-center-menu.png' ) ?>"></label>
                                    </div>
                                    <div class="image-select-wrap">
                                        <label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/header-layouts/left-menu-right-logo.png' ) ?>"></label>
                                    </div>
                                </div>
                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header_layout_section' ) ); ?>"
                                   class="button button-hero">Header layout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bricks-settings" id="general-setting">
                <div class="container">
                    <div class="bricks-setting-penal">
                        <div class="menu-general-setting">
                            <h2>General Setting</h2>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=general_setting_section' ) ); ?>"
                                   class="button button-hero">Font Setting</a>
                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=general_setting_section' ) ); ?>"
                                   class="button button-hero">Background Setting</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bricks-settings" id="menu-setting">
                <div class="container">
                    <div class="bricks-setting-penal">
                        <div class="menu-general-setting">
                            <h2>Menus Setting</h2>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=nav_menu[2]' ) ); ?>"
                                   class="button button-hero">Add Menu</a>
                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=menu_locations' ) ); ?>"
                                   class="button button-hero">Menu Location</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bricks-settings" id="footer-setting">
                <div class="container">
                    <div class="bricks-setting-penal">
                        <div class="footer-general-setting">
                            <h2>Footer Setting</h2>
                            <p>Note: In order to display the menu in the Footer section, please enable "Layout Status" option from Footer Settings >> Layouts >> Layout Status.</p>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
                                   class="button button-hero">Footer background color</a>
                            </div>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
                                   class="button button-hero">Footer title color</a>
                            </div>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
                                   class="button button-hero">Footer text Color</a>
                            </div>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
                                   class="button button-hero">Footer top border</a>
                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
                                   class="button button-hero">Footer top border color</a>
                            </div>
                            <div class="bricks_button_wrap">

                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_settings_section' ) ); ?>"
                                   class="button button-hero">Footer text</a>
                            </div>
                        </div>
                        <div class="footer-layout">
                            <h2>Footer layout</h2>
                            <div class="bricks_button_wrap">

                                <div class="layout-images">
                                    <div class="image-select-wrap">
                                        <label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/one-column.png' ) ?>"></label>
                                    </div>
                                    <div class="image-select-wrap">
                                        <label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/two-column.png' ) ?>"></label>
                                    </div>
                                    <div class="image-select-wrap">
                                        <label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/three-column.png' ) ?>"></label>
                                    </div>
                                    <div class="image-select-wrap">
                                        <label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/four-column.png' ) ?>"></label>
                                    </div>
                                </div>
                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer_layout_section' ) ); ?>"
                                   class="button button-hero">Footer layout</a>
                            </div>
                        </div>
                        <div class="footer-social">
                            <h2>Social Media Icons</h2>
                            <div class="bricks_button_wrap">

                                <div class="layout-images">
                                    <div class="image-select-wrap">
                                        <label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/social-left.png' ) ?>"></label>
                                    </div>
                                    <div class="image-select-wrap">
                                        <label><img src="<?php echo esc_url( get_template_directory_uri() . '/images/footer-layouts/social-right.png' ) ?>"></label>
                                    </div>
                                </div>
                                <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=bricks_social_section' ) ); ?>"
                                   class="button button-hero">Social Media Icons</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="bricks-settings" id="sup_and_cus">
                <div class="container">
                    <div class="bricks-setting-penal">
                        <h2>Support & Customization</h2>
                        <div class="bricks_button_wrap">
                            <a class="button button-hero button-hero" href="#">Contact</a>
                        </div>
                    </div>
                </div>
            </div>-->
        </form>
    </div>
	<?php
}
