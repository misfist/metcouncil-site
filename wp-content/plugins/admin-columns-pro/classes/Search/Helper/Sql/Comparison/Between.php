<?php

namespace ACP\Search\Helper\Sql\Comparison;

use ACP\Search\Helper\Sql\Comparison;
use ACP\Search\Value;
use LogicException;

class Between extends Comparison {

	public function __construct( $column, Value $value ) {
		parent::__construct( $column, null, $value );
	}

	/**
	 * @inheritDoc
	 */
	protected function get_statement() {
		return $this->column . ' BETWEEN ? AND ?';
	}

	/**
	 * @inheritDoc
	 */
	public function bind_value( Value $value ) {
		$type = $value->get_type();
		$values = $value->get_value();

		if ( ! is_array( $values ) && count( $values ) !== 2 ) {
			throw new LogicException( 'This statement requires an array with two values.' );
		}

		foreach ( $values as $value ) {
			parent::bind_value( new Value( $value, $type ) );
		}

		return $this;
	}

}