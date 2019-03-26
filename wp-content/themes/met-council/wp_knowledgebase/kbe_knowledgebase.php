<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */
 if ( ! defined( 'ABSPATH' ) ) {
 	exit; // Exit if accessed directly.
 }

get_header();

global $wpdb;
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<header class="page-header">
					<h1 class="page-title"><?php post_type_archive_title( '', true ); ?></h1>
					<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
				</header><!-- .page-header -->

				<?php if ( KBE_SEARCH_SETTING == 1 ) : ?>
					<?php wp_enqueue_script( 'kbe_live_search' ); ?>
					<?php kbe_search_form(); ?>
				<?php endif; ?>

				<div id="post-wrap" class="post-grid">

					<?php
					$args = array(
						'orderby'    => 'terms_order',
						'order'      => 'ASC',
						'hide_empty' => true,
						'number'	 => 20,
						'parent'     => 0,
						'taxonomy'	 => KBE_POST_TAXONOMY
					);

					$terms = get_terms( $args );
					?>

					<?php if( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>

						<?php foreach( $terms as $term ) : ?>

							<article id="term-<?php echo $term->term_id; ?>" class="help-answers block">

                <div class="block-inner">

  								<header class="entry-header">
  									<div class="help-answers-image">
  										<?php if( $image_id = get_term_meta( $term->term_id, 'image', true ) ) : ?>
  											<?php echo wp_get_attachment_image( $image_id, 'thumbnail', true, array( 'class' => 'help-answers-icon' ) ); ?>
  										<?php endif; ?>
  									</div>
  									<h2 class="entry-title"><a href="<?php echo get_term_link( $term ); ?>" title="<?php echo esc_attr( $term->name ); ?>" rel="bookmark"><?php echo apply_filters( 'the_title', $term->name ); ?></a></h2>
  								</header>

  								<div class="entry-content"><?php echo apply_filters( 'the_content', $term->description ); ?></div>

                </div>

							</article>

						<?php endforeach; ?>

					<?php endif; ?>

				</div>

				<?php if( is_active_sidebar( 'content-footer' ) ) : ?>
					<div id="content-footer" class="widget-area">
						<?php dynamic_sidebar( 'content-footer' ); ?>
					</div><!-- #content-footer -->
				<?php endif; ?>

			</main>

			<!-- The pagination component -->
			<?php// understrap_pagination(); ?>

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div> <!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
