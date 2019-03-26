<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 * @package metcouncil
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-body">

		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-content row">

			<div class="entry-content-primary col-md">
				<?php the_content(); ?>
			</div><!-- .entry-content-primary -->

			<?php if( function_exists( 'eo_get_events' ) ) : ?>

				<?php
				$terms = wp_get_post_terms( $post->ID, 'event-category', array( 'fields' => 'ids' ) );
				$tax_query = array(
					array(
						'taxonomy'         => 'event-category',
						'terms'            => $terms,
						'field'            => 'term_id',
					),
				);
				$events = eo_get_events( array(
					'numberposts'				=> 5,
					'event_start_after'			=> 'today',
					'showpastevents'			=> true,
					'tax_query'					=> $tax_query
				));

				if( !empty( $events ) ) :
					global $post; ?>
				<aside class="entry-related-content col-md-5">

					<h4 class="widget-title">
						<?php _e( 'Upcoming Events', 'metcouncil' ); ?>
					</h4>

					<div class="event-list">
						<?php foreach( $events as $post ) :
							setup_postdata( $post ); ?>

							<?php get_template_part( 'loop-templates/content', 'event' ); ?>

							<?php wp_reset_postdata(); ?>
						<?php endforeach; ?>
					</div>

					<footer class="widget-footer">
						<?php printf( '<a href="%1$s" title="%2$s" rel="bookmark">%2$s</a>',
							esc_url( get_post_type_archive_link( 'event' ) ),
							__( 'View All Events', 'metcouncil' )
						 ); ?>
					</footer>

				</aside><!-- .entry-related-content -->
				<?php endif; ?>

			<?php endif; ?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'metcouncil' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php understrap_entry_footer(); ?>

		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->
