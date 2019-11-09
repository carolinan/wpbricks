<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpbricks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php
	the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

	if ( 'post' === get_post_type() ) {
		?>
		<div class="entry-meta">
			<?php wpbricks_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
	}
	?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
	<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
	<?php wpbricks_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
