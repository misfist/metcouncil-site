<?php

namespace ACP\Helper\Select\Formatter;

use ACP\Helper\Select\Entities;
use ACP\Helper\Select\Formatter;
use WP_User;

class UserName extends Formatter {

	/**
	 * @var array
	 */
	private $properties;

	public function __construct( Entities $entities, $properties = array() ) {
		$this->properties = array_merge( array(
			'first_name',
			'last_name',
		), $properties );

		parent::__construct( $entities );
	}

	/**
	 * @param WP_User $user
	 *
	 * @return string
	 */
	public function get_label( $user ) {
		$name_parts = array();

		foreach ( $this->properties as $key ) {
			if ( $user->$key ) {
				$name_parts[] = $user->$key;
			}
		}

		$label = implode( ' ', $name_parts );

		if ( ! $label ) {
			$label = $user->user_login;
		}

		$suffix = $user->user_email ? $user->user_email : $user->user_login;

		$label .= sprintf( esc_html__(' (#%1$s &ndash; %2$s )'), $user->ID, $suffix );

		return $label;
	}

}