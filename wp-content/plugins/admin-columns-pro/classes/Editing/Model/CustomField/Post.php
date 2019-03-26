<?php

namespace ACP\Editing\Model\CustomField;

use ACP\Editing\Model;
use ACP\Editing\PaginatedOptions;
use ACP\Helper\Select;
use ACP\Helper\Select\Formatter;
use ACP\Helper\Select\Group;
use ACP\Settings;

class Post extends Model\CustomField
	implements PaginatedOptions {

	public function get_edit_value( $object_id ) {
		$raw = $this->column->get_raw_value( $object_id );

		/**
		 * @var Settings\Column\CustomFieldType $field_type
		 */
		$field_type = $this->column->get_setting( 'field_type' );

		// Post ID's
		$ids = $field_type->format( $raw, $object_id )->all();

		$values = false;

		foreach ( $ids as $id ) {
			$values[ $id ] = ac_helper()->post->get_title( $id );
		}

		return $values;
	}

	public function get_view_settings() {
		return array(
			'type'          => 'select2_dropdown',
			'ajax_populate' => true,
		);
	}

	public function get_paginated_options( $s, $paged, $id = null ) {
		$entities = new Select\Entities\Post( array(
			's'     => $s,
			'paged' => $paged,
		) );

		return new Select\Options\Paginated(
			$entities,
			new Group\PostType(
				new Formatter\PostTitle( $entities )
			)
		);
	}

}