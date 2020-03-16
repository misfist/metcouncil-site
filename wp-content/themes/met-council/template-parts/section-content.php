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
		
		<?php if( $content = the_sub_field( 'content' ) ) : ?>
			<?php echo apply_filters( 'the_content', $content ); ?>
		<?php endif; ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer"></footer><!-- .entry-footer -->

</article><!-- #post-## -->
