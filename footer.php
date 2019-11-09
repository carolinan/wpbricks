<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpbricks
 */

?>
	</div>
	</div><!-- #content -->
	</div>
	<footer id="colophon"
			class="site-footer <?php echo esc_attr( get_theme_mod( 'bricks_footer_size', 'footer-full-width' ) ); ?>">
		<div class="footer_inner">
			<div class="container">
				<?php
				$wpbricks_footer_enable = get_theme_mod( 'bricks_layout_status', '0' );
				if ( ! empty( $wpbricks_footer_enable ) ) {
					?>
					<div class="footer-widget footer-content">
						<div class="row">
							<?php
							$numberof_widgets = get_theme_mod( 'bricks_footer_layout', '4' );
							for ( $i = 1; $i <= $numberof_widgets; $i ++ ) {
								$foorert_widget = get_theme_mod( 'bricks_footer_widgets_' . $i );
								if ( '1' === $numberof_widgets ) {
									?>
									<div class="col-md-12 col-sm-12">
										<?php dynamic_sidebar( $foorert_widget ); ?>
									</div>
									<?php
								} elseif ( '2' === $numberof_widgets ) {
									?>
									<div class="col-md-6 col-sm-6">
										<?php dynamic_sidebar( $foorert_widget ); ?>
									</div>
									<?php
								} elseif ( '3' === $numberof_widgets ) {
									?>
									<div class="col-md-4 col-sm-6">
										<?php dynamic_sidebar( $foorert_widget ); ?>
									</div>
									<?php
								} elseif ( '4' === $numberof_widgets ) {
									?>
									<div class="col-md-3 col-sm-6">
										<?php dynamic_sidebar( $foorert_widget ); ?>
									</div>
									<?php
								}
							}
							?>
						</div>
					</div>
					<?php
				}

				if ( get_theme_mod( 'bricks_copy_write_text_status', '1' ) && get_theme_mod( 'bricks_social_icon_status', '0' ) ) {
					$menu_icon = 'text_with_social';
				} else {
					$menu_icon = '';
				}
				?>
				<div class="bricks_col_main footer-bottom <?php echo esc_attr( get_theme_mod( 'bricks_social_layout', 'right-menu' ) ); echo esc_attr( $menu_icon ); ?>">
					<?php
					if ( get_theme_mod( 'bricks_copy_write_text_status', '1' ) ) {
						?>
						<div class="bricks_col copyright_block">
							<div class="site-info">
								<?php echo wp_kses_post( balanceTags( get_theme_mod( 'text_setting', __( 'Proudly powered by WordPress.', 'wpbricks' ) ) ) ); ?>
							</div><!-- .site-info -->
						</div>
						<?php
					}
					if ( get_theme_mod( 'bricks_social_icon_status', '0' ) ) {
						?>
						<div class="bricks_col social_icons_block">
							<ul class="social_icons">
							<?php
							if ( get_theme_mod( 'Facebook' ) ) {
								?>
								<li class="social-facebook facebook">
									<a href="<?php echo esc_url( get_theme_mod( 'Facebook' ) ); ?>"
									target="_blank"><i class="fa fa-facebook"></i></a>
								</li>
								<?php
							}
							if ( get_theme_mod( 'Google_plus' ) ) {
								?>
								<li class="social-gplus gplus">
									<a href="<?php echo esc_url( get_theme_mod( 'Google_plus' ) ); ?>"
									target="_blank"><i class="fa fa-google-plus"></i></a>
								</li>
								<?php
							}
							if ( get_theme_mod( 'Linkedin' ) ) {
								?>
								<li class="social-linkedin linkedin">
									<a href="<?php echo esc_url( get_theme_mod( 'Linkedin' ) ); ?>"
									target="_blank"><i class="fa fa-linkedin"></i></a>
								</li>
								<?php
							}
							if ( get_theme_mod( 'Twitter' ) ) {
								?>
								<li class="social-twitter twitter">
									<a href="<?php echo esc_url( get_theme_mod( 'Twitter' ) ); ?>"
									target="_blank"><i class="fa fa-twitter"></i></a>
								</li>
								<?php
							}
							if ( get_theme_mod( 'Insta' ) ) {
								?>
								<li class="social-instagram Instagram">
									<a href="<?php echo esc_url( get_theme_mod( 'Insta' ) ); ?>"
									target="_blank"><i class="fa fa-instagram"></i></a>
								</li>
								<?php
							}
							if ( get_theme_mod( 'pinterest' ) ) {
								?>
								<li class="social-pinterest pinterest">
									<a href="<?php echo esc_url( get_theme_mod( 'pinterest' ) ); ?>"
									target="_blank"><i class="fa fa-pinterest"></i></a>
								</li>
								<?php
							}
							?>
							</ul>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

<?php
wp_footer();
