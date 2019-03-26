<?php
/**
 * Custom Taxonomy Functions
 *
 * @package    Core_Functionality
 * @subpackage Core_Functionality\Includes
 * @since      0.1.0
 * @license    GPL-2.0+
 */

if ( ! function_exists( 'core_language_taxonomy' ) ) {

   /**
    * Register Custom Taxonomy
    *
    * @return void
    */
  function core_language_taxonomy() {

    $labels = array(
      'name'                       => _x( 'Languages', 'Taxonomy General Name', 'core-functionality' ),
      'singular_name'              => _x( 'Language', 'Taxonomy Singular Name', 'core-functionality' ),
      'menu_name'                  => __( 'Languages', 'core-functionality' ),
      'all_items'                  => __( 'All Languages', 'core-functionality' ),
      'parent_item'                => __( 'Parent Language', 'core-functionality' ),
      'parent_item_colon'          => __( 'Parent Language:', 'core-functionality' ),
      'new_item_name'              => __( 'New Language Name', 'core-functionality' ),
      'add_new_item'               => __( 'Add New Language', 'core-functionality' ),
      'edit_item'                  => __( 'Edit Language', 'core-functionality' ),
      'update_item'                => __( 'Update Language', 'core-functionality' ),
      'view_item'                  => __( 'View Language', 'core-functionality' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'core-functionality' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'core-functionality' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'core-functionality' ),
      'popular_items'              => __( 'Popular Languages', 'core-functionality' ),
      'search_items'               => __( 'Search Languages', 'core-functionality' ),
      'not_found'                  => __( 'Not Found', 'core-functionality' ),
      'no_terms'                   => __( 'No items', 'core-functionality' ),
      'items_list'                 => __( 'Languages list', 'core-functionality' ),
      'items_list_navigation'      => __( 'Languages list navigation', 'core-functionality' ),
      'back_to_items'              => __( '&larr; Back to Languages', 'core-functionality' ),
    );

    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => false,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'show_in_rest'               => true,
    );
    register_taxonomy( 'language', array( 'post', 'page', 'campaign', 'kbe_knowledgebase', 'knowledge-base', 'event', 'fact_sheet' ), $args );

  }
  add_action( 'init', 'core_language_taxonomy', 0 );

 }

if ( ! function_exists( 'core_campaign_taxonomy' ) ) {

   /**
    * Register Custom Taxonomy
    *
    * @return void
    */
  function core_campaign_taxonomy() {

    $labels = array(
      'name'                       => _x( 'Campaign Categories', 'Taxonomy General Name', 'core-functionality' ),
      'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'core-functionality' ),
      'menu_name'                  => __( 'Campaign Categories', 'core-functionality' ),
      'all_items'                  => __( 'All Campaigns', 'core-functionality' ),
      'parent_item'                => __( 'Parent Campaign', 'core-functionality' ),
      'parent_item_colon'          => __( 'Parent Campaign:', 'core-functionality' ),
      'new_item_name'              => __( 'New Campaign Name', 'core-functionality' ),
      'add_new_item'               => __( 'Add New Campaign Category', 'core-functionality' ),
      'edit_item'                  => __( 'Edit Category', 'core-functionality' ),
      'update_item'                => __( 'Update Category', 'core-functionality' ),
      'view_item'                  => __( 'View Category', 'core-functionality' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'core-functionality' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'core-functionality' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'core-functionality' ),
      'popular_items'              => __( 'Popular Categories', 'core-functionality' ),
      'search_items'               => __( 'Search Categories', 'core-functionality' ),
      'not_found'                  => __( 'Not Found', 'core-functionality' ),
      'no_terms'                   => __( 'No items', 'core-functionality' ),
      'items_list'                 => __( 'Categories list', 'core-functionality' ),
      'items_list_navigation'      => __( 'Categories list navigation', 'core-functionality' ),
      'back_to_items'              => __( '&larr; Back to Categories', 'core-functionality' ),
    );

    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => false,
      'public'                     => true,
      'show_ui'                    => true,
      'show_in_quick_edit'         => false,
      'meta_box_cb'                => false,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'show_in_rest'               => false,
    );
    register_taxonomy( 'campaign-category', array( 'post', 'campaign', 'page', 'event' ), $args );

  }
  add_action( 'init', 'core_campaign_taxonomy', 0 );

}

