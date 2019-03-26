<?php
namespace ACP\Search\Comparison\Comment;

use ACP\Helper\Select\Option;
use ACP\Helper\Select\Options;
use ACP\Search\Comparison\Values;
use ACP\Search\Operators;

class Type extends Field
	implements Values {

	public function __construct() {
		$operators = new Operators( array(
			Operators::EQ,
			Operators::NEQ,
			Operators::IS_EMPTY,
			Operators::NOT_IS_EMPTY,
		) );

		parent::__construct( $operators );
	}

	protected function get_field() {
		return 'comment_type';
	}

	public function get_values() {
		$options = array();

		foreach ( $this->get_comment_types() as $type ) {
			$label = $type;

			if ( null === $type ) {
				continue;
			}

			$options[] = new Option( $type, $label );
		}

		return new Options( $options );
	}

	/**
	 * @return array
	 */
	private function get_comment_types() {
		global $wpdb;

		return $wpdb->get_col( "SELECT DISTINCT( comment_type ) FROM {$wpdb->comments} WHERE comment_type != ''" );
	}

}