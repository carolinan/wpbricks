<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpbricks
 */

$wpbricks_post_id = get_the_id();
$post_data        = get_post( $wpbricks_post_id );
if ( ! empty( $post_data ) ) {
	?>
	<li class="col-sm-6">
		<div class="blog-containe box-shadow">
			<div class="blog-img">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} else {
					?>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blog-default.jpg" alt="<?php the_title_attribute(); ?>"/>
					<?php
				}
				?>
			</div>
			<div class="blog-details">
				<?php
				// set date formatting
				$date_format_feature = $post_data->post_date;
				$date                = date_create( $date_format_feature );
				$date_format         = date_format( $date, 'M d, Y' );
				$author              = get_the_author();
				$avatar              = get_avatar( $post_data->post_author, 32 );
				$avatar_full_url     = esc_url( get_avatar_url( $post_data->post_author ) );
				$avatar_url          = explode( "?", $avatar_full_url );
				?>
				<h3>
					<a href="<?php the_permalink(); ?>">
						<?php
						the_title();
						?>
					</a>
				</h3>
				<span class="sub-title">
					<img src="<?php echo esc_url( $avatar_url[0] ) . "?s=200"; ?>"
					class="avatar avatar-32 photo">
					<?php
					/* Translators: %S = author name */
					printf( __( 'By %s', 'wpbricks' ), $author );
					?>
				</span>

				<div class="comment-sec">
					<ul>
						<li>
							<i class="fa fa-comments" aria-hidden="true"></i>
							<?php
							echo esc_html( $post_data->comment_count );
							?>
						</li>
						<li>
							<i class="fa fa-calendar" aria-hidden="true"></i>
							<?php
							echo esc_html( $date_format );
							?>
						</li>
					</ul>
				</div>
				<div class="hover-item">
					<div class="hover-item-disabled">
						<?php
						$big        = wp_strip_all_tags( get_the_excerpt(), true );
						$small      = substr( $big, 0, 150 );
						$pieces     = explode( " ", $big );
						$first_part = implode( " ", array_splice( $pieces, 0, 30 ) );
						?>
						<p>
							<?php
							if ( ! empty( $first_part ) ) {
								echo esc_html( $first_part ) . ' ...';
							} else {
								echo esc_html( $first_part );
							}
							?>
						</p>
						<div class="read-more">
							<a href="<?php echo esc_url( get_permalink( $post_data->ID ) ); ?>">
								<?php
								esc_html_e( 'Read More', 'wpbricks' );
								?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</li>
	<?php
}
