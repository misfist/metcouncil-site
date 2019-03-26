<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( !is_front_page() ) : ?>

		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		</header><!-- .entry-header -->

	<?php endif; ?>

	<?php if( !get_page_by_title( 'Calendar' ) ) : ?>

		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<?php endif; ?>

	<?php if( $intro = get_post_meta( get_the_id(), 'intro_content', true ) ) : ?>
		<div class="intro-block<?php echo ( $class = get_post_meta( get_the_id(), 'class', true ) ) ? ' ' . sanitize_title_with_dashes( $class ) : ''; ?>">

			<?php echo( $title = get_post_meta( get_the_id(), 'intro_title', true ) ) ? '<h2 class="intro-title">' . apply_filters( 'the_title', $title ) . '</h2>' : '' ; ?>

			<?php echo apply_filters( 'the_content', $intro ); ?>

		</div>
		<!-- .intro -->
	<?php endif; ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'metcouncil' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php if( !is_home() && !is_front_page() ) : ?>
			<?php edit_post_link( __( 'Edit', 'metcouncil' ), '<span class="edit-link">', '</span>' ); ?>
		<?php endif; ?>

		<?php
		$args = array(
		'connected_type' => 'page_translations',
		'connected_items' => get_queried_object(),
		'nopaging' => true,
		);
		$connected = new WP_Query( $args ); ?>

		<?php if( $connected->have_posts() ) : ?>
			<div class="page-translations">
			<h3><?php _e( 'Help in Other Languages', 'metcouncil' ); ?> </h3>
				<ul class="translation-links">
					<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php if( has_term( '', 'language' ) ) : ?>
							(<?php echo get_the_term_list( $post->ID, 'language', '<span class="language">', ', ', '</span>' ); ?>)
						<?php endif; ?>
						</li>								
					<?php endwhile; ?>
					<?php
					wp_reset_postdata(); ?>
				</ul>
			</div><!-- .page-translations -->
		<?php endif; ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
