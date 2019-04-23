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

<?php $count = count( get_sub_field( 'programs' ) ); ?>

<?php if( 4 === $count ) : ?>
	<?php $class = 'col-sm-8 col-lg-4'; ?>
<?php elseif( 3 === $count ) : ?>
	<?php $class = 'col-lg'; ?>
<?php elseif( 2 === $count ) : ?>
	<?php $class = 'col-sm-8'; ?>
<?php else : ?>
	<?php $class = ''; ?>
<?php endif; ?>

<div class="section-content<?php echo ( $count ) ? ' row' : '' ; ?>">

<?php if( have_rows( 'programs' ) ) : ?>

	<?php while( have_rows( 'programs' ) ) : the_row(); ?>

		<article class="program <?php echo $class; ?>">

				<?php if( $icon = get_sub_field( 'icon' ) ) : ?>

					<?php if( $link = get_sub_field( 'link' ) ) : ?>

						<div class="section-icon">
							<a href="<?php echo get_permalink( $link[0]->ID ); ?>" title="<?php echo esc_attr( $link[0]->post_title ); ?>" rel="bookmark"><?php echo wp_get_attachment_image( $icon, 'medium', true, array( 'class' => 'program-icon' ) ); ?></a>
						</div><!-- .section-icon -->

					<?php else : ?>

						<div class="section-icon">
							<?php echo wp_get_attachment_image( $icon, 'medium', true, array( 'class' => 'program-icon' ) ); ?>
						</div><!-- .section-icon -->

					<?php endif; ?>

				<?php endif; ?>

				<?php if( $link = get_sub_field( 'link' ) ) : ?>

					<h3 class="program-title"><a href="<?php echo get_permalink( $link[0]->ID ); ?>" title="<?php echo esc_attr( $link[0]->post_title ); ?>" rel="bookmark"><?php the_sub_field( 'title' );?></a></h3>

				<?php else : ?>

					<h3 class="program-title"><?php the_sub_field( 'title' );?></h3>

				<?php endif; ?>

				<div class="program-entry"><?php the_sub_field( 'content' );?></div>

			</article>

	<?php endwhile; ?>

<?php endif; ?>

</div><!-- .section-content -->

<footer class="section-footer"></footer><!-- .section-footer -->
