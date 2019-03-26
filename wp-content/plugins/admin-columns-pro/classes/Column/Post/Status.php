<?php

namespace ACP\Column\Post;

use AC;
use ACP\Editing;
use ACP\Filtering;
use ACP\Search;
use ACP\Sorting;

class Status extends AC\Column\Post\Status
	implements Editing\Editable, Filtering\Filterable, Sorting\Sortable, Search\Searchable {

	public function sorting() {
		return new Sorting\Model( $this );
	}

	public function editing() {
		return new Editing\Model\Post\Status( $this );
	}

	public function filtering() {
		return new Filtering\Model\Post\Status( $this );
	}

	public function search() {
		return new Search\Comparison\Post\Status( $this->get_post_type() );
	}

}