if ( ! function_exists( 'core_campaign_status_taxonomy' ) ) {

 // Register Custom Taxonomy
 function core_campaign_status_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Campaign Statuses', 'Taxonomy General Name', 'core-functionality' ),
    'singular_name'              => _x( 'Status', 'Taxonomy Singular Name', 'core-functionality' ),
    'menu_name'                  => __( 'Campaign Statuses', 'core-functionality' ),
    'all_items'                  => __( 'All Statuses', 'core-functionality' ),
    'parent_item'                => __( 'Parent Status', 'core-functionality' ),
    'parent_item_colon'          => __( 'Parent Status:', 'core-functionality' ),
    'new_item_name'              => __( 'New Status Name', 'core-functionality' ),
    'add_new_item'               => __( 'Add New Status', 'core-functionality' ),
    'edit_item'                  => __( 'Edit Status', 'core-functionality' ),
    'update_item'                => __( 'Update Status', 'core-functionality' ),
    'view_item'                  => __( 'View Status', 'core-functionality' ),
    'separate_items_with_commas' => __( 'Separate statuses with commas', 'core-functionality' ),
    'add_or_remove_items'        => __( 'Add or remove statuses', 'core-functionality' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'core-functionality' ),
    'popular_items'              => __( 'Popular Statuses', 'core-functionality' ),
    'search_items'               => __( 'Search Statuses', 'core-functionality' ),
    'not_found'                  => __( 'Not Found', 'core-functionality' ),
    'no_terms'                   => __( 'No statuses', 'core-functionality' ),
    'items_list'                 => __( 'Status list', 'core-functionality' ),
    'items_list_navigation'      => __( 'Status list navigation', 'core-functionality' ),
  );
 	$args = array(
 		'labels'                     => $labels,
 		'hierarchical'               => false,
 		'public'                     => true,
 		'show_ui'                    => true,
    'show_in_quick_edit'         => false,
    'meta_box_cb'                => false,
 		'show_admin_column'          => true,
 		'show_in_nav_menus'          => true,
 		'show_tagcloud'              => true,
 		'show_in_rest'               => false,
 	);
 	register_taxonomy( 'campaign-status', array( 'campaign' ), $args );

 }
 add_action( 'init', 'core_campaign_status_taxonomy', 0 );

}

// if ( ! function_exists( 'core_page_taxonomy' ) ) {

//   /**
//    * Register Page Type Taxonomy
//    * Used for internal organization
//    *
//    * @return void
//    */
//   function core_page_taxonomy() {

//   	$labels = array(
//   		'name'                       => _x( 'Page Types', 'Taxonomy General Name', 'core-functionality' ),
//   		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'core-functionality' ),
//   		'menu_name'                  => __( 'Page Types', 'core-functionality' ),
//   		'all_items'                  => __( 'All Pages', 'core-functionality' ),
//   		'parent_item'                => __( 'Parent Page', 'core-functionality' ),
//   		'parent_item_colon'          => __( 'Parent Page:', 'core-functionality' ),
//   		'new_item_name'              => __( 'New Page Name', 'core-functionality' ),
//   		'add_new_item'               => __( 'Add New Page', 'core-functionality' ),
//   		'edit_item'                  => __( 'Edit Page', 'core-functionality' ),
//   		'update_item'                => __( 'Update Page', 'core-functionality' ),
//   		'view_item'                  => __( 'View Page', 'core-functionality' ),
//   		'separate_items_with_commas' => __( 'Separate items with commas', 'core-functionality' ),
//   		'add_or_remove_items'        => __( 'Add or remove items', 'core-functionality' ),
//   		'choose_from_most_used'      => __( 'Choose from the most used', 'core-functionality' ),
//   		'popular_items'              => __( 'Popular Pages', 'core-functionality' ),
//   		'search_items'               => __( 'Search Pages', 'core-functionality' ),
//   		'not_found'                  => __( 'Not Found', 'core-functionality' ),
//   		'no_terms'                   => __( 'No items', 'core-functionality' ),
//   		'items_list'                 => __( 'Pages list', 'core-functionality' ),
//   		'items_list_navigation'      => __( 'Pages list navigation', 'core-functionality' ),
//   	);
//   	$args = array(
//   		'labels'                     => $labels,
//   		'hierarchical'               => false,
//   		'public'                     => true,
//   		'show_ui'                    => true,
//       'show_in_quick_edit'         => true,
//       'meta_box_cb'                => false,
//   		'show_admin_column'          => true,
//   		'show_in_nav_menus'          => true,
//   		'show_tagcloud'              => true,
//   		'show_in_rest'               => true,
//   	);
//   	register_taxonomy( 'page-type', array( 'page' ), $args );

