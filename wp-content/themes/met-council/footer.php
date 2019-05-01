<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-16">

				<footer class="site-footer" id="colophon">

					<?php if( is_active_sidebar( 'footer-1' ) ) : ?>

						<div class="footer-widgets-1">

							<?php if( $footer_image = get_theme_mod( 'footer_image' ) ) : ?>

								<div class="footer-logo">
									<?php echo sprintf( 
										'<a href="%1$s"><img src="%2$s" class="alternate-logo"></a>',
										home_url(),
										esc_url( $footer_image )
									); ?>
								</div>

							<?php endif; ?>

							<?php dynamic_sidebar( 'footer-1' ); ?>

						</div><!-- .footer-widgets-1 -->

					<?php endif; ?>

					<div class="footer-widgets-2">

						<?php understrap_components_social_menu(); ?>

					</div><!-- .footer-widgets-2 -->

					<?php if( is_active_sidebar( 'site-info' ) ) : ?>
					<div class="site-info">

						<?php dynamic_sidebar( 'site-info' ); ?>

					</div><!-- .site-info -->
					<?php endif; ?>

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
