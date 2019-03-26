<?php

namespace ACP\Search\Comparison\Meta;


use ACP\Search\Comparison\Meta;
use ACP\Search\Operators;
use ACP\Search\Value;

class Numeric extends Meta {

	public function __construct( $meta_key, $meta_type ) {
		$operators = new Operators( array(
			Operators::EQ,
			Operators::NEQ,
			Operators::GT,
			Operators::LT,
			Operators::BETWEEN,
			Operators::IS_EMPTY,
			Operators::NOT_IS_EMPTY,
		) );

		parent::__construct( $operators, $meta_key, $meta_type, Value::INT );
	}

}