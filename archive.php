<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpbricks
 */
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
                <div class="blog-gallery bgs-posts">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'index' );
					endwhile;
					?>
                </div>
                <div class="clearfix"></div>
                <div class="bgs-pagination col-md-12">
					<?php the_posts_pagination(); ?>
                </div>
			<?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
        </main><!-- .site-main -->
    </div><!-- container -->

<?php
get_sidebar();
get_footer();
