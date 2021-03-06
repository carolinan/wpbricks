<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpbricks
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-head">

		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		$author          = get_the_author();
		$author_id       = get_the_author_meta( 'ID' );
		$avatar_full_url = esc_url( get_avatar_url( $author_id ) );
		$avatar_url      = explode( "?", $avatar_full_url );
		?>
		<ul class="publish-details">
			<?php
			if ( 'post' === get_post_type() ) {
				?>
				<li class="post_date">
					<i class="fa fa fa-clock-o"></i>
					<?php wpbricks_posted_on(); ?>
				</li><!-- .entry-meta -->
				<?php
			}
			?>
			<li class="comments_num">
				<i class="fa fa-comment-o"></i><?php echo esc_html( $post->comment_count ); ?>
			</li>
			<li class="post_by">
				<span class="sub-title">
					<?php
					/* Translators: %S = author name */
					printf( __( 'Posted by %s', 'wpbricks' ), $author );
					?>
				</span>
			</li>
		</ul>
		<?php
		if ( has_post_thumbnail() ) {
			?>
			<div class="feature-img">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php
		}
		?>
	</div><!-- .entry-header -->

	<div class="post-content">
		<?php
		if ( is_category() || is_archive() ) {
			the_excerpt();
		} else {
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wpbricks' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpbricks' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

</div><!-- #post-<?php the_ID(); ?> -->
