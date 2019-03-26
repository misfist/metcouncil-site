<?php

namespace ACP\Search\Comparison\Meta;

use ACP\Helper\Select;
use ACP\Helper\Select\Formatter;
use ACP\Search\Comparison\Meta;
use ACP\Search\Comparison\SearchableValues;
use ACP\Search\Operators;
use WP_Term;

class Post extends Meta
	implements SearchableValues {

	/** @var string|array */
	private $post_type = 'any';

	/** @var WP_Term[] */
	private $terms = array();

	public function __construct( $meta_key, $meta_type, $post_type = false, array $terms = array() ) {
		$operators = new Operators( array(
			Operators::EQ,
			Operators::NEQ,
			Operators::IS_EMPTY,
			Operators::NOT_IS_EMPTY,
		) );

		$this->set_post_type( $post_type );
		$this->set_terms( $terms );

		parent::__construct( $operators, $meta_key, $meta_type );
	}

	public function get_values( $search, $page ) {

		$entities = new Select\Entities\Post( array(
			's'         => $search,
			'paged'     => $page,
			'post_type' => $this->post_type,
			'tax_query' => $this->get_tax_query(),
		) );

		return new Select\Options\Paginated(
			$entities,
			new Select\Group\PostType(
				new Formatter\PostTitle( $entities )
			)
		);
	}

	/**
	 * @param string $post_type
	 */
	private function set_post_type( $post_type ) {
		if ( $post_type ) {
			$this->post_type = $post_type;
		}
	}

	/**
	 * @param WP_Term[] $terms
	 */
	private function set_terms( array $terms ) {
		$this->terms = $terms;
	}

	/**
	 * @return array
	 */
	protected function get_tax_query() {
		$tax_query = array();

		foreach ( $this->terms as $term ) {
			$tax_query[] = array(
				'taxonomy' => $term->taxonomy,
				'field'    => 'slug',
				'terms'    => $term->slug,
			);
		}

		return $tax_query;
	}

}