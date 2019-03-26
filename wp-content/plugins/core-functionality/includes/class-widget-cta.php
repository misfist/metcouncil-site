<?php
/**
 * Custom Widget - CTA
 *
 * @package    Core_Functionality
 * @subpackage Core_Functionality\Includes
 * @since      0.1.0
 * @license    GPL-2.0+
 */


class Core_CTA_Widget extends WP_Widget {

 	public function __construct() {

 		parent::__construct(
 			'core-cta-widget',
 			__( 'CTA Widget', 'core-functionality' ),
 			array(
 				'classname'   => 'core-cta-widget',
 			)
 		);

		add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts_styles' ) );
		add_action( 'admin_footer',          array( $this, 'add_admin_js' ) );

 	}

 	public function widget( $args, $instance ) {

 	}

 	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array(
			'title' 			=> '',
			'content' 		=> '',
			'link' 				=> '',
			'bg_color' 		=> '',
		) );

		// Retrieve an existing value from the database
		$title = !empty( $instance['title'] ) ? $instance['title'] : '';
		$content = !empty( $instance['content'] ) ? $instance['content'] : '';
		$link = !empty( $instance['link'] ) ? $instance['link'] : '';
		$bg_color = !empty( $instance['bg_color'] ) ? $instance['bg_color'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title_label">' . __( 'Title', 'core-functionality' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'core-functionality' ) . '" value="' . esc_attr( $title ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'content' ) . '" class="content_label">' . __( 'Content', 'core-functionality' ) . '</label>';
		echo '	<textarea id="' . $this->get_field_id( 'content' ) . '" name="' . $this->get_field_name( 'content' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'core-functionality' ) . '">' . $content . '</textarea>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'link' ) . '" class="link_label">' . __( 'Link', 'core-functionality' ) . '</label>';
		echo '	<input type="url" id="' . $this->get_field_id( 'link' ) . '" name="' . $this->get_field_name( 'link' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'core-functionality' ) . '" value="' . esc_attr( $link ) . '">';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'bg_color' ) . '" class="bg_color_label">' . __( 'Background Color', 'core-functionality' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'bg_color' ) . '" name="' . $this->get_field_name( 'bg_color' ) . '" class="color_picker" value="' . esc_attr( $bg_color ) . '"><br>';
		echo '</p>';

 	}

 	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['content'] = !empty( $new_instance['content'] ) ? strip_tags( $new_instance['content'] ) : '';
		$instance['link'] = !empty( $new_instance['link'] ) ? strip_tags( $new_instance['link'] ) : '';
		$instance['bg_color'] = !empty( $new_instance['bg_color'] ) ? strip_tags( $new_instance['bg_color'] ) : '';

		return $instance;

 	}

	public function load_scripts_styles() {

		// Color picker
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );

	}

	public function add_admin_js() {

		// Print js only once per page
		if ( did_action( 'CTA_Widget_js' ) >= 1 ) {
			return;
		}

		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('.color_picker').wpColorPicker();
			});
		</script>
		<?php

		do_action( 'CTA_Widget_js', $this );

	}

}

/**
 * [register_widgets description]
 * @return [type] [description]
 */
function core_register_cta_widget() {
	register_widget( 'Core_CTA_Widget' );
}
add_action( 'widgets_init', 'core_register_cta_widget' );
