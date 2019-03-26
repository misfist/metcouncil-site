<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 * @subpackage metcouncil
 */

 function metcouncil_page_titles() { ?>
 	<div class="page-titles">

    <?php if( is_page() || is_single() ) : ?>

      <h1 class="page-title"><?php the_title(); ?></h1>

    <?php else : ?>

      <h1 class="page-title"><?php the_archive_title(); ?></h1>

    <?php endif; ?>

 		<?php
 		// Get the page excerpt or archive description for a subtitle
 		$archive_description = get_the_archive_description();

 		if ( is_archive() && $archive_description ) {
 			$subtitle = get_the_archive_description();
 		}

 		// Show the subtitle
 		if ( ! empty( $subtitle ) && ! is_singular( 'post' ) ) : ?>
 			<div class="entry-subtitle">
 				<?php echo $subtitle; ?>
 			</div>
 		<?php endif; ?>

 	</div>

 	<?php
 }

/**
 * Social Nav
 * @return void
 */
function understrap_components_social_menu() {
  if ( ! function_exists( 'jetpack_social_menu' ) ) {
    $args = array(
      'items_wrap'      => '%3$s',
      'theme_location'  => 'social-menu',
      'container_class' => 'social-nav social-menu',
      'container_id'    => 'social-nav',
      'menu_class'      => 'social-menu',
      'container'         => 'nav',
      'fallback_cb'     => '',
      'menu_id'         => 'social-menu',
      'depth'           => 1,
    );

    if( class_exists( 'WO_Nav_Social_Walker' ) ) {
      $args['walker'] = new WO_Nav_Social_Walker();
    }

    wp_nav_menu( $args );
  } else {
    jetpack_social_menu();
  }
}

function metcouncil_programs( $args ) {
  $default = array(
    'post_type'   => 'program'
  );
  $args =  wp_parse_args( $default, $args );
  $posts = get_posts( $args );
}
