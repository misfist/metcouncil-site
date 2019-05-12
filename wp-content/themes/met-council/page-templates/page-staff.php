<?php
/**
 * Template Name: Staff & Board
 *
 * Template for displaying staff and board members.
 *
 * @package understrap
 * @subpackage metcouncil
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="" id="content" tabindex="-1">

		<div class="container">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop-templates/content-single', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php
			$taxonomy = 'staff-category';
			$term_args = array(
				'taxonomy' 	=> array( $taxonomy ),
				'orderby'	=> 'term_order'
			);

			$term_query = new WP_Term_Query( $term_args );

			if ( ! empty( $term_query ) && ! is_wp_error( $term_query ) ) : ?>

				<div class="staff-list" id="staff-page">

					<?php foreach( $term_query->terms as $term ) : ?>

						<section id="<?php esc_attr_e( $term->term_id ); ?>" class="staff-section">

							<header class="section-header">
								<h2 class="section-title"><?php echo apply_filters( 'the_title', $term->name ); ?></h2>
							</header>

							<?php 					
							$tax_query = array(
								array(
									'taxonomy'         => $taxonomy,
									'terms'            => array( $term->slug ),
									'field'            => 'slug',
								)
							);

							$post_args = array(
								'post_type'			=> 'staff',
								'posts_per_page' 	=> 100,
								'tax_query' 		=> $tax_query
							);

							$post_query = new WP_Query( $post_args );

							if( $post_query->have_posts() ) :
								while( $post_query->have_posts() ) : $post_query->the_post();
								?>

									<?php get_template_part( 'loop-templates/content', 'staff' ); ?>

								<?php
								endwhile;
							endif;
							?>

						</section>

					<?php endforeach; ?>

				</div><!-- .staff-list -->

			<?php endif; ?>

		</div><!-- Container end -->

	</div><!-- .container -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
