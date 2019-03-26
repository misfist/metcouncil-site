<?php
/**
 * Core Admin Functions
 *
 * @package    Core_Functionality
 * @subpackage Core_Functionality\Includes
 * @since      0.1.0
 * @license    GPL-2.0+
 */


/**
 * Modify Title Placeholder Text
 *
 * @param  string $title
 * @return string $title
 */
function core_enter_title_here( $title ) {

 if  ( 'staff' == get_post_type() ) {
   return __( 'Enter staff member name here', 'core-functionality' );
 }

 return $title;
}
add_filter( 'enter_title_here', 'core_enter_title_here' );

/**
 * Disable Comments
 * Disable comments from all post types
 * @return void
 */
function core_disable_comments() {
  $post_types = get_post_types();
  foreach ( $post_types as $post_type ) {
    if( post_type_supports( $post_type,'comments' ) ) {
      remove_post_type_support( $post_type,'comments' );
      remove_post_type_support( $post_type,'trackbacks' );
    }
  }
}
add_action( 'admin_init', 'core_disable_comments' );
