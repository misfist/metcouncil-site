<?php

namespace ACP\Column;

use AC;
use ACP\Column\CustomField\EditingModelFactory;
use ACP\Column\CustomField\ExportModelFactory;
use ACP\Column\CustomField\FilteringModelFactory;
use ACP\Column\CustomField\SearchComparisonFactory;
use ACP\Column\CustomField\SortingModelFactory;
use ACP\Editing;
use ACP\Export;
use ACP\Filtering;
use ACP\Search;
use ACP\Settings;
use ACP\Sorting;

/**
 * @since 4.0
 */
class CustomField extends AC\Column\CustomField
	implements Sorting\Sortable, Editing\Editable, Filtering\Filterable, Export\Exportable, Search\Searchable {

	/**
	 * @return Sorting\Model
	 */
	public function sorting() {
		return SortingModelFactory::create( $this->get_field_type(), $this );
	}

	/**
	 * @return Editing\Model
	 */
	public function editing() {
		return EditingModelFactory::create( $this->get_field_type(), $this );
	}

	/**
	 * @return Filtering\Model
	 */
	public function filtering() {
		return FilteringModelFactory::create( $this->get_field_type(), $this );
	}

	/**
	 * @return Search\Comparison\Meta|false
	 */
	public function search() {
		return SearchComparisonFactory::create( $this->get_field_type(), $this->get_meta_key(), $this->get_meta_type() );
	}

	/**
	 * @return Export\Model
	 */
	public function export() {
		return ExportModelFactory::create( $this->get_field_type(), $this );
	}

	/**
	 * Settings
	 */
	public function register_settings() {
		$this->add_setting( new Settings\Column\CustomField( $this ) )
		     ->add_setting( new AC\Settings\Column\BeforeAfter( $this ) );
	}

}