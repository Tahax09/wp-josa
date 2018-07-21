<?php
/**
 * The template for displaying home page.
 * Template Name: Home Page
 *
 * @package fortyTwo
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<div class="bg-dark">
  <?php get_template_part( 'global-templates/hero' ); ?>
</div>


<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="entry-content">

						<?php the_content(); ?>

						<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
							'after'  => '</div>',
						) );
						?>
					</div>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>