<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if( has_post_thumbnail( $post->ID ) ) :?>
		<div class="hero-image">
			<?php echo get_the_post_thumbnail( $post->ID, 'banner', array( 'class' => 'full-width', 'style' => 'width: 100vw; position: relative; left: 50%; margin-left: -50vw;' ) ); ?>
		</div>
	<?php endif; ?>

	<div class="entry-body">

		<div class="entry-intro row">

			<div class="campaign-intro col-md">

				<header class="entry-header">

					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				</header><!-- .entry-header -->

				<?php if( $intro = get_post_meta( get_the_ID(), 'action_text', true ) ) : ?>
					<?php echo apply_filters( 'the_content', $intro ); ?>
				<?php endif; ?>

				<?php if( function_exists( 'have_rows' ) && have_rows( 'links' ) ) : ?>
					<ol class="action-links">
						<?php while ( have_rows( 'links' ) ) : the_row(); ?>
							<?php $link = get_sub_field( 'link' ); ?>
							<li id="link-<?php echo get_row_index(); ?>" data-index="<?php echo get_row_index(); ?>"><a href="<?php echo esc_url( $link['url'] ); ?>" title="<?php echo esc_attr( $link['title'] ); ?>" <?php echo ( !empty( $link['target'] ) ) ? ' target="_blank"' : ''; ?>><?php echo apply_filters( 'the_title', $link['title'] ); ?> </a></li>
						<?php endwhile; ?>
					</ol>
				<?php endif; ?>

			</div><!-- .campaign-intro -->

			<?php
			$args = array(
			  'connected_type' => 'campaign_translations',
			  'connected_items' => get_queried_object(),
			  'nopaging' => true,
			);
			$connected = new WP_Query( $args ); ?>

			<?php if( $connected->have_posts() ) : ?>
				<div class="campaign-translations col-md-5">
					<ul class="translation-links">
						<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php
						wp_reset_postdata(); ?>
					</ul>
				</div><!-- .campaign-translations -->
			<?php endif; ?>

		</div><!-- .entry-intro -->

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
					'event_start_after'	=> 'today',
					'showpastevents'		=> true,
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
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php understrap_entry_footer(); ?>

		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->
