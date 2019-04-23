<?php
/**
 * Theme basic setup.
 *
 * @package understrap
 * @subpackage metcouncil
 */

/**
 * Setup Text Domain
 *
 * @link https://developer.wordpress.org/reference/functions/load_child_theme_textdomain/
 *
 * @return void
 */
function metcouncil_textdomain() {
  load_child_theme_textdomain( 'metcouncil', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'metcouncil_textdomain' );

/**
 * Add Thee Support
 * @return void
 */
function metcouncil_theme_support() {
  add_theme_support( 'align-wide', 'alignfull', 'editor-styles' );
  add_post_type_support( 'page', 'excerpt' );

  // add_editor_style( get_stylesheet_directory_uri() . '/css/gutenberg.min.css' );

  add_theme_support( 'editor-color-palette', array(
    array(
        'name' => __( 'Blue Primary', 'metcouncil' ),
        'slug' => 'primary',
        'color' => '#113c6b',
    ),
    array(
        'name' => __( 'Blue Secondary', 'metcouncil' ),
        'slug' => 'secondary',
        'color' => '#0092d9',
    ),
    array(
        'name' => __( 'Red', 'metcouncil' ),
        'slug' => 'red',
        'color' => '#bd3813',
    ),
    array(
        'name' => __( 'Orange', 'metcouncil' ),
        'slug' => 'orange',
        'color' => '#ef4619',
    ),
    array(
        'name' => __( 'Purple', 'metcouncil' ),
        'slug' => 'purple',
        'color' => '#6d3695',
    ),
    array(
        'name' => __( 'Gray Dark', 'metcouncil' ),
        'slug' => 'gray-dark',
        'color' => '#444444',
    ),
    array(
        'name' => __( 'Gray Medium', 'metcouncil' ),
        'slug' => 'gray-medium',
        'color' => '#cccccc',
    ),
    array(
        'name' => __( 'Gray Light', 'metcouncil' ),
        'slug' => 'gray-light',
        'color' => '#dedede',
    ),
    array(
        'name' => __( 'Black', 'metcouncil' ),
        'slug' => 'black',
        'color' => '#212121',
    ),

  ) );

  add_image_size( 'banner', 1600, 640, true );

  if ( ! function_exists( 'jetpack_social_menu' ) ) {
    register_nav_menus( array(
      'social-menu' => __( 'Social Menu', 'metcouncil' ),
    ) );
  }

}
add_action( 'after_setup_theme', 'metcouncil_theme_support' );
