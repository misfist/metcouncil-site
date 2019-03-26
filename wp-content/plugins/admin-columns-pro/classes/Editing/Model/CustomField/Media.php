<?php

namespace ACP\Editing\Model\CustomField;

use ACP\Editing\Model;

class Media extends Model\CustomField {

	public function get_view_settings() {
		return array(
			'type'         => 'attachment',
			'clear_button' => true,
		);
	}

}