<?php
/*
Plugin Name: Admin Columns Pro
Version: 4.5.5
Description: Customize columns on the administration screens for post(types), users and other content. Filter and sort content, and edit posts directly from the posts overview. All via an intuitive, easy-to-use drag-and-drop interface.
Author: AdminColumns.com
Author URI: https://www.admincolumns.com
Plugin URI: https://www.admincolumns.com
Requires PHP: 5.3.6
Text Domain: codepress-admin-columns
Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_admin() ) {
	return;
}

define( 'ACP_FILE', __FILE__ );
define( 'ACP_VERSION', '4.5.5' );

/**
 * Deactivate Admin Columns
 */
require_once ABSPATH . 'wp-admin/includes/plugin.php';

deactivate_plugins( 'codepress-admin-columns/codepress-admin-columns.php' );

/**
 * Load integrated Admin Columns
 */
add_action( 'plugins_loaded', function () {
	require_once 'admin-columns/codepress-admin-columns.php';
} );

/**
 * Load Admin Columns Pro
 */
add_action( 'after_setup_theme', function () {
	$dependencies = new AC\Dependencies( plugin_basename( ACP_FILE ), ACP_VERSION );
	$dependencies->requires_php( '5.3.6' );

	if ( $dependencies->has_missing() ) {
		return;
	}

	require_once __DIR__ . '/api.php';

	AC\Autoloader::instance()->register_prefix( 'ACP', __DIR__ . '/classes' );

	// Backward compatible underscore loader
	AC\Autoloader\Underscore::instance()
	                        ->add_alias( 'ACP\AdminColumnsPro', 'ACP' )
	                        ->add_alias( 'ACP\Editing\Editable', 'ACP_Column_EditingInterface' )
	                        ->add_alias( 'ACP\Export\Exportable', 'ACP_Export_Column' )
	                        ->add_alias( 'ACP\Sorting\Sortable', 'ACP_Column_SortingInterface' )
	                        ->add_alias( 'ACP\Filtering\Filterable', 'ACP_Column_FilteringInterface' );

	ACP();
}, 5 );

/**
 * Deactivate incompatible integrations
 */
add_action( 'after_setup_theme', function () {
	// Minimum required version. False is incompatible.
	$versions = array(
		'ac-addon-acf/ac-addon-acf.php'                         => '2.5',
		'ac-addon-buddypress/ac-addon-buddypress.php'           => '1.4',
		'ac-addon-events-calendar/ac-addon-events-calendar.php' => '1.4',
		'ac-addon-ninjaforms/ac-addon-ninjaforms.php'           => '1.3',
		'ac-addon-pods/ac-addon-pods.php'                       => '1.4',
		'ac-addon-types/ac-addon-types.php'                     => '1.5',
		'ac-addon-woocommerce/ac-addon-woocommerce.php'         => '3.3',
		'media-library-assistant/index.php'                     => '2.78',
	);

	// Deprecated basenames since 4.2
	$versions['cac-addon-acf/cac-addon-acf.php'] = $versions['ac-addon-acf/ac-addon-acf.php'];
	$versions['cac-addon-woocommerce/cac-addon-woocommerce.php'] = $versions['ac-addon-woocommerce/ac-addon-woocommerce.php'];

	$plugins = (array) get_plugins();

	foreach ( $versions as $basename => $version ) {
		if ( ! array_key_exists( $basename, $plugins ) ) {
			continue;
		}

		$current_version = $plugins[ $basename ]['Version'];

		if ( ! $version || version_compare( $version, $current_version, '>' ) ) {
			deactivate_plugins( array( $basename ) );

			add_action( 'after_plugin_row_' . $basename, function ( $plugin_file ) {
				$message = sprintf( __( 'This plugin is not compatible with %s. We disabled it because it might stop the WordPress Admin from working properly. Try updating this plugin to the latest version and then activate it again. ', 'codepress-admin-columns' ), 'Admin Columns Pro ' . ACP_VERSION );

				?>

				<tr class="plugin-update-tr">
					<td colspan="3" class="plugin-update colspanchange">
						<style>
							.plugins tr[data-plugin='<?php echo $plugin_file; ?>'] th,
							.plugins tr[data-plugin='<?php echo $plugin_file; ?>'] td {
								box-shadow: none !important;
							}
						</style>

						<div class="update-message notice inline notice-error notice-alt">
							<p><?php echo wp_kses_post( $message ); ?></p>
						</div>
					</td>
				</tr>

				<?php
			}, 5 );
		}
	}
} );