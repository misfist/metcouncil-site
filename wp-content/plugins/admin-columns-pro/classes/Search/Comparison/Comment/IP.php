<?php

namespace ACP\Search\Comparison\Comment;


use ACP\Search\Operators;

class IP extends Field {

	public function __construct() {
		$operators = new Operators( array(
			Operators::EQ,
			Operators::CONTAINS,
			Operators::NOT_CONTAINS,
			Operators::BEGINS_WITH,
			Operators::ENDS_WITH,
		) );

		parent::__construct( $operators );
	}

	protected function get_field() {
		return 'comment_author_IP';
	}

}