<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="col-md-4 widget-area" id="right-sidebar" role="complementary">

	<aside class="related-content upcoming-events">

		<?php
		$events = eo_get_events(array(
			'event_start_after'		=>'today',
			'event-category'		=> $terms,
			'numberposts'			=> 5
		));
		?>

		<?php if( $events ) : ?>
			<h2><?php _e( 'Upcoming Program Events', 'metcouncil' ); ?></h2>
			<ul class="upcoming-events">
			<?php foreach( $events as $event ) :?>
				<?php $format = ( eo_is_all_day( $event->ID ) ? get_option( 'date_format' ) : get_option( 'date_format' ). ' '. get_option( 'time_format') );?>

				<li id="event-<?php echo $event->ID; ?>"><a href="<?php the_permalink( $event->ID ); ?>" title="<?php echo esc_attr( get_the_title( $event->ID ) ); ?>" rel="bookmark"><?php echo get_the_title( $event->ID ); ?></a> <span class="event-date"><?php echo eo_get_the_start( $format, $event->ID, $event->occurrence_id ); ?> <?php echo ( !eo_is_all_day( $event->ID ) ) ? ' - ' . eo_get_the_end( get_option( 'time_format' ), $event->ID, $event->occurrence_id ) : ''; ?></span></li>

			<?php endforeach; ?>
			</ul>
		<?php endif; ?>

	</aside>

</div>
