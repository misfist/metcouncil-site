<?php
/**
 * Enqueue scripts
 *
 * @package understrap
 * @subpackage metcouncil
 */

/**
 * Remove Scripts and Styles
 * @return void
 */
function understrap_remove_scripts() {
   wp_dequeue_style( 'understrap-styles' );
   wp_deregister_style( 'understrap-styles' );

   wp_dequeue_script( 'understrap-scripts' );
   wp_deregister_script( 'understrap-scripts' );

   wp_dequeue_style( 'kbe_theme_style' );
   wp_deregister_style( 'kbe_theme_style' );

   wp_deregister_style( 'ez-icomoon' );
   wp_deregister_style( 'ez-toc' );
   wp_deregister_style( 'ez-toc-inline' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

/**
 * Enqueue Styles and Scripts
 * @return void
 */
function theme_enqueue_styles() {

  // Get the theme data
  $the_theme = wp_get_theme();

  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Archivo|Archivo+Black|Archivo+Narrow|Merriweather' );

  wp_enqueue_style( 'metcouncil-styles', get_stylesheet_directory_uri() . '/css/style.min.css', array( 'google-fonts' ), $the_theme->get( 'Version' ) );

  wp_enqueue_script( 'jquery');

  wp_enqueue_script( 'clipboard', get_stylesheet_directory_uri() . '/js/lib/clipboard.min.js', array(), false);

  wp_enqueue_script( 'popper-scripts', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), false);

  wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/main.min.js', array( 'clipboard' ), $the_theme->get( 'Version' ), true );
  // wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/main.js', array(), $the_theme->get( 'Version' ), true );


  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Load Gutenberg Editor Styles
 * @return void
 */
function metcouncil_enqueue_block_editor_assets() {
  // Get the theme data
  // $the_theme = wp_get_theme();

  // wp_enqueue_style( 'gutenberg-styles', get_stylesheet_directory_uri() . '/css/gutenberg.min.css', array( 'google-fonts' ), $the_theme->get( 'Version' ) );
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Archivo|Archivo+Black|Archivo+Narrow|Merriweather' );

  wp_enqueue_style(
		'gutenberg-styles', // Handle.
		get_stylesheet_directory_uri() . '/css/gutenberg.min.css', // Block editor CSS.
		array( 'wp-edit-blocks', 'google-fonts' ) // Dependency to include the CSS after it.
	);
}
add_action( 'enqueue_block_editor_assets', 'metcouncil_enqueue_block_editor_assets' );
