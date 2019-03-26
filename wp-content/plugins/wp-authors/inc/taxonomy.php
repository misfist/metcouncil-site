<?php
/**
 * Create custom taxonomy for authors
 * 
 *  @package         WP_Authors
 */

 function wp_authors_author_taxonomy() {

    $taxonomy = 'guest_author';

	$labels = array(
		'name'                       => _x( 'Authors', 'Taxonomy General Name', 'wp-authors' ),
		'singular_name'              => _x( 'Author', 'Taxonomy Singular Name', 'wp-authors' ),
		'menu_name'                  => __( 'Authors', 'wp-authors' ),
		'all_items'                  => __( 'All Authors', 'wp-authors' ),
		'parent_item'                => __( 'Parent Author', 'wp-authors' ),
		'parent_item_colon'          => __( 'Parent Author:', 'wp-authors' ),
		'new_item_name'              => __( 'New Author Name', 'wp-authors' ),
		'add_new_item'               => __( 'Add New Author', 'wp-authors' ),
		'edit_item'                  => __( 'Edit Author', 'wp-authors' ),
		'update_item'                => __( 'Update Author', 'wp-authors' ),
		'view_item'                  => __( 'View Author', 'wp-authors' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'wp-authors' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'wp-authors' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wp-authors' ),
		'popular_items'              => __( 'Popular Authors', 'wp-authors' ),
		'search_items'               => __( 'Search Authors', 'wp-authors' ),
		'not_found'                  => __( 'Not Found', 'wp-authors' ),
		'no_terms'                   => __( 'No items', 'wp-authors' ),
		'items_list'                 => __( 'Authors list', 'wp-authors' ),
		'items_list_navigation'      => __( 'Authors list navigation', 'wp-authors' ),
	);
	$rewrite = array(
		'slug'                       => 'authors',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$capabilities = array(
		'manage_terms'               => 'edit_posts',
		'edit_terms'                 => 'edit_posts',
		'delete_terms'               => 'delete_users',
		'assign_terms'               => 'edit_posts',
	);
	$args = array(
		'labels'                     => apply_filters( 'guest_author_labels', $labels ),
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => apply_filters( 'guest_author_labels', $rewrite ),
		'capabilities'               => apply_filters( 'guest_author_labels', $capabilities ),
		'show_in_rest'               => true,
	);
	register_taxonomy( $taxonomy, array( 'post' ), apply_filters( 'guest_author_taxonomy_args', $args ) );

}
add_action( 'init', 'wp_authors_author_taxonomy', 0 );