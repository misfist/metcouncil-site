<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying the modulary homepage.
 *
 * @package understrap
 * @subpackage metcouncil
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<?php get_template_part( 'template-parts/section', 'hero' ); ?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="" id="content" tabindex="-1">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-templates/content-single', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php get_template_part( 'template-parts/section' ); ?>

		<?php
		$args = array(
			'post_type'              => array( 'campaign' ),
			'tax_query'              => array(
				array(
					'taxonomy'         => 'campaign-status',
					'terms'            => 'active',
					'field'            => 'slug',
				),
			),
			'meta_query'             => array(
				array(
					'key'     => 'featured',
					'value'   => '1',
				),
			),
		);

		// The Query
		$query = new WP_Query( $args );
		?>

		<?php if( $query->have_posts() ) : ?>

		<section class="home-section campaigns" id="section-campaigns">

			<div class="container">

				<header class="section-header">
					<h2 class="section-title"><?php echo esc_attr( 'Support our current campaigns' ); ?></h2>
				</header>
	
				<?php while( $query->have_posts() ) : $query->the_post(); ?>

					<?php get_template_part( 'loop-templates/content', get_post_type() ); ?>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

				<footer class="section-footer">
					<a href="<?php echo esc_url( add_query_arg( array( 'campaign-status' => 'inactive' ), get_post_type_archive_link( 'campaign' ) ) ); ?>"><?php _e( 'View Past Campaigns', 'metcouncil' ); ?></a>
				</footer>

				<?php edit_post_link( __( 'Edit', 'metcouncil' ), '<span class="edit-link">', '</span>' ); ?>

			</div><!-- .container -->

		</section><!-- .home-section -->
		<?php endif; ?>

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
