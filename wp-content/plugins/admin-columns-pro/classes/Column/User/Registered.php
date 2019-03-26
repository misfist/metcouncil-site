<?php

namespace ACP\Column\User;

use AC;
use ACP\Editing;
use ACP\Filtering;
use ACP\Search;
use ACP\Sorting;

class Registered extends AC\Column\User\Registered
	implements Filtering\Filterable, Sorting\Sortable, Editing\Editable, Search\Searchable {

	public function sorting() {
		$model = new Sorting\Model( $this );
		$model->set_orderby( 'registered' );

		return $model;
	}

	public function filtering() {
		return new Filtering\Model\User\Registered( $this );
	}

	public function editing() {
		return new Editing\Model\User\Registered( $this );
	}

	public function search() {
		return new Search\Comparison\User\Date\Registered();
	}

}