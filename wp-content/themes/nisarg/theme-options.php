<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option( 'option_tree_settings', array() );

	/**
	 * Custom settings array that will eventually be
	 * passes to the OptionTree Settings API Class.
	 */
	$custom_settings = array(
		'sections' => array(
			array(
				'id' => 'general',
				'title' => 'General Settings'
			)/*,
			array(
				'id' => 'socials',
				'title' => 'Socials'
			)			*/
		),
		'settings' => array(
			array(
				'id'          => 'favicon',
				'label'       => 'Favicon',
				'desc'        => '',
				'std'         => '',
				'type'        => 'upload',
				'section'     => 'general',
			),
			array(
				'id'          => 'logo',
				'label'       => 'Logo',
				'desc'        => '',
				'std'         => '',
				'type'        => 'upload',
				'section'     => 'general',
			),
			array(
				'id'          => 'member_card',
				'label'       => 'Member Card',
				'desc'        => '',
				'std'         => '',
				'type'        => 'upload',
				'section'     => 'general',
			),
/*			array(
				'id'          => 'errorpage_text',
				'label'       => '404 Text',
				'desc'        => '',
				'std'         => '',
				'type'        => 'textarea',
				'section'     => 'general',
			),*/
			/*array(
				'id'          => 'copyright_text',
				'label'       => 'Copyright Text',
				'desc'        => 'Shortcodes : {$year}, {$site_name}, {$site_url}',
				'std'         => '',
				'type'        => 'textarea',
				'section'     => 'general',
			),
			array(
				'id'          => 'google_ad_code',
				'label'       => 'Google Ad Code',
				'desc'        => '',
				'std'         => '',
				'type'        => 'textarea',
				'section'     => 'general',
			),
			array(
				'id'          => 'sc_facebook',
				'label'       => 'Facebook',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'socials',
			),
			array(
				'id'          => 'sc_twitter',
				'label'       => 'Twitter',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'socials',
			),
			array(
				'id'          => 'sc_pinterest',
				'label'       => 'Pinterest',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'socials',
			),
			array(
				'id'          => 'sc_youtube',
				'label'       => 'Youtube',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'socials',
			),
			array(
				'id'          => 'sc_instagram',
				'label'       => 'Instagram',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'socials',
			),
			array(
				'id'          => 'sc_yelp',
				'label'       => 'Yelp',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'socials',
			),
			array(
				'id'          => 'sc_googleplus',
				'label'       => 'Google+',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'socials',
			),
			array(
				'id'          => 'sc_tripadvisor',
				'label'       => 'Tripadvisor',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'socials',
			),
			array(
				'id'          => 'sc_linkedin',
				'label'       => 'Linked in',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'socials',
			),
			array(
				'id'          => 'sc_email',
				'label'       => 'Email',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'socials',
			),*/
		)
    );

	/* allow settings to be filtered before saving */
	$custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );

	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings );
	}
}