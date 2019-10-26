<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpbricks
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site <?php echo esc_attr( wpbricks_sticky_header_info() ); ?>">
	<header id="masthead" class="site-header">
		<div class="site-header-main">
			<div class="site-header-inner <?php echo esc_attr( get_theme_mod( 'bricks_header_layout', 'left-logo-right-menu' ) ); ?> header-<?php echo esc_attr( get_theme_mod( 'bricks_header_size', 'full-width' ) ); ?>">
				<div class="container">
					<div class="bricks_col_main">
						<div class="bricks_col md-main-logo">
							<div class="site-branding">
								<?php
								if ( class_exists( 'WooCommerce' ) ) {
									if ( function_exists( 'YITH_WCWL' ) ) {
										if ( get_option( 'yith_wcwl_enabled' ) === 'yes' ) {
											?>
											<div class="header-wishlist">
												<?php wpbricks_head_wishlist(); ?>
											</div>
											<?php
										}
									}
								}

								if ( has_custom_logo() ) {
									the_custom_logo();
									if ( get_theme_mod( 'header_text', '1' ) ) {
										?>
										<h1 class="site-title <?php echo esc_attr( $wpbricks_class ); ?>">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>"	rel="home"><?php bloginfo( 'name' ); ?></a>
										</h1>
										<?php
										$description = get_bloginfo( 'description', 'display' );
										if ( $description || is_customize_preview() ) {
											?>
											<p class="site-description <?php echo esc_attr( $wpbricks_class ); ?>"><?php echo esc_html( $description ); ?></p>
											<?php
										}
									}
								} elseif ( get_theme_mod( 'header_text', '1' ) ) {
									?>
									<hgroup>
										<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>'	rel='home'><?php bloginfo( 'name' ); ?></a></h1>
										<p class='site-description'><?php bloginfo( 'description' ); ?></p>
									</hgroup>
									<?php
								}
								if ( class_exists( 'WooCommerce' ) ) {
									if ( function_exists( 'wpbricks_header_cart' ) ) {
										?>
										<div class="header-cart text-right">
											<?php wpbricks_header_cart(); ?>
										</div>
										<?php
									}
								}
								?>
							</div><!-- .site-branding -->
						</div>
						<div class="bricks_col md-main-menu">
							<nav id="site-navigation" class="main-navigation" role="navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<i></i><i></i><i></i>
								</button>
								<?php
								wp_nav_menu( array(
									'theme_location' => 'header-menu',
									'menu_id'        => 'primary-menu',
								) );
								?>
							</nav><!-- #site-navigation -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div class="container <?php echo esc_attr( get_theme_mod( 'bricks_container_size', 'container-content-width' ) ); ?>">
		<div id="content" class="site-content">
