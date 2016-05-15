<?php
/*
Plugin Name: WPSHAPERE 
Plugin URI: http://acmeedesign.com
Description: WPShapere is a wordpress plugin to customize the WordPress Admin theme and elements as your wish. Make WordPress a complete CMS with WPShapere.
Version: 2.1
Author: KannanC
Author URI: http://acmeedesign.com
*/

/*
*	WPSHAPERE Version
*/

define( 'WPSHAPERE_VERSION' , '2.1' );    

/*
*	WPSHAPERE Path Constant
*/
define( 'WPSHAPERE_PATH' , dirname(__FILE__) . "/"); 

/*
*	WPSHAPERE URI Constant
*/
define( 'WPSHAPERE_DIR_URI' , plugin_dir_url(__FILE__) );

/*
*	Enabling Global Customization for Multi-site installation
*       Delete the below two lines to enable customization per blog
*/
if(is_multisite())
	define('NETWORK_ADMIN_CONTROL', true);
// Delete the above two lines to enable customization per blog

if ( ! empty( $_GET['action'] ) && ! empty( $_GET['plugin'] ) ) {
    if ( $_GET['action'] == 'activate' ) {
        return;
    }
}
// Check if the framework plugin is activated
$useEmbeddedFramework = true;
$activePlugins = get_option('active_plugins');
if ( is_array( $activePlugins ) ) {
    foreach ( $activePlugins as $plugin ) {
        if ( is_string( $plugin ) ) {
            if ( stripos( $plugin, '/titan-framework.php' ) !== false ) {
                $useEmbeddedFramework = false;
                break;
            }
        }
    }
}
// Use the embedded Titan Framework
if ( $useEmbeddedFramework ) {
    require_once( WPSHAPERE_PATH . 'includes/titan-framework/titan-framework.php' );
}

include_once WPSHAPERE_PATH . 'includes/wpshapere.class.php';
include_once WPSHAPERE_PATH . 'includes/wpsthemes.class.php';

register_deactivation_hook( __FILE__, array( 'WPSHAPERE', 'deleteOptions') );
