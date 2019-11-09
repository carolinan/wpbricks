<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpbricks
 * @since 1.0.0
 * @version 1.0,0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) {
		?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'wpbricks' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'wpbricks' ) ),
					esc_html( number_format_i18n( $comment_count ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			// Are there comments to navigate through?
			?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'wpbricks' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wpbricks' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
			<?php
		}; // Check for comment navigation.
	}

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wpbricks' ); ?></p>
		<?php
	}

	comment_form();
	?>

</div><!-- #comments -->
