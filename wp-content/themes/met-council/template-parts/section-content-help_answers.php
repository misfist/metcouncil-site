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

<article class="help-answers">

	<header class="section-header">

		<h2 class="section-title"><?php the_sub_field( 'title' ); ?></h2>

	</header><!-- .section-header -->

	<div class="section-content">

	<?php if( $categories = get_sub_field( 'categories' ) ) : ?>

		<ul class="help-answers-categories">

		<?php foreach( $categories as $category_id ) : ?>

			<?php $term = get_term( $category_id ); ?>

			<li id="<?php echo $term->term_id; ?>"><a href="<?php echo get_term_link( $category_id ); ?>" title="<?php echo esc_attr( $term->name ); ?>" rel="bookmark"><?php echo $term->name; ?></a>, </li>

		<?php endforeach; ?>

			<li id="other"><a href="<?php echo get_post_type_archive_link( 'kbe_knowledgebase' ); ?>" title="<?php _e( esc_html( 'Help & Answers' ), 'metcouncil' ); ?>" rel="bookmark"><?php _e( 'More...', 'metcouncil' ); ?></a></li>

		</ul>

	<?php endif; ?>

	</div><!-- .section-content -->

	<footer class="section-footer"></footer><!-- .section-footer -->
</article>
