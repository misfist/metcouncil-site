
<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 * @subpackage metcouncil
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<nav class="breadcrumbs" aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb" role="navigation">
					<?php if( function_exists( 'bcn_display_list' ) ) : ?>
						<?php bcn_display_list() ; ?>
					<?php endif; ?>
				</ol>
			</nav>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content-single', get_post_type() ); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
