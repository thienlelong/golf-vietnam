<?php 
/**
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function wrdpbm_customize_register( $wp_customize ) {
	
	$wp_customize->add_section( 'general_settings' , array(
		'title'      => __('General Settings', 'wrdpbm'),
		'priority'   => 30,
	) );
	
	$wp_customize->add_setting( 'logo', array() );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
		'label' 	=> __( 'Logo', 'wrdpbm' ),
		'section' 	=> 'general_settings',
		'settings' 	=> 'logo',
		'priority' 	=> 10
	) ) );
	
}
add_action( 'customize_register', 'wrdpbm_customize_register', 11 );
