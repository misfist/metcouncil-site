<?php
/**
 * Plugin Name:     Author Bylines
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Add one or more authors to posts.
 * Author:          Pea
 * Author URI:      https://patrizialutz.tech
 * Text Domain:     wp-authors
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         WP_Authors
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Plugin Directory
 *
 * @since 0.1.0
 */
define( 'WP_AUTHORS_DIR', dirname( __FILE__ ) );

require_once( 'inc/taxonomy.php' );
require_once( 'inc/utilities.php' );