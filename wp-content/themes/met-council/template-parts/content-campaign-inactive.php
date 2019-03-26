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

<?php
	$tax_query = array(
		array(
			'taxonomy'         => 'campaign-status',
			'terms'            => 'inactive',
			'field'            => 'slug',
			'operator'         => 'IN',
		),
	);

	$args = array(
		'post_type'		=> array( 'campaign' ),
		'tax_query'		=> $tax_query
	);

	$query = new WP_Query( $args );
?>

<?php if( $query->have_posts() ) : ?>
	<section class="inactive-campaigns">
		<h3><a href="<?php echo get_term_link( 'inactive', 'campaign-status' ); ?>"><?php _e( 'Past Campaigns', 'metcouncil' ); ?></a></h3>
		<ul class="post-list campaigns-inactive">
		<?php while( $query->have_posts() ) : $query->the_post(); ?>

			<li id="campaign-<?php the_ID(); ?>" <?php post_class(); ?>><?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" title="%s" rel="bookmark">',
				esc_url( get_permalink() ),
				esc_attr( get_the_title() )
			),
			'</a></h4>' ); ?></li>

		<?php endwhile; ?>
		</ul><!-- #post-## -->
	</section>
<?php endif; ?>
