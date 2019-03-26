<?php
/**
 * Custom Widget - CTA
 *
 * @package    Core_Functionality
 * @subpackage Core_Functionality\Includes
 * @since      0.1.0
 * @license    GPL-2.0+
 */


class Core_Recent_Posts_Widget extends WP_Widget {

 	public function __construct() {

 		parent::__construct(
 			'core-recent-posts-widget',
 			__( 'Recent Posts Widget', 'core-functionality' ),
 			array(
 				'classname'   => 'core-recent-posts-widget',
 			)
 		);

 	}

 	public function widget( $args, $instance ) {

 	}

 	public function form( $instance ) {

    // Set default values
    $instance = wp_parse_args( (array) $instance, array(
      'title' => '',
    ) );

    // Retrieve an existing value from the database
    $title = !empty( $instance['title'] ) ? $instance['title'] : '';

    // Form fields
    echo '<p>';
    echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title_label">' . __( 'Title', 'core-functionality' ) . '</label>';
    echo '	<input type="text" id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'core-functionality' ) . '" value="' . esc_attr( $title ) . '">';
    echo '</p>';

 	}

 	public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

		$instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
 	}

}

/**
 * [register_widgets description]
 * @return [type] [description]
 */
function core_register_recent_posts_widget() {
  unregister_widget( 'WP_Widget_Recent_Posts' );
	register_widget( 'Core_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'core_register_recent_posts_widget' );
