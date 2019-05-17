<?php
/**
 * Custom Post Type Functions
 *
 * @package    Core_Functionality
 * @subpackage Core_Functionality\Includes
 * @since      0.1.0
 * @license    GPL-2.0+
 */

if ( ! function_exists( 'core_campaign_post_type' ) ) {

  /**
   * Register Custom Post Type
   *
   * @link https://developer.wordpress.org/reference/functions/register_post_type/
   *
   * @return void
   */
  function core_campaign_post_type() {

    $labels = array(
      'name'                  => _x( 'Campaigns', 'Post Type General Name', 'core-functionality' ),
      'singular_name'         => _x( 'Campaign', 'Post Type Singular Name', 'core-functionality' ),
      'menu_name'             => __( 'Campaigns', 'core-functionality' ),
      'name_admin_bar'        => __( 'Campaign', 'core-functionality' ),
      'archives'              => __( 'Campaign Archives', 'core-functionality' ),
      'attributes'            => __( 'Campaign Attributes', 'core-functionality' ),
      'parent_item_colon'     => __( 'Parent Campaign:', 'core-functionality' ),
      'all_items'             => __( 'All Campaigns', 'core-functionality' ),
      'add_new_item'          => __( 'Add New Campaign', 'core-functionality' ),
      'add_new'               => __( 'Add New', 'core-functionality' ),
      'new_item'              => __( 'New Campaign', 'core-functionality' ),
      'edit_item'             => __( 'Edit Campaign', 'core-functionality' ),
      'update_item'           => __( 'Update Campaign', 'core-functionality' ),
      'view_item'             => __( 'View Campaign', 'core-functionality' ),
      'view_items'            => __( 'View Campaign', 'core-functionality' ),
      'search_items'          => __( 'Search Campaign', 'core-functionality' ),
      'not_found'             => __( 'Not found', 'core-functionality' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'core-functionality' ),
      'featured_image'        => __( 'Campaign Photo', 'core-functionality' ),
      'set_featured_image'    => __( 'Set campaign photo', 'core-functionality' ),
      'remove_featured_image' => __( 'Remove campaign photo', 'core-functionality' ),
      'use_featured_image'    => __( 'Use as campaign photo', 'core-functionality' ),
      'insert_into_item'      => __( 'Insert into item', 'core-functionality' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'core-functionality' ),
      'items_list'            => __( 'Campaign list', 'core-functionality' ),
      'items_list_navigation' => __( 'Campaign list navigation', 'core-functionality' ),
      'filter_items_list'     => __( 'Filter items list', 'core-functionality' ),
      );

    $args = array(
      'label'                 => __( 'Campaign', 'core-functionality' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
      'taxonomies'            => array( 'campaign-category' ),
      'hierarchical'          => true,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'menu_icon'             => 'dashicons-megaphone',
      'show_in_rest'          => true,
    );
    register_post_type( 'campaign', $args );

  }
  add_action( 'init', 'core_campaign_post_type', 0 );

}

if ( ! function_exists( 'core_staff_post_type' ) ) {

  /**
   * Register Custom Post Type
   *
   * @link https://developer.wordpress.org/reference/functions/register_post_type/
   *
   * @return void
   */
  function core_staff_post_type() {

    $template = array(
      array( 'core/paragraph', array(
          'placeholder' => __( 'Add Title...', 'core-functionality' ),
          'className'   => 'person-title'
      ) ),
      array( 'core/paragraph', array(
        'placeholder' => __( 'Add Email...', 'core-functionality' ),
        'className'   => 'person-email'
      ) ),
      array( 'core/paragraph', array(
        'placeholder' => __( 'Add Phone...', 'core-functionality' ),
        'className'   => 'person-phone'
      ) ),
      array( 'core/paragraph', array(
          'placeholder' => __( 'Add Bio...', 'core-functionality' ),
          'className'   => 'person-bio'
      ) ),
    );

    $labels = array(
      'name'                  => _x( 'People', 'Post Type General Name', 'core-functionality' ),
      'singular_name'         => _x( 'Person', 'Post Type Singular Name', 'core-functionality' ),
      'menu_name'             => __( 'People', 'core-functionality' ),
      'name_admin_bar'        => __( 'Person', 'core-functionality' ),
      'archives'              => __( 'Person Archives', 'core-functionality' ),
      'attributes'            => __( 'Person Attributes', 'core-functionality' ),
      'parent_item_colon'     => __( 'Parent Person:', 'core-functionality' ),
      'all_items'             => __( 'All People', 'core-functionality' ),
      'add_new_item'          => __( 'Add New Person', 'core-functionality' ),
      'add_new'               => __( 'Add New', 'core-functionality' ),
      'new_item'              => __( 'New Person', 'core-functionality' ),
      'edit_item'             => __( 'Edit Person', 'core-functionality' ),
      'update_item'           => __( 'Update Person', 'core-functionality' ),
      'view_item'             => __( 'View Person', 'core-functionality' ),
      'view_items'            => __( 'View Person', 'core-functionality' ),
      'search_items'          => __( 'Search Persons', 'core-functionality' ),
      'not_found'             => __( 'Not found', 'core-functionality' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'core-functionality' ),
      'featured_image'        => __( 'Person Photo', 'core-functionality' ),
      'set_featured_image'    => __( 'Set person\'s photo', 'core-functionality' ),
      'remove_featured_image' => __( 'Remove person\'s photo', 'core-functionality' ),
      'use_featured_image'    => __( 'Use as person\'s photo', 'core-functionality' ),
      'insert_into_item'      => __( 'Insert into item', 'core-functionality' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'core-functionality' ),
      'items_list'            => __( 'Person list', 'core-functionality' ),
      'items_list_navigation' => __( 'Person list navigation', 'core-functionality' ),
      'filter_items_list'     => __( 'Filter items list', 'core-functionality' ),
      );

    $args = array(
      'label'                 => __( 'Person', 'core-functionality' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail' ),
      'taxonomies'            => array( 'staff-category' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 7,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'menu_icon'             => 'dashicons-groups',
      'show_in_rest'          => true,
      'template'              => $template,
    );
    register_post_type( 'staff', $args );

  }
  add_action( 'init', 'core_staff_post_type', 0 );

}

if ( ! function_exists( 'core_program_post_type' ) ) {

  // Register Custom Post Type
  function core_program_post_type() {

  	$labels = array(
  		'name'                  => _x( 'Programs', 'Post Type General Name', 'core-functionality' ),
  		'singular_name'         => _x( 'Program', 'Post Type Singular Name', 'core-functionality' ),
  		'menu_name'             => __( 'Programs', 'core-functionality' ),
  		'name_admin_bar'        => __( 'Programs', 'core-functionality' ),
  		'archives'              => __( 'Program Archives', 'core-functionality' ),
  		'attributes'            => __( 'Program Attributes', 'core-functionality' ),
  		'parent_item_colon'     => __( 'Parent Program:', 'core-functionality' ),
  		'all_items'             => __( 'All Programs', 'core-functionality' ),
  		'add_new_item'          => __( 'Add New Program', 'core-functionality' ),
  		'add_new'               => __( 'Add New', 'core-functionality' ),
  		'new_item'              => __( 'New Program', 'core-functionality' ),
  		'edit_item'             => __( 'Edit Program', 'core-functionality' ),
  		'update_item'           => __( 'Update Program', 'core-functionality' ),
  		'view_item'             => __( 'View Program', 'core-functionality' ),
  		'view_items'            => __( 'View Programs', 'core-functionality' ),
  		'search_items'          => __( 'Search Program', 'core-functionality' ),
  		'not_found'             => __( 'Not found', 'core-functionality' ),
  		'not_found_in_trash'    => __( 'Not found in Trash', 'core-functionality' ),
  		'featured_image'        => __( 'Featured Image', 'core-functionality' ),
  		'set_featured_image'    => __( 'Set featured image', 'core-functionality' ),
  		'remove_featured_image' => __( 'Remove featured image', 'core-functionality' ),
  		'use_featured_image'    => __( 'Use as featured image', 'core-functionality' ),
  		'insert_into_item'      => __( 'Insert into item', 'core-functionality' ),
  		'uploaded_to_this_item' => __( 'Uploaded to this item', 'core-functionality' ),
  		'items_list'            => __( 'Programs list', 'core-functionality' ),
  		'items_list_navigation' => __( 'Programs list navigation', 'core-functionality' ),
  		'filter_items_list'     => __( 'Filter items list', 'core-functionality' ),
  	);
  	$args = array(
  		'label'                 => __( 'Program', 'core-functionality' ),
  		'description'           => __( '', 'core-functionality' ),
  		'labels'                => $labels,
  		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
  		'taxonomies'            => array( 'program-category' ),
  		'hierarchical'          => false,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 5,
  		'menu_icon'             => 'dashicons-admin-multisite',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'can_export'            => true,
  		'has_archive'           => true,
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'capability_type'       => 'page',
      'show_in_rest'          => true,
  	);
  	register_post_type( 'program', $args );

  }
  add_action( 'init', 'core_program_post_type', 0 );

}

/**
 * Filter the Products CPT to register more options.
 *
 * @param $args       array    The original CPT args.
 * @param $post_type  string   The CPT slug.
 *
 * @return array
 */
function core_kb_register_post_type_args( $args, $post_type ) {

	if ( 'kbe_knowledgebase' !== $post_type ) {
		return $args;
	}

  $labels = array(
    'name'                  => _x( 'Help & Answers', 'Post Type General Name', 'core-functionality' ),
    'singular_name'         => _x( 'Help & Answers', 'Post Type Singular Name', 'core-functionality' ),
    'menu_name'             => __( 'Help & Answers', 'core-functionality' ),
    'name_admin_bar'        => __( 'Article', 'core-functionality' ),
    'archives'              => __( 'Article Archives', 'core-functionality' ),
    'attributes'            => __( 'Article Attributes', 'core-functionality' ),
    'parent_item_colon'     => __( 'Parent Article:', 'core-functionality' ),
    'all_items'             => __( 'All Articles', 'core-functionality' ),
    'add_new_item'          => __( 'Add New Article', 'core-functionality' ),
    'add_new'               => __( 'Add New', 'core-functionality' ),
    'new_item'              => __( 'New Article', 'core-functionality' ),
    'edit_item'             => __( 'Edit Article', 'core-functionality' ),
    'update_item'           => __( 'Update Article', 'core-functionality' ),
    'view_item'             => __( 'View Article', 'core-functionality' ),
    'view_items'            => __( 'View Articles', 'core-functionality' ),
    'search_items'          => __( 'Search Article', 'core-functionality' ),
    'not_found'             => __( 'Not found', 'core-functionality' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'core-functionality' ),
    'featured_image'        => __( 'Featured Image', 'core-functionality' ),
    'set_featured_image'    => __( 'Set featured image', 'core-functionality' ),
    'remove_featured_image' => __( 'Remove featured image', 'core-functionality' ),
    'use_featured_image'    => __( 'Use as featured image', 'core-functionality' ),
    'insert_into_item'      => __( 'Insert into item', 'core-functionality' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'core-functionality' ),
    'items_list'            => __( 'Articles list', 'core-functionality' ),
    'items_list_navigation' => __( 'Articles list navigation', 'core-functionality' ),
    'filter_items_list'     => __( 'Filter items list', 'core-functionality' ),
  );

  $custom_args = array(
    'label'                 => __( 'Article', 'core-functionality' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'page-attributes', 'excerpt' ),
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'menu_icon'             => 'dashicons-lightbulb',
    'show_in_rest'          => true,
    'template' => array(
      array( 'corefunctionality/translation-title', array(
        'placeholder' => __( 'Add Translation Title...', 'core-functionality' ),
      ) ),
      array( 'corefunctionality/intro', array(
        'placeholder' => __( 'Add Intro...', 'core-functionality' ),
      ) ),
      array( 'core/paragraph', array(
        'placeholder' => __( 'Add content...', 'core-functionality' ),
      ) ),
    ),
  );

	return array_merge( $args, $custom_args );
}
add_filter( 'register_post_type_args', 'core_kb_register_post_type_args', 10, 2 );
