<?php
/**
 * Single post partial template.
 *
 * @package understrap
 * @subpackage metcouncil
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php kbe_set_post_views( get_the_ID() ); ?>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php if( $translated_title = get_post_meta( $post->ID, 'translated_title', true ) ) : ?>
		<h1 class="entry-title translated-title"><?php ?></h1>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="content-area row">

	  <?php if( is_active_sidebar( 'kbe_cat_widget' ) ) : ?>
	    <div id="toc" class="widget-area col-md-4">
	      <?php dynamic_sidebar( 'kbe_cat_widget' ); ?>
	    </div>
	  <?php endif; ?>

		<div class="content-body col-md-12">

			<div class="entry-content">

				<?php if( $intro = get_post_meta( get_the_id(), 'content', true ) ) : ?>
					<div class="intro<?php echo ( $class = get_post_meta( get_the_id(), 'class', true ) ) ? ' ' . sanitize_title_with_dashes( $class ) : ''; ?>">

						<?php echo( $title = get_post_meta( get_the_id(), 'title', true ) ) ? '<h2 class="intro-title">' . apply_filters( 'the_title', $title ) . '</h2>' : '' ; ?>

						<?php echo apply_filters( 'the_content', $intro ); ?>

					</div><!-- .intro -->
				<?php endif; ?>

				<?php the_content(); ?>

				<?php if( is_active_sidebar( 'help-answers-disclaimer' ) ) : ?>
					<div id="legal-disclaimer" class="widget-area">
						<?php dynamic_sidebar( 'help-answers-disclaimer' ); ?>
					</div><!-- #legal-disclaimer -->
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


				<?php
				$args = array(
				'connected_type' => 'help_translations',
				'connected_items' => get_queried_object(),
				'nopaging' => true,
				);
				$connected = new WP_Query( $args ); ?>

				<?php if( $connected->have_posts() ) : ?>
					<div class="help-translations">
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
					</div><!-- .help-translations -->
				<?php endif; ?>

			</footer><!-- .entry-footer -->

			<?php if( is_active_sidebar( 'content-footer' ) ) : ?>
				<div id="content-footer" class="widget-area col-md-4">
					<?php dynamic_sidebar( 'content-footer' ); ?>
				</div><!-- #content-footer -->
			<?php endif; ?>

		</div><!-- .content-body -->

	</div>

</article><!-- #post-## -->
