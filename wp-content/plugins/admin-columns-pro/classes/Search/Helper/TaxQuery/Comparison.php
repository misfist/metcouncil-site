<?php

namespace ACP\Search\Helper\TaxQuery;

use ACP\Search\Value;

class Comparison {

	/**
	 * @var string
	 */
	protected $taxonomy;

	/**
	 * @var string
	 */
	protected $operator;

	/**
	 * @var string
	 */
	private $field;

	/**
	 * @var Value
	 */
	private $terms;

	/**
	 * @param string $taxonomy
	 * @param string $operator
	 * @param Value  $terms
	 * @param string $field
	 */
	public function __construct( $taxonomy, $operator, Value $terms, $field = 'term_id' ) {
		$this->taxonomy = $taxonomy;
		$this->operator = $operator;
		$this->terms = $terms;
		$this->field = $field;
	}

	/**
	 * @return array
	 */
	public function get_expression() {
		$args = array(
			'taxonomy' => $this->taxonomy,
			'terms'    => $this->terms,
			'operator' => $this->operator,
			'field'    => $this->field,
		);

		return $args;
	}

}