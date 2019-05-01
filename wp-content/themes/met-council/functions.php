<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Load setup functions
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'includes/setup.php';

/**
 * Enqueue scripts and styles
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'includes/enqueue.php';

/**
 * Load customizer functions
 */
 include_once trailingslashit( get_stylesheet_directory() ) . 'includes/customizer.php';

/**
 * Load extra functions
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'includes/extras.php';

/**
 * Load widget functions
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'includes/widgets.php';

/**
 * Load admin functions
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'includes/admin.php';

/**
 * Load shortcode functions
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'includes/shortcodes.php';

/**
 * Load template tag functions
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'includes/template-tags-child.php';

/**
 * Load bootstrap nav walker class
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'includes/class-wp-bootstrap-navwalker.php';

/**
 * Load social nav walker class
 */
include_once trailingslashit( get_stylesheet_directory() ) . 'includes/class-nav-walker-social.php';
