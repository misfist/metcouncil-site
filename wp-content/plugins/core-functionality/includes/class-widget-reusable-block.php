<?php
/**
 * Custom Widget - Reusable Block
 *
 * @package    Core_Functionality
 * @subpackage Core_Functionality\Includes
 * @since      0.1.0
 * @license    GPL-2.0+
 */

class Core_Functionality_Reuseable_Block_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'reusable-block',
			__( 'Reusable Block', 'core-functionality' ),
			array(
				'description' => __( 'Display a reusable block in a widget area', 'core-functionality' ),
				'classname'   => 'reusable-block-widget',
			)
		);

	}

	public function widget( $args, $instance ) { 
        echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo '<h3 class="widget-title screen-reader-text">' . esc_html( $instance['title'] ) . '</h3>';
        }
        if( $id = $instance['block_id'] ) : ?>

            <?php 
            $block = get_post( (int) $id ); 
            echo apply_filters( 'the_content', $block->post_content ); ?>

        <?php
        endif;
        echo $args['after_widget'];
    }

	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array( 
            'title'     => '',
			'block_id'  => '',
		) );

        // Retrieve an existing value from the database
        $title = !empty( $instance['title'] ) ? $instance['title'] : '';
        $block_id = !empty( $instance['block_id'] ) ? $instance['block_id'] : '';
        
        $blocks = get_posts( [
            'post_type'         => 'wp_block',
            'orderby'           => 'title',
            'order'             => 'ASC',
            'posts_per_page'    => -1
        ] );

        // Form fields
        echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'title' ) . '" class="title_label">' . __( 'Title', 'core-functionality' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'core-functionality' ) . '" value="' . esc_attr( $title ) . '">';
        echo '</p>';
        
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'block_id' ) . '" class="block_id_label">' . __( 'Select a Block', 'core-functionality' ) . '</label>';
        echo '	<select id="' . $this->get_field_id( 'block_id' ) . '" name="' . $this->get_field_name( 'block_id' ) . '" class="widefat">';
        
        if( !empty( $blocks ) ) {
            foreach( $blocks as $block ) {
                echo '		<option value="' . intval( $block->ID ) . '" ' . selected( $block_id, intval( $block->ID ), false ) . '> ' . esc_attr( $block->post_title ) . '</option>';
            }
        }
		
		echo '	</select>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

        $instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['block_id'] = !empty( $new_instance['block_id'] ) ? strip_tags( $new_instance['block_id'] ) : '';

		return $instance;

	}

}

function register_widgets() {
	register_widget( 'Core_Functionality_Reuseable_Block_Widget' );
}
add_action( 'widgets_init', 'register_widgets' );