//   }
//   add_action( 'init', 'core_page_taxonomy', 0 );

// }

if ( ! function_exists( 'core_staff_taxonomy' ) ) {

 // Register Custom Taxonomy
 function core_staff_taxonomy() {

 	$labels = array(
 		'name'                       => _x( 'Staff Categories', 'Taxonomy General Name', 'core-functionality' ),
 		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'core-functionality' ),
 		'menu_name'                  => __( 'Staff Categories', 'core-functionality' ),
 		'all_items'                  => __( 'All Categories', 'core-functionality' ),
 		'parent_item'                => __( 'Parent Category', 'core-functionality' ),
 		'parent_item_colon'          => __( 'Parent Category:', 'core-functionality' ),
 		'new_item_name'              => __( 'New Category Name', 'core-functionality' ),
 		'add_new_item'               => __( 'Add New Category', 'core-functionality' ),
 		'edit_item'                  => __( 'Edit Category', 'core-functionality' ),
 		'update_item'                => __( 'Update Category', 'core-functionality' ),
 		'view_item'                  => __( 'View Category', 'core-functionality' ),
 		'separate_items_with_commas' => __( 'Separate categories with commas', 'core-functionality' ),
 		'add_or_remove_items'        => __( 'Add or remove categories', 'core-functionality' ),
 		'choose_from_most_used'      => __( 'Choose from the most used', 'core-functionality' ),
 		'popular_items'              => __( 'Popular Categories', 'core-functionality' ),
 		'search_items'               => __( 'Search Categories', 'core-functionality' ),
 		'not_found'                  => __( 'Not Found', 'core-functionality' ),
 		'no_terms'                   => __( 'No categories', 'core-functionality' ),
 		'items_list'                 => __( 'Category list', 'core-functionality' ),
 		'items_list_navigation'      => __( 'Category list navigation', 'core-functionality' ),
 	);
 	$args = array(
 		'labels'                     => $labels,
 		'hierarchical'               => false,
 		'public'                     => true,
 		'show_ui'                    => true,
 		'show_admin_column'          => true,
 		'show_in_nav_menus'          => true,
 		'show_tagcloud'              => true,
 		'show_in_rest'               => true,
 	);
 	register_taxonomy( 'staff-category', array( 'staff' ), $args );

 }
 add_action( 'init', 'core_staff_taxonomy', 0 );

}

/**
 * Modify Knowledge Base Category Args
 *
 * @return void
 */
