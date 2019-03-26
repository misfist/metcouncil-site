<?php
global $wpdb;

/**
 * Create Terms from CSV File
 * 
 * @format 
 */
function metcouncil_create_terms( $taxonomy ) {
    $filename = SITE_CORE_DIR . "/files/{$taxonomy}.csv";
    $array_data = csv_to_array( $filename );

    var_dump( get_current_blog_id() );
    
    if( !empty( $array_data ) && is_array( $array_data ) ) {

        foreach( $array_data as $data ) {
            // var_dump( $data['name'] );
            if( !empty( $data ) ) {
                if ( $term_exists = term_exists( $data['name'], $taxonomy ) ) {
                    echo "{$data['name']} exists!<br/>";
                } else {
                    $args = array(
                        'description' => $data['description'],
                        'slug'        => $data['slug']
                    );
                    $term = wp_insert_term( $data['name'], $taxonomy, $args );
                    // add_term_meta( $term['term_id'], 'year', date( 'Y', strtotime( $data['date'] ) ), true );
                    // add_term_meta( $term['term_id'], 'month', date( 'F', strtotime( $data['date'] ) ), true );
                    // add_term_meta( $term['term_id'], 'date', $data['date'], true );

                    if( !empty( $data['image'] ) ) {
                        if( $image_id = attachment_url_to_postid( $data['file'] ) ) {
                            add_term_meta( $term['term_id'], 'image', $image_id, true );
                        } 
                    }
                    echo "{$term['term_id']} inserted Successfully<br/>";
                }
            }
        }

    }
}

function csv_to_array( $filename, $delimiter = ',' ) {
	if( !file_exists( $filename ) || !is_readable( $filename ) ) {
        return false;
    }
	
	$header = NULL;
	$data = array();
	if ( ( $handle = fopen( $filename, 'r' ) ) !== FALSE ) {
		while ( ( $row = fgetcsv( $handle, 1000, $delimiter ) ) !== FALSE ) {
			if( !$header )
				$header = $row;
			else
				$data[] = array_combine( $header, $row );
		}
		fclose( $handle );
	}
	return $data;
}

// To convert multi dimensional array to single dimension
function core_flatter_array( $array ) { 
  if (!is_array($array)) { 
    return FALSE; 
  } 
  $result = array(); 
  foreach ( $array as $key => $value ) { 
    if ( is_array( $value ) ) { 
      $result = array_merge( $result, array_flatten( $value ) ); 
    } 
    else { 
      $result[$key] = $value; 
    } 
  } 
  return $result; 
} 
 