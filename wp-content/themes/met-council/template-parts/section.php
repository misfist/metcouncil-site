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

<?php if( function_exists( 'get_row_layout' ) && have_rows( 'sections' ) ) :  ?>
	<?php while( have_rows( 'sections' ) ) : the_row(); ?>

		<section class="home-section <?php echo get_row_layout(); ?>" id="section-<?php echo get_row_index(); ?>">

			<div class="container">

				<?php get_template_part( 'template-parts/section-content', get_row_layout() ); ?>

			</div><!-- .container -->

		</section><!-- .home-section -->

	<?php endwhile; ?>
<?php endif; ?>
