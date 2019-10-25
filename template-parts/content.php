<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpbricks
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="post-head">

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		$author          = get_the_author();
		$author_id       = get_the_author_meta( 'ID' );
		$avatar_full_url = esc_url( get_avatar_url( $author_id ) );
		$avatar_url      = explode( "?", $avatar_full_url );
		?>
        <ul class="publish-details">
			<?php
			if ( 'post' === get_post_type() ) : ?>
                <li class="post_date">
                    <i class="fa fa fa-clock-o"></i>
					<?php wpbricks_posted_on(); ?>
                </li><!-- .entry-meta -->
			<?php
			endif; ?>
            <li class="comments_num">
                <i class="fa fa-comment-o"></i><?php echo esc_html( $post->comment_count, 'wpbricks' ); ?>
            </li>
            <li class="post_by">
				<span class="sub-title">
					Posted by : <?php echo esc_html( $author, 'wpbricks' ); ?>
				</span>
            </li>
        </ul>
        <div class="feature-img">
			<?php
			global $post;
			$thumbnail_id  = get_post_thumbnail_id( $post->ID );
			$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
			if ( ! empty( $thumbnail_id ) ) {
				the_post_thumbnail();
			} ?>
        </div>
    </div><!-- .entry-header -->

    <div class="post-content">
		<?php
		if ( is_category() || is_archive() ) {
			the_excerpt();
		} else { 
			the_content( sprintf(
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
			) );
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpbricks' ),
			'after'  => '</div>',
		) );
		?>
    </div><!-- .entry-content -->

</div><!-- #post-<?php the_ID(); ?> -->
