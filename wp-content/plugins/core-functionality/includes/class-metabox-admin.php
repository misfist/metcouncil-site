<?php
/**
 * Custom Dashboard Metabox Class
 *
 * @package    Core_Functionality
 * @subpackage Core_Functionality\Includes
 * @since      0.1.0
 * @license    GPL-2.0+
 */

class Core_Dashboard_Widget {

	public function __construct() {
		
		add_action( 'wp_dashboard_setup', array( $this, 'add_dashboard_widget' ) );

	}

	public function add_dashboard_widget() {

		wp_add_dashboard_widget(
			'admin-help-widget',
			__( 'Help', 'core-functionality' ),
			array( $this, 'render_dashboard_widget' ),
			array( $this, 'save_dashboard_widget' )
		);

	}

	public function render_dashboard_widget() {


	}

	public function save_dashboard_widget() {


	}

}

new Core_Dashboard_Widget;