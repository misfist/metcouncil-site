<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 * @subpackage metcouncil
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<?php $background_image = ( $image_id = get_post_meta( get_the_id(), 'image', true ) ) ? wp_get_attachment_image_url( $image_id, 'banner' ) : false; ?>

<?php $background = sprintf( 'background-image: %s, %s;',
	'linear-gradient(to right, rgba( 0,0,0, 0.8), rgba( 0,0,0, 0.0))',
	sprintf( "url('%s')", ( $image_id = get_post_meta( get_the_id(), 'image', true ) ) ? wp_get_attachment_image_url( $image_id, 'banner' ) : '' )
); ?>

	<div class="jumbotron jumbotron-fluid" id="wrapper-static-content" tabindex="-1" style="<?php echo $background; ?>">

		<article class="container" id="hero-<?php the_ID(); ?>">

			<div class="hero-body col-md-6">

				<header class="entry-header">

					<?php if( $subtitle = get_post_meta( get_the_id(), 'subtitle', true ) ) : ?>
						<h3 class="entry-subtitle"><?php echo apply_filters( 'the_title', $subtitle ); ?></h3>
					<?php endif; ?>

					<?php if( $title = get_post_meta( get_the_id(), 'title', true ) ) : ?>
						<h2 class="entry-title"><?php echo apply_filters( 'the_title', $title ); ?></h2>
					<?php endif; ?>

				</header><!-- .entry-header -->

				<div class="entry-content">

					<?php if( $content = get_post_meta( get_the_id(), 'content', true ) ) : ?>

						<?php echo apply_filters( 'the_content', $content ); ?>

					<?php endif; ?>

					<?php if( $link = get_post_meta( get_the_id(), 'link', true ) ) : ?>

						<a href="<?php echo esc_url( $link['url'] ); ?>" class="btn btn-danger" title="<?php esc_attr( $link['title'] ); ?> " rel="bookmark"><?php echo esc_html( $link['title'] ); ?></a>

					<?php endif; ?>

				</div><!-- .entry-content -->

				<footer class="entry-footer">

				</footer><!-- .entry-footer -->

			</div><!-- .hero-body -->

		</article><!-- .hero -->

	</div>

</div><!-- #wrapper-static-hero -->
