<?php
namespace ACP\Search\Comparison\Comment;

use ACP\Helper\Select\Option;
use ACP\Helper\Select\Options;
use ACP\Search\Comparison;
use ACP\Search\Helper\Sql\ComparisonFactory;
use ACP\Search\Operators;
use ACP\Search\Query\Bindings;
use ACP\Search\Value;

class PostType extends Comparison
	implements Comparison\Values {

	public function __construct() {
		$operators = new Operators( array(
			Operators::EQ,
			Operators::NEQ,
		) );

		parent::__construct( $operators );
	}

	protected function create_query_bindings( $operator, Value $value ) {
		global $wpdb;

		$where = ComparisonFactory::create(
			'pst.post_type',
			$operator,
			$value
		)->prepare();

		$join = " JOIN {$wpdb->posts} AS pst ON {$wpdb->comments}.comment_post_ID = pst.ID";

		$bindings = new Bindings();

		return $bindings->where( $where )->join( $join );
	}

	public function get_values() {
		$options = array();

		foreach ( get_post_types( array(), 'object' ) as $post_type ) {
			if ( post_type_supports( $post_type->name, 'comments' ) ) {
				$options[] = new Option( $post_type->name, $post_type->labels->singular_name );
			}
		}

		return new Options( $options );
	}

}