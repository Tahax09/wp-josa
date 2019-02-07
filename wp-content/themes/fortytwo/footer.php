<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php //get_sidebar( 'footerfull' ); ?>

<div class="wrapper bg-dark text-white" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">
					<div class="row">
						<div class="col-12 col-md-8">
							<div class="site-info">

									<?php the_custom_logo(); ?>

							</div><!-- .site-info -->
						</div>
						<div class="col-12 col-md-4">
							<div class="copyright-info">
								<div class="media">
								  <div class="align-self-center ">
									  <img class="media-object pr-3 cc-logo" src="wp-content/themes/fortytwo/img/cc.svg" alt="" />
								  </div>
								  <div class="media-body cc-text">
								    All the content on this website is licensed under a Creative Commons Attribution-ShareAlike Unported license, except where otherwise mentioned.
								  </div>
								</div>

							</div><!-- .site-info -->
						</div>
					</div>



				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
