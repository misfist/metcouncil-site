<?php
/**
 * Create custom taxonomy for authors
 * 
 *  @package         WP_Authors
 */

function wp_authors_get_authors( $site = 1, $field_name = 'wpcf-by' ) {

	switch_to_blog( $site );

	$args = array(
		'fields' 				 => 'ids',
		'post_type'              => array( 'post' ),
		'nopaging'               => true,
		'posts_per_page'         => '-1',
		'meta_query'             => array(
			array(
				'key'     => $field_name,
				'compare' => 'EXISTS',
			),
		),
	);

	$query = new WP_Query( $args );
	
	return $query->posts;
}

function wp_authors_create_author_terms( $args ) {

	$defaults = array(
		'field_name' 	=> 'wpcf-by',
		'taxonomy'		=> 'guest_author',
		'site'			=> 1
	);

	$args = wp_parse_args( $args, $defaults );

	extract( $args );

	$posts = wp_authors_get_authors( $site, $field_name );

	restore_current_blog();

	foreach( $posts as $post_id ) {

		if( !empty( $posts ) && !is_wp_error( $posts ) ) {

			// var_dump( $post_id );

			$author_name = get_post_meta( $post_id, $field_name, true );
			$slug = sanitize_title_with_dashes( $author_name );
	
			if( $term = term_exists( $slug, $taxonomy ) ) {

				wp_set_post_terms( $post_id, $slug, $taxonomy );

			} else {

				wp_insert_term(
					$author_name,
					$taxonomy,
					array(
						'slug'        => $slug,
					)
				);

				if( $term = term_exists( $slug, $taxonomy ) ) {
					wp_set_post_terms( $post_id, $slug, $taxonomy );
				}

			}

		}

	}
}