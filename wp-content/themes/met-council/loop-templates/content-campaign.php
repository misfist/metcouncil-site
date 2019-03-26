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

	<?php if( !is_tax() ) : ?>	
		<?php echo get_the_post_thumbnail( $post->ID, 'banner' ); ?>
	<?php endif; ?>

	<div class="entry-body">

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" title="%s" rel="bookmark">',
				esc_url( get_permalink() ),
				esc_attr( get_the_title() )
			),
			'</a></h2>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php
			the_excerpt();
			?>

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
