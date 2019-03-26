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

<header class="section-header">

	<h2 class="section-title"><?php the_sub_field( 'title' ); ?></h2>

</header><!-- .section-header -->

<?php $count = count( get_sub_field( 'blocks' ) ); ?>

<?php if( 4 === $count ) : ?>
	<?php $class = 'col-md-8 col-lg-4'; ?>
<?php elseif( 3 === $count ) : ?>
	<?php $class = 'col-md'; ?>
<?php elseif( 2 === $count ) : ?>
	<?php $class = 'col-md-8'; ?>
<?php else : ?>
	<?php $class = ''; ?>
<?php endif; ?>

<div class="section-content<?php echo ( $count ) ? ' row' : '' ; ?>">

<?php if( have_rows( 'blocks' ) ) : ?>

	<?php while( have_rows( 'blocks' ) ) : the_row(); ?>

		<?php $block_class = ( get_sub_field( 'class' ) ) ? $class .' ' . get_sub_field( 'class' ) : $class . ' block-' . get_row_index() ; ?>

		<article class="block <?php echo $block_class; ?>">

			<div class="block-inner">

				<h3 class="block-title">

					<?php if( $link = get_sub_field( 'link' ) ) : ?>

						<a href="<?php echo get_permalink( $link[0]->ID ); ?>" title="<?php echo esc_attr( $link[0]->post_title ); ?>" rel="bookmark"><?php the_sub_field( 'title' );?></a></h3>

					<?php else : ?>

						<?php the_sub_field( 'title' );?>

					<?php endif; ?>

				</h3>

				<?php if( $icon = get_sub_field( 'image' ) ) : ?>

					<div class="section-image">

					<?php if( $link = get_sub_field( 'link' ) ) : ?>

						<a href="<?php echo get_permalink( $link[0]->ID ); ?>" title="<?php echo esc_attr( $link[0]->post_title ); ?>" rel="bookmark"><?php echo wp_get_attachment_image( $icon, 'thumbnail', true, array( 'class' => 'block-image' ) ); ?></a>

					<?php else : ?>

						<?php echo wp_get_attachment_image( $icon, 'thumbnail', true, array( 'class' => 'block-image' ) ); ?>

					<?php endif; ?>

					</div><!-- .section-image -->

				<?php endif; ?>

				<div class="block-entry">

				<?php if( 'post' === get_sub_field( 'format' ) ) : ?>

					<?php $post_type = get_sub_field( 'post_type' ); ?>

					<?php if( 'event' === $post_type ) : ?>

						<?php if( function_exists( 'eo_get_events' ) ) : ?>
							<?php
							$args = array(
								'numberposts' 			=> 1,
								'event_start_after'	=> 'today',
								'showpastevents'		=> false,
							);
							$events = eo_get_events( $args  );

							if( !empty( $events ) ) :
								$counter = 1;
								global $post;
								?>

							<?php
							foreach( $events as $post ) :
								setup_postdata( $post );
									if( 1 === $counter ) :
									?>

									<?php get_template_part( 'template-parts/section', 'entry-event' ); ?>

									<?php $counter++; ?>

								<?php endif; ?>

							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

							<?php endif; ?>
						<?php endif; ?>

					<?php else : ?>

						I am not an event

					<?php endif; ?>

				<?php else : ?>

					<?php the_sub_field( 'content' );?>

				<?php endif; ?>

				</div>

			</div><!-- .block-inner -->

		</article><!-- .block -->

	<?php endwhile; ?>

<?php endif; ?>

</div><!-- .section-content -->

<footer class="section-footer"></footer><!-- .section-footer -->
