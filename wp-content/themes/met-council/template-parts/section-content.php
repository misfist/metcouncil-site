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
<article class="home-section <?php echo get_row_layout(); ?>" id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<h2 class="entry-title"><?php the_sub_field( 'title' ); ?> </h2>

	</header><!-- .entry-header -->

	<div class="entry-content">

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

</article><!-- #post-## -->
