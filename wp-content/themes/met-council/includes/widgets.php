<?php
/**
 * Declaring widgets
 *
 * @package understrap
 * @subpackage metcouncil
 */

/**
 * Unregister Widgets
 *
 * @return void
 */
function metcouncil_remove_widgets(){
  unregister_sidebar( 'kbe_cat_widget' );
  unregister_sidebar( 'footerfull' );
  unregister_sidebar( 'hero' );
  unregister_sidebar( 'herocanvas' );
}
add_action( 'widgets_init', 'metcouncil_remove_widgets', 20 );

 /**
  * Register widget area.
  *
  * Register a widget area that is used on the KB pages.
  *
  * @since 0.1.0
  * @return void
  */
function metcouncil_register_widgets() {
	register_sidebar( array(
		'name'          => esc_html__( 'Help & Answers', 'metcouncil' ),
		'id'            => 'kbe_cat_widget',
		'description'   => esc_html__( 'Help & Answers sidebar area', 'metcouncil' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-4">',
    'after_widget'  => '</aside><!-- .kbe_cat_widget -->',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
	) );

  // register_sidebar( array(
	// 	'name'          => esc_html__( 'Help & Answers Disclaimer', 'metcouncil' ),
	// 	'id'            => 'help-answers-disclaimer',
	// 	'description'   => esc_html__( 'Help & Answers disclaimer text', 'metcouncil' ),
  //   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  //   'after_widget'  => '</aside><!-- .help-answers-disclaimer -->',
  //   'before_title'  => '<h2 class="widget-title">',
  //   'after_title'   => '</h2>',
	// ) );

  register_sidebar( array(
		'name'          => esc_html__( 'Content Footer', 'metcouncil' ),
		'id'            => 'content-footer',
		'description'   => esc_html__( 'Widget area below content', 'metcouncil' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside><!-- .content-footer -->',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'metcouncil' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Widget area for footer', 'metcouncil' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside><!-- .footer1t -->',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer Full-width', 'metcouncil' ),
    'id'            => 'footerfull',
    'description'   => __( 'Full sized footer widget area', 'metcouncil' ),
      'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">',
      'after_widget'   => '</div><!-- .footer-widget -->',
      'before_title'   => '<h3 class="widget-title">',
      'after_title'    => '</h3>',
  ) );

  // register_sidebar( array(
	// 	'name'          => esc_html__( 'Footer 2', 'metcouncil' ),
	// 	'id'            => 'footer-2',
	// 	'description'   => esc_html__( 'Widget area for footer', 'metcouncil' ),
  //   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  //   'after_widget'  => '</aside>',
  //   'before_title'  => '<h2 class="widget-title">',
  //   'after_title'   => '</h2>',
  // ) );

  register_sidebar( array(
		'name'          => esc_html__( 'Site Info', 'metcouncil' ),
		'id'            => 'site-info',
		'description'   => esc_html__( 'Site information', 'metcouncil' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

}
add_action( 'widgets_init', 'metcouncil_register_widgets', 25 );

function understrap_slbd_count_widgets( $sidebar_id ) {
  // If loading from front page, consult $_wp_sidebars_widgets rather than options
  // to see if wp_convert_widget_settings() has made manipulations in memory.
  global $_wp_sidebars_widgets;
  if ( empty( $_wp_sidebars_widgets ) ) :
    $_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
  endif;

  $sidebars_widgets_count = $_wp_sidebars_widgets;

  if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
    $widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
    $widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
    if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
      // Four widgets per row if there are exactly four or more than six
      $widget_classes .= ' col-md-3';
    elseif ( 6 == $widget_count ) :
      // If two widgets are published
      $widget_classes .= ' col-md-2';
    elseif ( $widget_count >= 3 ) :
      // Three widgets per row if there's three or more widgets
      $widget_classes .= ' col-md-4';
    elseif ( 2 == $widget_count ) :
      // If two widgets are published
      $widget_classes .= ' col-md-8';
    elseif ( 1 == $widget_count ) :
      // If just on widget is active
      $widget_classes .= ' col-md-16';
    endif;
    return $widget_classes;
  endif;
}
