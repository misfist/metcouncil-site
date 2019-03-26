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
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
					<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
				</header><!-- .page-header -->

				<?php if ( KBE_SEARCH_SETTING == 1 ) : ?>
					<?php wp_enqueue_script( 'kbe_live_search' ); ?>
					<?php kbe_search_form(); ?>
				<?php endif; ?>

				<div id="post-wrap" class="post-grid">

					<?php $queried_object = get_queried_object(); ?>

					<?php
					/**
					 * If term has child terms, display those, with a post list underneath
					 */
					if( count( get_term_children( $queried_object->term_id, KBE_POST_TAXONOMY ) ) > 0 ) : ?>

						<?php
						$args = array(
							'orderby'    => 'terms_order',
							'order'      => 'ASC',
							'hide_empty' => true,
							'number'	 => 20,
							'parent'     => $queried_object->term_id,
							'taxonomy'	 => KBE_POST_TAXONOMY
						);

						$terms = get_terms( $args );
						?>

						<?php if( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>

							<?php foreach( $terms as $term ) : ?>

								<article id="term-<?php echo $term->term_id; ?>" class="help-answers block col-md">

                  <div class="block-inner">

  									<header class="entry-header">
  										<h2 class="entry-title"><?php echo apply_filters( 'the_title', $term->name ); ?></h2>
  									</header>

  									<div class="entry-content"><?php echo apply_filters( 'the_content', $term->description ); ?></div>

  									<ul class="help-answers-list">

  										<?php
  										$args = array(
  											'post_type' => KBE_POST_TYPE,
  											'tax_query'	=> array(
  												array(
  													'taxonomy'         => KBE_POST_TAXONOMY,
  													'terms'            => $term->term_id,
  													'field'            => 'term_id',
  												)
  											),
  										);

  										$query = new WP_Query( $args );
  										?>

  										<?php if( $query->have_posts() ) : ?>

  											<?php while( $query->have_posts() ) : $query->the_post(); ?>

  												<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  													<a href="<?php echo get_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="bookmark"><?php the_title(); ?></a>
  												</li>

  											<?php endwhile; ?>

  											<?php wp_reset_postdata(); ?>

  										<?php endif; ?>

  									</ul>

                  </div>

								</article>

							<?php endforeach; ?>

						<?php endif; ?>

					<?php else : ?>

						<?php
						/**
						 * If the term has no child terms, display each post for the term
						 */
						$args = array(
							'post_type' => KBE_POST_TYPE,
							'tax_query'	=> array(
								array(
									'taxonomy'         => KBE_POST_TAXONOMY,
									'terms'            => $queried_object->term_id,
									'field'            => 'term_id',
								)
							),
						);

						$query = new WP_Query( $args );
						?>

						<?php if( $query->have_posts() ) : ?>

							<?php while( $query->have_posts() ) : $query->the_post(); ?>

								<article <?php post_class( 'col-md block' ); ?> id="post-<?php the_ID(); ?>">

                  <div class="block-inner">

  									<header class="entry-header">
  										<h2 class="entry-title"><a href="<?php echo get_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  									</header>

  									<div class="entry-content"><?php the_excerpt(); ?></div>

                  </div>

								</article>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

						<?php endif; ?>

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
