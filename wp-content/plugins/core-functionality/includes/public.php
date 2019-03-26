<?php
/**
 * Core Public Functions
 *
 * @package    Core_Functionality
 * @subpackage Core_Functionality\Includes
 * @since      0.1.0
 * @license    GPL-2.0+
 */


 function core_body_class( $classes ) {
   $slug = sanitize_title_with_dashes( get_bloginfo( 'name' ) );
   $classes[] = $slug;

   if( is_multisite() ) {
     $id = get_current_blog_id();
     $classes[] = 'site-id-' . $id;
   }

   return $classes;
 }

 add_filter( 'body_class', 'core_body_class' );
