<?php
/**
 * Plugin Name:     Core Functionality
 * Plugin URI:      https://github.com/misfist/core-functionality
 * Description:     A plugin starter for core functionality
 * Author:          Pea <pea@misfist.com>
 * Author URI:      https://patrizialutz.tech
 * Text Domain:     core-functionality
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Core_Functionality
 */

 if ( ! defined( 'ABSPATH' ) ) exit;

 /**
  * Plugin Directory
  *
  * @since 0.1.0
  */
define( 'SITE_CORE_DIR', dirname( __FILE__ ) );

require_once( 'includes/security.php' );
require_once( 'includes/performance.php' );
require_once( 'includes/helpers.php' );

require_once( 'includes/custom-post-types.php' );
require_once( 'includes/custom-taxonomy.php' );
require_once( 'includes/custom-fields.php' );
require_once( 'includes/block-editor.php' );
require_once( 'includes/class-widget-reusable-block.php' );
// require_once( 'includes/class-widget-cta.php' );
// require_once( 'includes/class-widget-recent-posts.php' );

require_once( 'includes/admin.php' );
require_once( 'includes/public.php' );

require_once( 'includes/utilities.php' );


