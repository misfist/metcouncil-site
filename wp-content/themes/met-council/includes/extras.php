<?php
/**
 * Theme extras.
 *
 * @package understrap
 * @subpackage metcouncil
 */

/**
 * Replaces logo CSS class.
 *
 * @param string $html Markup.
 *
 * @return mixed
 */
function understrap_change_logo_class( $html ) {

  // $html = str_replace( 'class="custom-logo"', 'class="img-fluid"', $html );
  $html = str_replace( 'class="custom-logo-link"', 'class="navbar-brand custom-logo-link"', $html );
  $html = str_replace( 'alt=""', 'title="Home" alt="logo"', $html );

  return $html;
}

/**
 * Add Body Classes
 *
 * @param  array $classes
 * @return array $classes
 */
function metcouncil_body_class( $classes ) {
  if( $site_title = sanitize_title_with_dashes( get_bloginfo( 'name' ) ) ) {
    $classes[] = $site_title;
  }

  global $post;
	if ( is_singular( array( 'post', 'page' ) ) && get_post_meta( $post->ID, 'enable_gutenberg', true ) ) {
		$classes[] = 'gutenberg-enabled';
	}

  return $classes;
}
add_filter( 'body_class', 'metcouncil_body_class' );

/**
 * Filter Al
 *
 * @param [type] $title
 * @return void
 */
function metcouncil_the_archive_title( $title ) {

  if ( is_category() ) {
      $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
      $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
      $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif ( is_tax( 'event-category' ) ) {
    if( $post_obj = get_post_type_object( 'event' ) ) {
      $title = sprintf( '%1$s %2$s',
        single_term_title( '', false ),
        $post_obj->labels->name
    );
    }
  } elseif ( is_post_type_archive() ) {
      $title = post_type_archive_title( '', false );
  } elseif ( is_tax() ) {
      $title = single_term_title( '', false );
  }

  return $title;
}
add_filter( 'get_the_archive_title', 'metcouncil_the_archive_title' );

/**
 * Adds a custom read more link to all excerpts, manually or automatically generated
 *
 * @param string $post_excerpt Posts's excerpt.
 *
 * @return string
 */
 function understrap_all_excerpts_get_more_link( $post_excerpt ) {

  $button_text = ( 'campaign' === get_post_type() ) ? __( 'Take Action', 'metcoauncil' ) : __( 'Learn More', 'metcoauncil' );

  if( $manual_excerpt = get_post_field( 'post_excerpt', get_the_ID() ) ) {
    return $manual_excerpt;
  }

  if( 'campaign' === get_post_type() && !is_singular( 'campaign' ) ) {
    return $post_excerpt . '<p><a class="btn btn-secondary understrap-read-more-link" href="' . esc_url( get_permalink( get_the_ID() )) . '">' . $button_text . '</a></p>';
  }

  return $post_excerpt;

}

/**
 * Custom Excerpt for Chinese Characters
 *
 * @link https://developer.wordpress.org/reference/hooks/get_the_excerpt/
 * @link https://stackoverflow.com/questions/24904118/detecting-chinese-characters-in-php-string/24904309
 *
 * @param string $excerpt
 * @return string $excerpt
 */
function metcouncil_get_the_excerpt( $excerpt ) {

  if( preg_match( "/\p{Han}+/u", $excerpt ) ) {
      $excerpt = mb_substr( $excerpt, 0, 60 ) . '...';
  }
  return $excerpt;
}
add_filter( 'get_the_excerpt', 'metcouncil_get_the_excerpt' );

/**
 * Reduce the Auto-excerpt Length
 *
 * @param  int $length
 * @param  int $length
 */
function metcouncil_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'metcouncil_excerpt_length', 999 );

/**
 * Filter Campaign Archive
 * Exclude inactivate campaigns from main query
 *
 * @link https://developer.wordpress.org/reference/hooks/pre_get_posts/
 *
 * @return void
 */
function metcouncil_campaign_pre_get_posts( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {

      if( is_post_type_archive( 'campaign' ) || is_tax( 'campaign-status' ) ) {

        if( 'inactive' !== get_query_var( 'campaign-status' ) ) {

          $tax_query = array(
            array(
                'taxonomy'         => 'campaign-status',
                'terms'            => 'inactive',
                'field'            => 'slug',
                'operator'         => 'NOT IN',
            ),
          );
          $query->set( 'tax_query', $tax_query );

        }

        $query->set( 'post_parent', 0 );

      }

      if( is_tax( 'event-category' ) ) {
        $query->set( 'post_type', 'event' );
      }

    }
}
add_filter( 'pre_get_posts', 'metcouncil_campaign_pre_get_posts' );

/**
 * Translate the_title
 *
 * @param string $title
 * @return string $title Modified to display `translated_title` field, if exists
 */
function metcouncil_the_title( $title ) {
  global $post;

  if ( in_the_loop() ) {
    if( $translated_title = get_post_meta( $post->ID, 'translated_title', true ) ) {
      $title = $translated_title;
    }
  }
  return $title;
}
add_filter( 'the_title', 'metcouncil_the_title', 10, 2 );

/**
 * Filter `post_class` to include class if no thumbnail
 * 
 * @param array $classes
 * @return array $classes
 */
 function metcouncil_post_class( $classes ) {
  global $post;
  if( has_post_thumbnail( $post->ID ) ) {
    $classes[] = "has-post-thumbnail";
  } else {
    $classes[] = "has-no-thumbnail";
  }

  return $classes;
}
add_filter( 'post_class', 'metcouncil_post_class' );