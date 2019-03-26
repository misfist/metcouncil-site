<?php

namespace ACP\Editing\Model\Taxonomy;

use ACP\Editing\Model;

class Name extends Model\Taxonomy {

	public function get_view_settings() {
		return array(
			'type'         => 'text',
			'js'           => array(
				'selector' => 'a.row-title',
			),
			'display_ajax' => false,
		);
	}

	public function get_edit_value( $id ) {
		return ac_helper()->taxonomy->get_term_field( 'name', $id, $this->column->get_taxonomy() );
	}

	public function save( $id, $value ) {
		return $this->update_term( $id, array( 'name' => $value ) );
	}

}