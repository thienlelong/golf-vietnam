<?php

	//generate wpshapere options
	$this->wpshapereOptions = TitanFramework::getInstance( 'wpshapere' );
	
	$blog_email = get_option('admin_email');
	$blog_from_name = get_option('blogname'); 
	$wps_options = unserialize(get_option('wpshapere_options'));
	//get all admin users
	$user_query = new WP_User_Query( array( 'role' => 'Administrator' ) );
	if ( ! empty( $user_query->results ) ) {
		foreach ( $user_query->results as $user ) {
			$admin_users[$user->ID] = $user->display_name;
		}
	}
	
	$wpshapePanel = $this->wpshapereOptions->createAdminPanel( array(
		'name' => 'WPSHAPERE Options',
		'title' => 'WPSHAPERE Plugin',
		'icon' => 'dashicons-art',
		'capability' => 'administrator',
	) );
	
	$generalTab = $wpshapePanel->createTab( array(
		'name' => 'General',
		'id' => 'general_options',
	));
	
	$loginTab = $wpshapePanel->createTab( array(
		'name' => 'Login Page',
		'id' => 'login_options',
	));
	$dashTab = $wpshapePanel->createTab( array(
		'name' => 'Dashboard',
		'id' => 'dash_options',
	));
	$adminbarTab = $wpshapePanel->createTab( array(
		'name' => 'Adminbar',
		'id' => 'adminbar_options',
	));
	$adminTab = $wpshapePanel->createTab( array(
		'name' => 'Admin Pages',
		'id' => 'admin_options',
	));
	$footerTab = $wpshapePanel->createTab( array(
		'name' => 'Footer',
		'id' => 'footer_options',
	));
	$emailsTab = $wpshapePanel->createTab( array(
		'name' => 'Email Settings',
		'id' => 'email_options',
	));
	
	
	
	//AdminTab Options
	$adminTab->createOption( array(
		'name' => 'Admin Menu Color options',
		'type' => 'heading',
	) );

	$adminTab->createOption( array(
		'name' => 'Background color',
		'id' => 'bg_color',
		'type' => 'color',
		'default' => '#e3e7ea',
	) );
	$adminTab->createOption( array(
		'name' => 'Left menu wrap color',
		'id' => 'nav_wrap_color',
		'type' => 'color',
		'default' => '#1b2831',
	) );
	$adminTab->createOption( array(
		'name' => 'Submenu wrap color',
		'id' => 'sub_nav_wrap_color',
		'type' => 'color',
		'default' => '#22303a',
	) );	
	$adminTab->createOption( array(
		'name' => 'Menu hover color',
		'id' => 'hover_menu_color',
		'type' => 'color',
		'default' => '#3f4457',
	) );	
	$adminTab->createOption( array(
		'name' => 'Current active Menu color',
		'id' => 'active_menu_color',
		'type' => 'color',
		'default' => '#6da87a',
	) );	
	$adminTab->createOption( array(
		'name' => 'Menu text color',
		'id' => 'nav_text_color',
		'type' => 'color',
		'default' => '#90a1a8',
	) );	
	$adminTab->createOption( array(
		'name' => 'Menu hover text color',
		'id' => 'menu_hover_text_color',
		'type' => 'color',
		'default' => '#ffffff',
	) );
	$adminTab->createOption( array(
		'name' => 'Updates Count notification background',
		'id' => 'menu_updates_count_bg',
		'type' => 'color',
		'default' => '#212121',
	) );
	$adminTab->createOption( array(
		'name' => 'Updates Count text color',
		'id' => 'menu_updates_count_text',
		'type' => 'color',
		'default' => '#ffffff',
	) );
	$adminTab->createOption( array(
		'name' => 'Primary button colors',
		'type' => 'heading',
	) );	
	$adminTab->createOption( array(
		'name' => 'Button background  color',
		'id' => 'pry_button_color',
		'type' => 'color',
		'default' => '#7ac600',
	) );
	if(isset($wps_options['design_type']) && $wps_options['design_type'] != 1) {
		$adminTab->createOption( array(
			'name' => 'Button border color',
			'id' => 'pry_button_border_color',
			'type' => 'color',
			'default' => '#86b520',
		) );
		$adminTab->createOption( array(
			'name' => 'Button shadow color',
			'id' => 'pry_button_shadow_color',
			'type' => 'color',
			'default' => '#98ce23',
		) );
	}
	$adminTab->createOption( array(
		'name' => 'Button text color',
		'id' => 'pry_button_text_color',
		'type' => 'color',
		'default' => '#ffffff',
	) );
	$adminTab->createOption( array(
		'name' => 'Button hover background color',
		'id' => 'pry_button_hover_color',
		'type' => 'color',
		'default' => '#29ac39',
	) );
	if(isset($wps_options['design_type']) && $wps_options['design_type'] != 1) {
		$adminTab->createOption( array(
			'name' => 'Button hover border color',
			'id' => 'pry_button_hover_border_color',
			'type' => 'color',
			'default' => '#259633',
		) );
		$adminTab->createOption( array(
			'name' => 'Button hover shadow color',
			'id' => 'pry_button_hover_shadow_color',
			'type' => 'color',
			'default' => '#3d7a0c',
		) );
	}
	$adminTab->createOption( array(
		'name' => 'Button hover text color',
		'id' => 'pry_button_hover_text_color',
		'type' => 'color',
		'default' => '#ffffff',
	) );
	$adminTab->createOption( array(
		'name' => 'Secondary button colors',
		'type' => 'heading',
	) );	
	$adminTab->createOption( array(
		'name' => 'Button background color',
		'id' => 'sec_button_color',
		'type' => 'color',
		'default' => '#ced6c9',
	) );
	if(isset($wps_options['design_type']) && $wps_options['design_type'] != 1) {
		$adminTab->createOption( array(
			'name' => 'Button border color',
			'id' => 'sec_button_border_color',
			'type' => 'color',
			'default' => '#bdc4b8',
		) );
		$adminTab->createOption( array(
			'name' => 'Button shadow color',
			'id' => 'sec_button_shadow_color',
			'type' => 'color',
			'default' => '#dde5d7',
		) );
	}
	$adminTab->createOption( array(
		'name' => 'Button text color',
		'id' => 'sec_button_text_color',
		'type' => 'color',
		'default' => '#7a7a7a',
	) );
	$adminTab->createOption( array(
		'name' => 'Button hover background color',
		'id' => 'sec_button_hover_color',
		'type' => 'color',
		'default' => '#c9c8bf',
	) );
	if(isset($wps_options['design_type']) && $wps_options['design_type'] != 1) {
		$adminTab->createOption( array(
			'name' => 'Button hover border color',
			'id' => 'sec_button_hover_border_color',
			'type' => 'color',
			'default' => '#babab0',
		) );
		$adminTab->createOption( array(
			'name' => 'Button hover shadow color',
			'id' => 'sec_button_hover_shadow_color',
			'type' => 'color',
			'default' => '#9ea59b',
		) );
	}
	$adminTab->createOption( array(
		'name' => 'Button hover text color',
		'id' => 'sec_button_hover_text_color',
		'type' => 'color',
		'default' => '#ffffff',
	) );	
	
	$adminTab->createOption( array(
		'name' => 'Add New button',
		'type' => 'heading',
	) );
	$adminTab->createOption( array(
		'name' => 'Button background color',
		'id' => 'addbtn_bg_color',
		'type' => 'color',
		'default' => '#53D860',
	) );
	$adminTab->createOption( array(
		'name' => 'Button hover background color',
		'id' => 'addbtn_hover_bg_color',
		'type' => 'color',
		'default' => '#5AC565',
	) );
	$adminTab->createOption( array(
		'name' => 'Button text color',
		'id' => 'addbtn_text_color',
		'type' => 'color',
		'default' => '#ffffff',
	) );
	$adminTab->createOption( array(
		'name' => 'Button hover text color',
		'id' => 'addbtn_hover_text_color',
		'type' => 'color',
		'default' => '#ffffff',
	) );
	
	$adminTab->createOption( array(
		'name' => 'Metabox Colors',
		'type' => 'heading',
	) );
	$adminTab->createOption( array(
		'name' => 'Metabox header box',
		'id' => 'metabox_h3_color',
		'type' => 'color',
		'default' => '#bdbdbd',
	) );
	$adminTab->createOption( array(
		'name' => 'Metabox header box border',
		'id' => 'metabox_h3_border_color',
		'type' => 'color',
		'default' => '#9e9e9e',
	) );
	$adminTab->createOption( array(
		'name' => 'Metabox header Click button color',
		'id' => 'metabox_handle_color',
		'type' => 'color',
		'default' => '#ffffff',
	) );
	$adminTab->createOption( array(
		'name' => 'Metabox header Click button hover color',
		'id' => 'metabox_handle_hover_color',
		'type' => 'color',
		'default' => '#949494',
	) );
	$adminTab->createOption( array(
		'name' => 'Metabox header text color',
		'id' => 'metabox_text_color',
		'type' => 'color',
		'default' => '#ffffff',
	) );
	
	$adminTab->createOption( array(
		'name' => 'Message box (Post/Page updates)',
		'type' => 'heading',
	) );
	$adminTab->createOption( array(
		'name' => 'Message box color',
		'id' => 'msg_box_color',
		'type' => 'color',
		'default' => '#02c5cc',
	) );
	$adminTab->createOption( array(
		'name' => 'Message text color',
		'id' => 'msgbox_text_color',
		'type' => 'color',
		'default' => '#ffffff',
	) );
	$adminTab->createOption( array(
		'name' => 'Message box border color',
		'id' => 'msgbox_border_color',
		'type' => 'color',
		'default' => '#007e87',
	) );
	$adminTab->createOption( array(
		'name' => 'Message link color',
		'id' => 'msgbox_link_color',
		'type' => 'color',
		'default' => '#efefef',
	) );
	$adminTab->createOption( array(
		'name' => 'Message link hover color',
		'id' => 'msgbox_link_hover_color',
		'type' => 'color',
		'default' => '#e5e5e5',
	) );
	$adminTab->createOption( array(
		'name' => 'Custom CSS',
		'type' => 'heading',
	) );
	$adminTab->createOption( array(
		'name' => 'Custom CSS for Admin pages',
		'id' => 'admin_page_custom_css',
		'type' => 'textarea',
	) );
	
	
	$adminTab->createOption( array(
		'type' => 'save'
	) );
	
	//AdminBar Options
	/*$adminbarTab->createOption( array(
		'name' => 'Admin Title',
		'id' => 'admin_title',
		'type' => 'text',
	) );*/

	$adminbarTab->createOption( array(
		'name' => 'Upload Logo',
		'id' => 'admin_logo',
		'type' => 'upload',
		'desc' => 'Image to be displayed in all pages. Maximum size 200x50 pixels.'
	) );
	
	$adminbarTab->createOption( array(
		'name' => 'Move logo Top by',
		'id' => 'logo_top_margin',
		'type' => 'number',
		'desc' => "Can be used in case of logo position haven't matched the menu position.",
		'default' => '0',
		'max' => '20',
	) );
	
	$adminbarTab->createOption( array(
		'name' => 'Move logo Bottom by',
		'id' => 'logo_bottom_margin',
		'type' => 'number',
		'desc' => "Can be used in case of logo position haven't matched the menu position.",
		'default' => '0',
		'max' => '20',
	) );
	
	$adminbarTab->createOption( array(
		'name' => 'Admin bar color',
		'id' => 'admin_bar_color',
		'type' => 'color',
		'default' => '#fff',
	) );
	
	$adminbarTab->createOption( array(
		'name' => 'Admin bar menu color',
		'id' => 'admin_bar_menu_color',
		'type' => 'color',
		'default' => '#94979B',
	) );
	
	$adminbarTab->createOption( array(
		'name' => 'Admin bar menu hover color',
		'id' => 'admin_bar_menu_hover_color',
		'type' => 'color',
		'default' => '#474747',
	) );
	
	$adminbarTab->createOption( array(
		'name' => 'Remove Unwanted Menus',
		'id' => 'hide_admin_bar_menus',
		'type' => 'multicheck',
		'desc' => 'Select whichever you want to remove.',
		'options' => array(
			'1' => 'Site Name',
			'2' => 'Updates',					
			'3' => 'Comments',
			'4' => 'New Content',
			'5' => 'Edit Profile',
			'6' => 'My account',
			'7' => 'WordPress Logo',
		),
		'default' => array( '3', '4', '7' ),
	) );
	
	$adminbarTab->createOption( array(
		'type' => 'save'
	) );
	
	//Login Page Options
	$loginTab->createOption( array(
		'name' => 'Background color',
		'id' => 'login_bg_color',
		'type' => 'color',
		'default' => '#292931',
	) );

	$loginTab->createOption( array(
		'name' => 'Background image',
		'id' => 'login_bg_img',
		'type' => 'upload',
	) );
	$loginTab->createOption( array(
		'name' => 'Background Repeat',
		'id' => 'login_bg_img_repeat',
		'type' => 'checkbox',
		'desc' => 'Check to repeat',
		'default' => true,
	) );	
	$loginTab->createOption( array(
		'name' => 'Scale background image',
		'id' => 'login_bg_img_scale',
		'type' => 'checkbox',
		'desc' => 'Scale image to fit Screen size.',
		'default' => true,
	) );
	$loginTab->createOption( array(
		'name' => 'Login Form Top margin',
		'id' => 'login_form_margintop',
		'type' => 'number',
		'default' => '100',
		'min' => '0',
		'max' => '700',
	) );
	$loginTab->createOption( array(
		'name' => 'Login Form Width(%)',
		'id' => 'login_form_width',
		'type' => 'number',
		'default' => '30',
		'min' => '20',
		'max' => '100',
	) );

	$loginTab->createOption( array(
	'name' => 'Upload Logo',
	'id' => 'admin_login_logo',
	'type' => 'upload',
	'desc' => 'Image to be displayed on login page. Maximum width should be under 450pixels.'
	) );

	$loginTab->createOption( array(
		'name' => 'Resize Logo?',
		'id' => 'admin_logo_resize',
		'type' => 'checkbox',
		'default' => false,
		'desc' => 'Select to resize logo size.'
	) );
	$loginTab->createOption( array(
		'name' => 'Set Logo size (%)',
		'id' => 'admin_logo_size_percent',
		'type' => 'number',
		'default' => '1',
		'max' => '100',
	) );
	$loginTab->createOption( array(
		'name' => 'Logo Height',
		'id' => 'admin_logo_height',
		'type' => 'number',
		'default' => '50',
		'max' => '150',
	) );
	$loginTab->createOption( array(
		'name' => 'Logo url',
		'id' => 'login_logo_url',
		'type' => 'text',
		'default' => get_bloginfo('url'),
	) );
	$loginTab->createOption( array(
		'name' => 'Transparent Form',
		'id' => 'login_divbg_transparent',
		'type' => 'checkbox',
		'default' => false,
		'desc' => 'Select to show transparent form background.'
	) );
	$loginTab->createOption( array(
		'name' => 'Login div bacground color',
		'id' => 'login_divbg_color',
		'type' => 'color',
		'default' => '#f5f5f5',
	) );
	$loginTab->createOption( array(
		'name' => 'Login form bacground color',
		'id' => 'login_formbg_color',
		'type' => 'color',
		'default' => '#423143',
	) );
	$loginTab->createOption( array(
		'name' => 'Form border color',
		'id' => 'form_border_color',
		'type' => 'color',
		'default' => '#e5e5e5',
	) );
	$loginTab->createOption( array(
		'name' => 'Form text color',
		'id' => 'form_text_color',
		'type' => 'color',
		'default' => '#cccccc',
	) );
	$loginTab->createOption( array(
		'name' => 'Form link color',
		'id' => 'form_link_color',
		'type' => 'color',
		'default' => '#777777',
	) );
	$loginTab->createOption( array(
		'name' => 'Form link hover color',
		'id' => 'form_link_hover_color',
		'type' => 'color',
		'default' => '#555555',
	) );
	$loginTab->createOption( array(
		'name' => 'Hide "Back to blog link"',
		'id' => 'hide_backtoblog',
		'type' => 'checkbox',
		'default' => false,
		'desc' => 'select to hide',
	) );
	$loginTab->createOption( array(
		'name' => 'Hide "Remember me"',
		'id' => 'hide_remember',
		'type' => 'checkbox',
		'default' => false,
		'desc' => 'select to hide',
	) );
	$loginTab->createOption( array(
		'name' => 'Custom Footer content',
		'id' => 'login_footer_content',
		'type' => 'editor',
	) );
	$loginTab->createOption( array(
		'name' => 'Custom CSS',
		'type' => 'heading',
	) );
	$loginTab->createOption( array(
		'name' => 'Custom CSS for Login page',
		'id' => 'login_custom_css',
		'type' => 'textarea',
	) );
	
	$loginTab->createOption( array(
		'type' => 'save'
	) );
	
	$generalTab->createOption( array(
		'name' => 'General options',
		'type' => 'heading',
	) );
	$generalTab->createOption( array(
		'name' => 'Choose design type',
		'id' => 'design_type',
		'type' => 'radio',
		'options' => array(
			'1' => 'Flat design',
			'2' => 'Default design',
		),
		'default' => '1',
	) );
	$generalTab->createOption( array(
		'name' => 'Heading H1 color',
		'id' => 'h1_color',
		'type' => 'color',
		'default' => '#333333',
	) );
	$generalTab->createOption( array(
		'name' => 'Heading H2 color',
		'id' => 'h2_color',
		'type' => 'color',
		'default' => '#222222',
	) );
	$generalTab->createOption( array(
		'name' => 'Heading H3 color',
		'id' => 'h3_color',
		'type' => 'color',
		'default' => '#222222',
	) );
	$generalTab->createOption( array(
		'name' => 'Heading H4 color',
		'id' => 'h4_color',
		'type' => 'color',
		'default' => '#555555',
	) );
	$generalTab->createOption( array(
		'name' => 'Heading H5 color',
		'id' => 'h5_color',
		'type' => 'color',
		'default' => '#555555',
	) );
	$generalTab->createOption( array(
		'name' => 'Heading H6 color',
		'id' => 'h6_color',
		'type' => 'color',
		'default' => '#555555',
	) );
	$generalTab->createOption( array(
		'name' => 'Remove unwanted items',
		'id' => 'admin_generaloptions',
		'type' => 'multicheck',
		'desc' => 'Select whichever you want to remove.',
		'options' => array(
			'1' => 'Wordpress Help tab.',					
			'2' => 'Screen Options.',
			'3' => 'Wordpress update notifications.',
		),
	) );
	$generalTab->createOption( array(
		'name' => 'Disable automatic updates',
		'id' => 'disable_auto_updates',
		'type' => 'checkbox',
		'desc' => 'Select to disable all automatic background updates.',
		'default' => false,
	) );
	$generalTab->createOption( array(
		'name' => 'Disable update emails',
		'id' => 'disable_update_emails',
		'type' => 'checkbox',
		'desc' => 'Select to disable emails regarding automatic updates.',
		'default' => false,
	) );
	$generalTab->createOption( array(
		'name' => 'Hide Admin bar',
		'id' => 'hide_admin_bar',
		'type' => 'checkbox',
		'desc' => 'Select to hideadmin bar on frontend.',
		'default' => false,
	) );
	
	$generalTab->createOption( array(
		'name' => 'Menu Customization options',
		'type' => 'heading',
	) );
	$generalTab->createOption( array(
		'name' => 'Menu display',
		'id' => 'show_all_menu_to_admin',
		'type' => 'radio',
		'options' => array(
			'1' => 'Show all Menu links to all admin users',
			'2' => 'Show all Menu links to specific admin users',
		),
	) );
	$generalTab->createOption( array(
		'name' => 'Select Privilege users',
		'id' => 'privilege_users',
		'type' => 'multicheck',
		'desc' => 'Select admin users who can have access to all menu items.',
		'options' => $admin_users,
	) );
	$generalTab->createOption( array(
		'type' => 'save'
	) );
	
	$dashTab->createOption( array(
		'name' => 'Remove unwanted Widgets',
		'id' => 'remove_dash_widgets',
		'type' => 'multicheck',
		'desc' => 'Select whichever you want to remove.',
		'options' => array(
			'1' => 'Welcome panel',					
			'2' => 'Right now',
			'3' => 'Recent activity',
			'4' => 'Incoming links',
			'5' => 'Plugins',
			'6' => 'Quick press',
			'7' => 'Recent drafts',
			'8' => 'Wordpress news',
			'9' => 'Wordpress blog',
			'10' => 'bbPress',
			'11' => 'Yoast seo',
			'12' => 'Gravity forms',
		),
		'default' => array( '8', '9' ),
	) );	
	$dashTab->createOption( array(
		'name' => 'Create New Widgets',
		'type' => 'heading',
	) );
	$dashTab->createOption( array(
		'type' => 'note',
		'desc' => 'Widget 1'
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Type',
		'id' => 'wps_widget_1_type',
		'options' => array(
        '1' => 'RSS Feed',
        '2' => 'Text Content',
		),
		'type' => 'radio',
		'default' => '1',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Position',
		'id' => 'wps_widget_1_position',
		'options' => array(
		'normal' => 'Left',
		'side' => 'Right',
		),
		'type' => 'select',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Title',
		'id' => 'wps_widget_1_title',
		'type' => 'text',
	) );
	$dashTab->createOption( array(
		'name' => 'RSS Feed url',
		'id' => 'wps_widget_1_rss',
		'type' => 'text',
		'desc' => 'Put your RSS feed url here if you want to show your own RSS feeds. Otherwise fill your static contents in the below editor.',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Content',
		'id' => 'wps_widget_1_content',
		'type' => 'editor',
	) );
	
	$dashTab->createOption( array(
		'type' => 'note',
		'desc' => 'Widget 2'
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Type',
		'id' => 'wps_widget_2_type',
		'options' => array(
		'1' => 'RSS Feed',
		'2' => 'Text Content',
		),
		'type' => 'radio',
		'default' => '1',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Position',
		'id' => 'wps_widget_2_position',
		'options' => array(
		'normal' => 'Left',
		'side' => 'Right',
		),
		'type' => 'select',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Title',
		'id' => 'wps_widget_2_title',
		'type' => 'text',
	) );
	$dashTab->createOption( array(
		'name' => 'RSS Feed url',
		'id' => 'wps_widget_2_rss',
		'type' => 'text',
		'desc' => 'Put your RSS feed url here if you want to show your own RSS feeds. Otherwise fill your static contents in the below editor.',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Content',
		'id' => 'wps_widget_2_content',
		'type' => 'editor',
	) );
	
	$dashTab->createOption( array(
		'type' => 'note',
		'desc' => 'Widget 3'
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Type',
		'id' => 'wps_widget_3_type',
		'options' => array(
        '1' => 'RSS Feed',
        '2' => 'Text Content',
		),
		'type' => 'radio',
		'default' => '1',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Position',
		'id' => 'wps_widget_3_position',
		'options' => array(
        'normal' => 'Left',
        'side' => 'Right',
		),
		'type' => 'select',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Title',
		'id' => 'wps_widget_3_title',
		'type' => 'text',
	) );
	$dashTab->createOption( array(
		'name' => 'RSS Feed url',
		'id' => 'wps_widget_3_rss',
		'type' => 'text',
		'desc' => 'Put your RSS feed url here if you want to show your own RSS feeds. Otherwise fill your static contents in the below editor.',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Content',
		'id' => 'wps_widget_3_content',
		'type' => 'editor',
	) );
	
	$dashTab->createOption( array(
		'type' => 'note',
		'desc' => 'Widget 4'
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Type',
		'id' => 'wps_widget_4_type',
		'options' => array(
        '1' => 'RSS Feed',
        '2' => 'Text Content',
		),
		'type' => 'radio',
		'default' => '1',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Position',
		'id' => 'wps_widget_4_position',
		'options' => array(
        'normal' => 'Left',
        'side' => 'Right',
		),
		'type' => 'select',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Title',
		'id' => 'wps_widget_4_title',
		'type' => 'text',
	) );
	$dashTab->createOption( array(
		'name' => 'RSS Feed url',
		'id' => 'wps_widget_4_rss',
		'type' => 'text',
		'desc' => 'Put your RSS feed url here if you want to show your own RSS feeds. Otherwise fill your static contents in the below editor.',
	) );
	$dashTab->createOption( array(
		'name' => 'Widget Content',
		'id' => 'wps_widget_4_content',
		'type' => 'editor',
	) );

	$dashTab->createOption( array(
		'type' => 'save'
	) );
	
	$footerTab->createOption( array(
		'name' => 'Footer Text',
		'id' => 'admin_footer_txt',
		'type' => 'editor',
		'desc' => 'Put any text you want to show on admin footer.',
	) );
	$footerTab->createOption( array(
		'type' => 'save'
	) );
	$emailsTab->createOption( array(
		'name' => 'White label emails',
		'id' => 'email_settings',
		'options' => array(
		'1' => 'Set Email address as <strong>' . $blog_email . '</strong> From name as <strong>' . $blog_from_name . '</strong>',
		'2' => 'Set different',
		),
		'type' => 'radio',
		'default' => '1',
	) );
	$emailsTab->createOption( array(
		'name' => 'Email From address',
		'id' => 'email_from_addr',
		'type' => 'text',
		'desc' => 'Enter valid email address',
	) );
	$emailsTab->createOption( array(
		'name' => 'Email From name',
		'id' => 'email_from_name',
		'type' => 'text',
	) );
	$emailsTab->createOption( array(
		'type' => 'save',
	) );
	
	