function core_knowledge_base_category_taxonomy() {
  $taxonomy = 'kbe_taxonomy';
  $post_types = 'kbe_knowledgebase';

  if( $args = get_taxonomy( $taxonomy ) ) {
    $args->show_in_rest = true;

    $labels = array(
      'name'                       => _x( 'Help Categories', 'Taxonomy General Name', 'core-functionality' ),
      'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'core-functionality' ),
      'menu_name'                  => __( 'Help Categories', 'core-functionality' ),
      'all_items'                  => __( 'All Categories', 'core-functionality' ),
      'parent_item'                => __( 'Parent Category', 'core-functionality' ),
      'parent_item_colon'          => __( 'Parent Category:', 'core-functionality' ),
      'new_item_name'              => __( 'New Category Name', 'core-functionality' ),
      'add_new_item'               => __( 'Add New Category', 'core-functionality' ),
      'edit_item'                  => __( 'Edit Category', 'core-functionality' ),
      'update_item'                => __( 'Update Category', 'core-functionality' ),
      'view_item'                  => __( 'View Category', 'core-functionality' ),
      'separate_items_with_commas' => __( 'Separate categories with commas', 'core-functionality' ),
      'add_or_remove_items'        => __( 'Add or remove categories', 'core-functionality' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'core-functionality' ),
      'popular_items'              => __( 'Popular Categories', 'core-functionality' ),
      'search_items'               => __( 'Search Categories', 'core-functionality' ),
      'not_found'                  => __( 'Not Found', 'core-functionality' ),
      'no_terms'                   => __( 'No categories', 'core-functionality' ),
      'items_list'                 => __( 'Category list', 'core-functionality' ),
      'items_list_navigation'      => __( 'Category list navigation', 'core-functionality' ),
    );
    $args->labels = $labels;

    $rewrite = array(
  		'slug'                       => 'help-category',
  		'with_front'                 => true,
  		'hierarchical'               => true,
  	);

    $args->rewrite = $rewrite;

    register_taxonomy( $taxonomy, $post_types, $args );
  }

}
add_action( 'init', 'core_knowledge_base_category_taxonomy', 11 );

/**
 * Modify Knowledge Base Tag Args
 *
 * @return void
 */
function core_knowledge_base_tag_taxonomy() {
  $taxonomy = 'kbe_tags';
  $post_types = 'kbe_knowledgebase';

  if( $args = get_taxonomy( $taxonomy ) ) {
    $args->show_in_rest = true;

    $labels = array(
      'name'                       => _x( 'Help Tags', 'Taxonomy General Name', 'core-functionality' ),
      'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'core-functionality' ),
      'menu_name'                  => __( 'Help Tags', 'core-functionality' ),
      'all_items'                  => __( 'All Tags', 'core-functionality' ),
      'parent_item'                => __( 'Parent Tag', 'core-functionality' ),
      'parent_item_colon'          => __( 'Parent Tag:', 'core-functionality' ),
      'new_item_name'              => __( 'New Tag Name', 'core-functionality' ),
      'add_new_item'               => __( 'Add New Tag', 'core-functionality' ),
      'edit_item'                  => __( 'Edit Tag', 'core-functionality' ),
      'update_item'                => __( 'Update Tag', 'core-functionality' ),
      'view_item'                  => __( 'View Tag', 'core-functionality' ),
      'separate_items_with_commas' => __( 'Separate tags with commas', 'core-functionality' ),
      'add_or_remove_items'        => __( 'Add or remove tags', 'core-functionality' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'core-functionality' ),
      'popular_items'              => __( 'Popular Tags', 'core-functionality' ),
      'search_items'               => __( 'Search Tags', 'core-functionality' ),
      'not_found'                  => __( 'Not Found', 'core-functionality' ),
      'no_terms'                   => __( 'No tags', 'core-functionality' ),
      'items_list'                 => __( 'Tag list', 'core-functionality' ),
      'items_list_navigation'      => __( 'Tag list navigation', 'core-functionality' ),
    );
    $args->labels = $labels;

    $rewrite = array(
  		'slug'                       => 'help-tag',
  		'with_front'                 => true,
  		'hierarchical'               => false,
  	);
    $args->rewrite = $rewrite;

    register_taxonomy( $taxonomy, $post_types, $args );
  }
}
add_action( 'init', 'core_knowledge_base_tag_taxonomy', 11 );

/**
 * Modify Knowledge Base Tag Args
 *
 * @return void
 */
function core_event_category_taxonomy() {
  $taxonomy = 'event-category';
  $post_types = array( 'event', 'program', 'campaign' );

  if( $args = get_taxonomy( $taxonomy ) ) {
    $args->labels->name = _x( 'Event Categories', 'Taxonomy General Name', 'core-functionality' );
    $args->labels->singular_name = _x( 'Category', 'Taxonomy Singular Name', 'core-functionality' );
    $args->labels->menu_name = __( 'Event Categories', 'core-functionality' );

    $args->show_in_quick_edit = false;
    $args->meta_box_cb = false;

    register_taxonomy( $taxonomy, $post_types, $args );
  }
}
add_action( 'init', 'core_event_category_taxonomy', 11 );
