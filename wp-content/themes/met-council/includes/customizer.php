<?php
/**
 * Customizer functions
 *
 * @package understrap
 * @subpackage metcouncil
 */

/**
 * Add Customizer Settings

 * @return void
 */
 function metcouncil_customize_register( $wp_customize ) {

  $default = ( get_theme_mod( 'custom_logo' ) ) ? wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) : null;
  
  $wp_customize->add_setting( 'footer_image' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
    'default'       => $default
  ) );

  $wp_customize->add_control(   
    new WP_Customize_Image_Control(
      $wp_customize,
      'footer_image_control',
      array(
        'label'      => __( 'Footer Image', 'metcouncil' ),
        'section'    => 'title_tagline',
        'settings'   => 'footer_image',
      )
  ) );

  $wp_customize->add_setting( 'copyright' , array(
    'type'          => 'theme_mod',
    'transport'     => 'refresh',
    'default'       => __( 'Metropolitan Council on Housing is a 501(c)(4) nonprofit organization.', 'metcouncil' ),
  ) );

  $wp_customize->add_control( 'copyright_control', array(
    'label'      => __( 'Copyright', 'metcouncil' ),
    'section'    => 'title_tagline',
    'settings'   => 'copyright',
    'type'       => 'textarea',
  ) );
      
}
  add_action( 'customize_register', 'metcouncil_customize_register' );