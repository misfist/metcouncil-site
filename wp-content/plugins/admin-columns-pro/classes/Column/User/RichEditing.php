<?php

namespace ACP\Column\User;

use AC;
use ACP\Editing;
use ACP\Filtering;
use ACP\Search;
use ACP\Sorting;

class RichEditing extends AC\Column\User\RichEditing
	implements Editing\Editable, Filtering\Filterable, Sorting\Sortable, Search\Searchable {

	public function editing() {
		return new Editing\Model\User\RichEditing( $this );
	}

	public function filtering() {
		return new Filtering\Model\User\RichEditing( $this );
	}

	public function sorting() {
		return new Sorting\Model( $this );
	}

	public function search() {
		return new Search\Comparison\User\TrueFalse( 'rich_editing' );
	}

}