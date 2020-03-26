<?php
/**
 * Core Gutenberg Functions
 *
 * @package    Core_Functionality
 * @subpackage Core_Functionality\Includes
 * @since      0.1.0
 * @license    GPL-2.0+
 */

/**
 * Block Initializer.
 */
require_once SITE_CORE_DIR . '/blocks/src/init.php';

/**
 * Register Gutenberg Category
 *
 * @param array $categories
 * @param obj $post
 * @return void
 */
function core_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'content',
				'title' => __( 'Content', 'core-functionality' ),
			),
		)
	);
}
add_filter( 'block_categories', 'core_block_category', 10, 2 );

/**
 * Templates and Page IDs without editor
 *
 */
function core_disable_editor( $id = false ) {

	$excluded_templates = array(
		'page-templates/page-home.php'
	);

	$excluded_ids = array(
		// get_option( 'page_on_front' )
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 *
 */
function core_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( core_disable_editor( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'core_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'core_disable_gutenberg', 10, 2 );

/**
 * Add Reuseable Blocks Admin Menu
 *
 * @see https://developer.wordpress.org/reference/functions/add_menu_page/
 */
function core_add_admin_menu() {

	add_menu_page(
		esc_html__( 'Blocks', 'core-functionality' ),
		esc_html__( 'Blocks', 'core-functionality' ),
		'edit_plugins',
		'edit.php?post_type=wp_block',
		'',
		'dashicons-layout',
		60
	);

}
add_action( 'admin_menu', 'core_add_admin_menu' );

