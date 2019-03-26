<?php

namespace ACP\Editing\Model\User;

use ACP\Editing\Model;
use WP_Error;

class Registered extends Model {

	public function get_view_settings() {
		return array(
			'type' => 'date_time',
		);
	}

	public function save( $id, $value ) {
		$result = wp_update_user( (object) array(
			'ID'              => $id,
			'user_registered' => $value,
		) );

		return ! $result instanceof WP_Error;
	}

}