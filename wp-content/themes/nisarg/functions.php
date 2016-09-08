<?php
/**
 * Nisarg functions and definitions
 *
 * @package Nisarg
 */

define('OPT', get_template_directory().'/option-tree');
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_pages', '__return_false' );
require_once(OPT . '/ot-loader.php');
include(TEMPLATEPATH.'/theme-options.php');
include(TEMPLATEPATH.'/functions/post-type-clubs.php');
include(TEMPLATEPATH.'/functions/post-type-events.php');
include(TEMPLATEPATH.'/functions/post-type-partners.php');
include(TEMPLATEPATH.'/functions/post-type-members.php');
include(TEMPLATEPATH.'/functions/post-type-advertisements.php');
include(TEMPLATEPATH.'/functions/metaboxes.php');
include(TEMPLATEPATH.'/inc/ehandicap.php');
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

if ( ! function_exists( 'nisarg_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

/**
 * Nisarg only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.2', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

function nisarg_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Nisarg, use a find and replace
	 * to change 'nisarg' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nisarg', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270);
	add_image_size( 'nisarg-full-width', 1038, 576, true );


	function register_nisarg_menus() {
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Top Primary Menu', 'nisarg' ),
		) );
		register_nav_menu( 'left-navigation', __( 'Left Navigation' ) );
	}

	add_action( 'init', 'register_nisarg_menus' );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery'
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nisarg_custom_background_args', array(
		'default-color' => 'f5f5f5',
		'default-image' => '',
	) ) );
}
endif; // nisarg_setup
add_action( 'after_setup_theme', 'nisarg_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 */
function nisarg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nisarg_content_width', 640 );
}
add_action( 'after_setup_theme', 'nisarg_content_width', 0 );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function nisarg_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nisarg' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'nisarg_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nisarg_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );


    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/owl-carousel/assets/owl.carousel.css' );
    wp_enqueue_style( 'owl-carousel-themes', get_template_directory_uri().'/owl-carousel/assets/owl.theme.css' );
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/css/magnific-popup.css' );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri().'/css/jquery-ui.css' );
	wp_enqueue_style( 'nisarg-style', get_stylesheet_uri() );
    wp_enqueue_style( 'responsive', get_template_directory_uri().'/css/responsive.css' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js',array('jquery'),'',true);
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js',array('jquery'),'',true);
    wp_enqueue_script( 'jquery-validate', get_template_directory_uri() . '/js/jquery.validate.min.js',array('jquery'),'',true);
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/owl-carousel/owl.carousel.min.js', array(),'',true);
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(),'',true);
	wp_enqueue_script( 'nisarg-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );

	wp_enqueue_script( 'nisarg-js', get_template_directory_uri() . '/js/nisarg.js',array('jquery'),'',true);

	wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/js/html5shiv.js', array(),'3.7.3',false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_register_script('vb_reg_script', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, false);
    wp_enqueue_script('vb_reg_script');

    wp_localize_script( 'vb_reg_script', 'vb_reg_vars', array(
        'vb_ajax_url' => admin_url( 'admin-ajax.php' ),
        )
    );
    if(is_home() ||is_front_page()){
        wp_enqueue_style( 'lightgallery', get_template_directory_uri().'/js/gallery/dist/css/lightgallery.css' );
        wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/js/gallery/lib/picturefill.min.js', array(),'',true);
        wp_enqueue_script( 'lightgallery', get_template_directory_uri() . '/js/gallery/dist/js/lightgallery.js', array(),'',true);
        wp_enqueue_script( 'fullscreen', get_template_directory_uri() . '/js/gallery/dist/js/lg-fullscreen.js', array(),'',true);

        wp_enqueue_script( 'lg-thumbnail', get_template_directory_uri() . '/js/gallery/dist/js/lg-thumbnail.js', array(),'',true);
        wp_enqueue_script( 'lg-video', get_template_directory_uri() . '/js/gallery/dist/js/lg-video.js', array(),'',true);
        wp_enqueue_script( 'lg-autoplay', get_template_directory_uri() . '/js/gallery/dist/js/lg-autoplay.js', array(),'',true);
        wp_enqueue_script( 'lg-zoom', get_template_directory_uri() . '/js/gallery/dist/js/lg-zoom.js', array(),'',true);
        wp_enqueue_script( 'lg-hash', get_template_directory_uri() . '/js/gallery/dist/js/lg-hash.js', array(),'',true);
        wp_enqueue_script( 'lg-pager', get_template_directory_uri() . '/js/gallery/dist/js/lg-pager.js', array(),'',true);
        wp_enqueue_script( 'mousewheel', get_template_directory_uri() . '/js/gallery/lib/jquery.mousewheel.min.js', array(),'',true);


        $styleSlugs = array('membermouse-jquery-css',
            'yith-wcwl-main',
            'membermouse-jquery-css',
            'yith-wcwl-main',
            'yith-woocompare-widget',
            'woocommerce-layout',
            'woocommerce-smallscreen',
            'woocommerce-general',
            'wp-pagenavi',
            'colorbox',
            'wpsimplegallery-style',
            'ubermenu-black-white-2-css',
            'CMDM-css',
            'membermouse-main',
            'membermouse-buttons',
            'membermouse-font-awesome',
            'prtfl_stylesheet',
            'prtfl_lightbox_stylesheet',
            'pac-styles',
            'pac-layout-styles ',
            'pdc-layout-styles',
            'wp-job-manager-applications-frontend',
            'wp-job-manager-frontend',
            'dlm-frontend',
            'jquery-colorbox',
            'ajax-load-more',
            'searchwp-live-search',
            'ubermenu',
            'ubermenu-deepsky',
            'wpsimplegallery-style',
            'contact-form-7',
            'responsive-lightbox-fancybox-front',
            'scrollup-css',
            'videojs-plugin',
            'videojs',
            'pac-layout-styles',
            'chosen',
            'new-style',
            'tristatedj-media',
            'ajax-load-more',
            'searchwp-live-search',
            'tablepress-default',
            'ubermenu',
            'ubermenu-deepsky',
            'ubermenu-black-white-2',
            'ubermenu-font-awesome',
            'wpsimplegallery-style',
            'colorbox',
            'contact-form-7',
            'responsive-lightbox-fancybox-front',
            'scrollup-css',
            'videojs-plugin',
            'videojs',
            'pac-layout-styles',
            'chosen',
            'ajax-load-more',
            'tablepress-default',
            'ubermenu',
            'ubermenu-deepsky',
            'ubermenu-black-white-2',
            'ubermenu-font-awesome',
            'wpsimplegallery-style',
            'colorbox');

        foreach ($styleSlugs as $value) {
            wp_dequeue_style($value);
        }

        $scriptSlugs =  array('membermouse-socialLogin',
                'membermouse-blockUI',
                'admin-bar',
                'codenegar-ajax-search-migrate',
                'codenegar-ajax-search-script-core',
                'codenegar-ajax-search-script',
                'contact-form-7',
                'membermouse-global',
                'mm-common-core.js',
                'mm-preview.js',
                'page-scroll-to-id-plugin-script',
                'page-scroll-to-id-plugin-init-script',
                'prtfl_fancybox_mousewheelJs',
                'prtfl_fancyboxJs',
                'responsive-lightbox-fancybox',
                'responsive-lightbox-front',
                'scrollup-js',
                'videojs',
                'videojs-youtube',
                'wc-add-to-cart',
                'woocommerce',
                'wc-cart-fragments',
                'yith-woocompare-main',
                'jquery-colorbox',
                'jquery-yith-wcwl',
                'comment-reply',
                'ajax-load-more',
                'swp-live-search-client',
                'google-maps',
                'ubermenu',
                'jquery-easing',
                'wpsimplegallery-scripts',
                'membermouse-socialLogin',
                'membermouse-blockUI',
                'admin-bar',
                'codenegar-ajax-search-migrate',
                'codenegar-ajax-search-script-core',
                'codenegar-ajax-search-script',
                'contact-form-7',
                'membermouse-global',
                'mm-common-core.js',
                'mm-preview.js',
                'jquery-ui-accordion',
                'jquery-ui-button',
                'jquery-ui-datepicker',
                'jquery-ui-dialog',
                'jquery-ui-draggable',
                'jquery-ui-droppable',
                'jquery-ui-mouse',
                'jquery-ui-position',
                'jquery-ui-progressbar',
                'jquery-ui-resizable',
                'jquery-ui-selectable',
                'jquery-ui-sortable',
                'jquery-ui-widget',
                'page-scroll-to-id-plugin-script',
                'page-scroll-to-id-plugin-init-script',
                'prtfl_fancybox_mousewheelJs',
                'prtfl_fancyboxJs',
                'responsive-lightbox-fancybox',
                'responsive-lightbox-front',
                'scrollup-js',
                'videojs',
                'videojs-youtube',
                'wc-add-to-cart',
                'woocommerce',
                'wc-cart-fragments',
                'yith-woocompare-main',
                'jquery-colorbox',
                'jquery-yith-wcwl',
                'comment-reply',
                'ajax-load-more',
                'swp-live-search-client',
                'google-maps',
                'ubermenu',
                'jquery-easing',
                'wpsimplegallery-scripts');

        foreach ($scriptSlugs as $value) {
             wp_dequeue_script($value);
        }
    }
}


add_action( 'wp_enqueue_scripts', 'nisarg_scripts' );

function crunchify_print_scripts_styles() {
    // Print all loaded Scripts
    global $wp_scripts;
    foreach( $wp_scripts->queue as $script ) :
        echo $script ."' , '";
    endforeach;

    // Print all loaded Styles (CSS)
    global $wp_styles;
    foreach( $wp_styles->queue as $style ) :
        echo $style . "','";
    endforeach;
}


/*add_action( 'wp_print_scripts', 'crunchify_print_scripts_styles' );*/
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/navwalker.php';


function nisarg_google_fonts() {
	$query_args = array(

		'family' => 'Lato:400,300italic,700|Source+Sans+Pro:400,400italic'
	);
	wp_register_style( 'nisarggooglefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'nisarggooglefonts');
}

add_action('wp_enqueue_scripts', 'nisarg_google_fonts');


function nisarg_new_excerpt_more( $more ) {
    return '...<p class="read-more"><a class="btn btn-default" href="'. esc_url(get_permalink( get_the_ID() )) . '">' . __(' Read More', 'nisarg') . '<span class="screen-reader-text"> '. __(' Read More', 'nisarg').'</span></a></p>';
}
add_filter( 'excerpt_more', 'nisarg_new_excerpt_more' );

function custom_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 *  * @return string The Link format URL.
 */
function nisarg_get_link_url() {
	$nisarg_content = get_the_content();
	$nisarg_has_url = get_url_in_content( $nisarg_content );

	return ( $nisarg_has_url ) ? $nisarg_has_url : apply_filters( 'the_permalink', get_permalink() );
}


function wc_custom_user_redirect( $redirect, $user ) {
    // Get the first of all the roles assigned to the user
    $role = $user->roles[0];
    $dashboard = admin_url();
    $home_page = get_home_url();
    if( $role == 'administrator' ) {
        //Redirect administrators to the dashboard
        $redirect = $dashboard;
    } elseif ( $role == 'shop-manager' ) {
        //Redirect shop managers to the dashboard
        $redirect = $dashboard;
    } elseif ( $role == 'editor' ) {
        //Redirect editors to the dashboard
        $redirect = $dashboard;
    } elseif ( $role == 'author' ) {
        //Redirect authors to the dashboard
        $redirect = $dashboard;
    } elseif ( $role == 'customer' || $role == 'subscriber' ) {
        $is_payment = get_the_author_meta( 'is_payment', $user->ID );
        $expire_date = get_the_author_meta( 'expire_date', $user->ID );
        $now =  date('Y/m/d');
        if ($is_payment && ($expire_date > $now)) {
            $redirect = 'http://vietcap.ehandicap.net/cgi-bin/hcapstat.exe?NAME='. $user->user_firstname . $user->user_lastname .'&MID='. get_the_author_meta( 'MID', $user->id ).'&CID='.get_the_author_meta( 'CID', $user->id );
        } else {
            $uId = $user->ID;
            wp_logout();
            if(pll_current_language('locale')!='vi') {
                $redirect  =  site_url("payment").'?uid='. $uId;
            }
            else{
                $redirect  =  site_url('thanh-toan').'?uid='. $uId;
            }
        }

        //Redirect customers and subscribers to the "My Account" page
    } else {
        //Redirect any other role to the previous visited page or, if not available, to the home
        $redirect = wp_get_referer() ? wp_get_referer() : home_url();
    }
    return $redirect;
}
add_filter( 'woocommerce_login_redirect', 'wc_custom_user_redirect', 10, 2 );

/**
 * New User registration
 *
 */

function add_user_metas($user_id, $meta_keys, $meta_values, $prev_values = NULL)
{
    //expects all arrays for last 3 params or all strings
    if(!is_array($meta_keys))
    {
        $meta_keys = array($meta_keys);
        $meta_values = array($meta_values);
        $prev_values = array($prev_values);
    }
    for($i = 0; $i < count($meta_values); $i++)
    {
        update_user_meta($user_id, $meta_keys[$i], $meta_values[$i]);
    }
}

//dungdh
function vb_reg_new_users() {
    //var_dump($_POST);
    //die();
   // return;
      /*  if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'vb_new_user' ) )
         die( 'Ooops, something went wrong, please try again later.' );*/
     $result=array ();
     $result["success"]=true;
     $response="";
     $arrUserId =  array();
     $users=$_POST['users'];
     //validate before add user
    $err_array =array();
    foreach ($users as $user  ) {
        $validate=validate_user($user);
        if(isset($validate['is_error']) && $validate['is_error'])
            array_push($err_array,$validate);
    }
    if(count($err_array)!=0){
        $result['success']=false;
        $result['message']="validate fail";
        $result['error']=$err_array;
        echo json_encode($result) ;
        die();
    }
     //add users
    foreach ($users as $u) {
        $uId =  add_member($u);
        if($uId!=0){
            array_push($arrUserId, $uId) ;
        }
         else {
            $result['success']=false;
            $result['error']="error add user";
           //delete user when one of them die
            foreach ($arrUserId as  $value) {
                delete_user($value);
            }
            die();
        }
    }
    $result['users'] = $arrUserId;
    $_SESSION['usersId'] = implode(',', $arrUserId);

    if(pll_current_language('locale')!='vi'){
        $result['redirectLink']=  site_url('payment') ;
    }
    else{
        $result['redirectLink']=  site_url('thanh-toan') ;
    }

    echo json_encode($result) ;
    die();
}
function delete_user_metas($user_id,$meta_keys){
    foreach ($meta_keys as $key) {
        delete_user_meta($user_id, $key);
    }
}
function delete_user($user_id,$meta_keys){
    //delete user
    delete_user_metas($user_id,$meta_keys);
    wp_delete_user($user_id);
}

function validate_user($user){
    if(!isset($user)){
        return;
    }

    $err = array();
    $err['form_id']=$user['form_id'];
    //check email existed
    if( email_exists($user['user_email'])) {
      /* stuff to do when email address exists */
        $err['user_email']='email_exists';
        $err['is_error']=true;
    }
    $validate_fields = array("first_name", "middle_name", "last_name", "password","user_email");
    foreach ($user as $key => $value) {
        if(in_array($key, $validate_fields))
        {
            if(is_null($value)||empty($value))
            {
                $err[$key]="required";
                $err['is_error']=true;
            }
        }
    }
    return $err;
}
function add_member($user)
{
    $first_name = $user['first_name'];
    $middle_name = $user['middle_name'];
    $last_name = $user['last_name'];
    $user_email = $user['user_email'];
    $user_phone = $user['user_phone'];
    $password = $user['password'];
    $golf_club = isset($user['golf_club']) ? $user['golf_club'] : '';
    $address = $user['address'];
    $district = $user['district'];
    $province = $user['province'];
    $city = $user['city'];
    $langguage = isset($user['langguage']) ? $user['langguage'] : '';
    $gender = $user['gender'];
    $avatar="".$user['avatar'];
    $date_of_birth = $user['date_of_birth'];
    $start_date =  date('Y/m/d');
    $expire_date = date("Y/m/d", strtotime(date("Y/m/d", strtotime($start_date)) . " + 365 day"));
    $is_active = false;
    $is_payment = false;
    global $wpdb;
    $user_lastest = $wpdb->get_results("SELECT ID FROM $wpdb->users ORDER BY ID DESC LIMIT 1");
    $MID_lastest = get_user_meta($user_lastest[0]->ID, 'MID', true);
    if(isset($MID_lastest)) {
        $year = substr($MID_lastest, 0, 2);
        if($year == date('y')) {
            $MID = $MID_lastest + 1;
        } else {
            $MID = date('y')*10000 + 1;
        }
    }
    $user_login = $MID;
    $CID = $user['golf_club_id'];
    /**
     * IMPORTANT: You should make server side validation here!
     *
     */
    $uId = wp_create_user( $user_login, $password, $user_email) ;
    //Add metatdata for user
    if($uId!=0){
         //add user metadata
             $meta_keys = array("first_name","last_name","middle_name", "golf_club", "district", "province", "city", "langguage", "gender","avatar", "start_date", "expire_date", "is_active", "MID", 'passbackup', 'address', 'date_of_birth', 'user_phone', 'is_status', 'CID');
             $meta_values = array( $first_name,$last_name,$middle_name, $golf_club, $district, $province, $city, $langguage, $gender, $avatar,$start_date, $expire_date,  $is_active, $MID, $password, $address, $date_of_birth, $user_phone, true, $CID);
             add_user_metas($uId, $meta_keys, $meta_values);
    }
    return $uId;
}
add_action('wp_ajax_register_users', 'vb_reg_new_users');
add_action('wp_ajax_nopriv_register_users', 'vb_reg_new_users');

function ur_theme_start_session()
{
    if (!session_id())
        session_start();
}
add_action("init", "ur_theme_start_session", 1);

function vb_reg_waiver_forms() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'waiver';
    $charset_collate = $wpdb->get_charset_collate();
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $sql = "CREATE TABLE $table_name (
            id int(11) NOT NULL AUTO_INCREMENT,
            competion_name varchar(255) DEFAULT NULL,
            location varchar(255) DEFAULT NULL,
            dates varchar(255) DEFAULT NULL,
            competitor varchar(255) DEFAULT NULL,
            competitor_dates varchar(255) DEFAULT NULL,
            competitor_name varchar(255) DEFAULT NULL,
            competitor_signature varchar(255) DEFAULT NULL,
            receipt_waiver varchar(255) DEFAULT NULL,
            receipt_dates varchar(255) DEFAULT NULL,
            receipt_name varchar(255) DEFAULT NULL,
            receipt_signature varchar(255) DEFAULT NULL,
            UNIQUE KEY id (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    $result["success"]=true;
    if(!isset($_POST['waiver_forms'])) {
        $result["success"] = false;
        echo json_encode($result) ;
        die();
    }
    $waiver_data = $_POST['waiver_forms'];
    $competion_name = $waiver_data['competion_name'];
    $location = $waiver_data['location'];
    $dates = $waiver_data['dates'];
    $competitor = $waiver_data['competitor'];
    $competitor_dates = $waiver_data['competitor_dates'];
    $competitor_name = $waiver_data['competitor_name'];
    $competitor_signature = $waiver_data['competitor_signature'];
    $receipt_waiver = $waiver_data['receipt_waiver'];
    $receipt_dates = $waiver_data['receipt_dates'];
    $receipt_name = $waiver_data['receipt_name'];
    $receipt_signature = $waiver_data['receipt_signature'];
    $inserted = $wpdb->insert('wp_waiver',
        array(
            'competion_name' => $competion_name,
            'location' => $location,
            'dates' => $dates,
            'competitor' => $competitor,
            'competitor_dates' => $competitor_dates,
            'competitor_name' => $competitor_name,
            'competitor_signature' => $competitor_signature,
            'receipt_waiver' => $receipt_waiver,
            'receipt_dates' => $receipt_dates,
            'receipt_name' => $receipt_name,
            'receipt_signature' => $receipt_signature
        ),
        array(
            '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'
        )
    );
    if(!$inserted) {
        $result["success"] = false;
    }
    echo json_encode($result) ;
    die();
}
add_action('wp_ajax_waiver_forms', 'vb_reg_waiver_forms');
add_action('wp_ajax_nopriv_waiver_forms', 'vb_reg_waiver_forms');


function new_modify_user_table( $column ) {
    $column['MID'] = 'MID';
    $column['address'] = 'Address';
    $column['user_phone'] = 'Phone';
    $column['is_status'] = 'New User';
    $column['is_lost_card'] = 'Lost Card';
    return $column;
}
add_filter( 'manage_users_columns', 'new_modify_user_table' );

function new_modify_user_table_row( $val, $column_name, $user_id ) {
    /*$user = get_userdata( $user_id );*/
    switch ($column_name) {
        case 'MID' :
            return get_the_author_meta( 'MID', $user_id );
            break;
        /*case 'is_active' :
            return !get_the_author_meta( 'is_active', $user_id ) ? 'false' : 'true';
            break;*/
        /*case 'expire_date' :
            return get_the_author_meta( 'expire_date', $user_id );
            break;*/
        case 'address' :
            return get_the_author_meta( 'address', $user_id ) . ' ' . get_the_author_meta( 'district', $user_id ). ' ' . get_the_author_meta( 'province', $user_id );
            break;
        case 'user_phone' :
            return get_the_author_meta( 'user_phone', $user_id );
            break;
        case 'is_status' :
            return get_the_author_meta( 'is_status', $user_id ) ? 'true' : 'false';
            break;
        case 'is_lost_card' :
            return get_the_author_meta( 'is_lost_card', $user_id ) ? 'true' : 'false';
            break;
        default:
    }
    return $return;
}
add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );

add_filter('manage_users_columns','remove_users_columns');
function remove_users_columns($column_headers) {
    unset($column_headers['role']);
    unset($column_headers['posts']);
    return $column_headers;
}

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
<table class="form-table">
    <tr>
        <th>
            <label for="address">
                <?php _e( "Phone"); ?>
            </label>
        </th>
        <td>
            <input type="tel" name="user_phone" id="user_phone" value="<?php echo esc_attr( get_the_author_meta( 'user_phone', $user->ID ) ); ?>" class="regular-text" />
        </td>
    </tr>
    <tr>
        <th>
            <label for="address">
                <?php _e( "Golf Club"); ?>
            </label>
        </th>
        <td>
            <input type="text" name="golf_club" id="golf_club" value="<?php echo esc_attr( get_the_author_meta( 'golf_club', $user->ID ) ); ?>" class="regular-text" />
        </td>
    </tr>

    <tr>
        <th>
            <label for="address">
                <?php _e( "Avatar"); ?>
            </label>
        </th>
        <td>
            <?php //echo get_the_author_meta( 'avatar', $user->ID ); ?>
            <img src="<?php echo get_the_author_meta( 'avatar', $user->ID ); ?>">
        </td>
    </tr>

</table>

<h3><?php _e("Address Detail (Preferred Delivery)", "blank"); ?></h3>
<table class="form-table">
    <tr>
        <th>
            <label for="address">
                <?php _e( "Address / Unit"); ?>
            </label>
        </th>
        <td>
            <input type="text" name="address" id="address" value="<?php echo esc_attr( get_the_author_meta( 'address', $user->ID ) ); ?>" class="regular-text" />
        </td>
    </tr>
    <tr>
        <th>
            <label for="district">
                <?php _e( "District"); ?>
            </label>
        </th>
        <td>
            <input type="text" name="district" id="district" value="<?php echo esc_attr( get_the_author_meta( 'district', $user->ID ) ); ?>" class="regular-text" />
        </td>
    </tr>
    <tr>
        <th>
            <label for="province">
                <?php _e( "Province"); ?>
            </label>
        </th>
        <td>
            <input type="text" name="province" id="province" value="<?php echo esc_attr( get_the_author_meta( 'province', $user->ID ) ); ?>" class="regular-text" />
        </td>
    </tr>
    <tr>
        <th>
            <label for="city">
                <?php _e( "City"); ?>
            </label>
        </th>
        <td>
            <input type="text" name="city" id="city" value="<?php echo esc_attr( get_the_author_meta( 'city', $user->ID ) ); ?>" class="regular-text" />
        </td>
    </tr>
     <tr>
        <th>
            <label for="date_of_birth">
                <?php _e( "Date Of Birth"); ?>
            </label>
        </th>
        <td>
            <input type="date" name="date_of_birth" id="date_of_birth" value="<?php echo esc_attr( get_the_author_meta( 'date_of_birth', $user->ID ) ); ?>" class="regular-text" />
        </td>
    </tr>
     <tr>
        <th>
            <label for="langguage">
                <?php _e( "Preferred Language"); ?>
            </label>
        </th>
        <td>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox1" name="langguage" <?php if (esc_attr( get_the_author_meta( "langguage", $user->ID )) == "Vietnamese") echo "checked"; ?> value="Vietnamese"> Vietnamese
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox2" name="langguage" <?php if (esc_attr( get_the_author_meta( "langguage", $user->ID )) == "English") echo "checked"; ?> value="English"> English
            </label>
        </td>
    </tr>
     <tr>
        <th>
            <label for="gender">
                <?php _e( "Gender"); ?>
            </label>
        </th>
        <td>
            <label class="radio-inline">
                <input type="radio" name="gender" id="inlineRadio1" <?php if (esc_attr( get_the_author_meta( "gender", $user->ID )) == "Male") echo "checked"; ?> value="Male"> Male
            </label>
            <label class="radio-inline">
                 <input type="radio" name="gender" id="inlineRadio2" value="Female" <?php if (esc_attr( get_the_author_meta( "gender", $user->ID )) == "Female") echo "checked"; ?>> Female
            </label>
        </td>
    </tr>
</table>
<h3><?php _e("Additional Detail", "blank"); ?></h3>
<table class="form-table">
    <tr>
        <th>
            <label for="is_active">
                <?php _e( "Active Viet Cap"); ?>
            </label>
        </th>
        <td>
            <?php echo  get_the_author_meta( 'is_active', $user->ID ) ? 'true' : 'false'; ?>
        </td>
    </tr>
    <tr>
        <th>
            <label for="is_payment">
                <?php _e( "Payment"); ?>
            </label>
        </th>
        <td>
            <?php echo  get_the_author_meta( 'is_payment', $user->ID ) ? 'true' : 'false'; ?>
        </td>
    </tr>
    <tr>
        <th>
            <label for="Register Date">
                <?php _e( "Register Date"); ?>
            </label>
        </th>
        <td>
            <?php echo esc_attr( get_the_author_meta( 'start_date', $user->ID ) ); ?>
        </td>
    </tr>
    <tr>
        <th>
            <label for="">
                <?php _e( "Expire Date"); ?>
            </label>
        </th>
        <td>
            <?php echo esc_attr( get_the_author_meta( 'expire_date', $user->ID ) ); ?>
        </td>
    </tr>
    <tr>
        <th>
            <label for="">
                <?php _e( "User Status"); ?>
            </label>
        </th>
        <td>
            <?php
                $start_date = get_the_author_meta( 'start_date', $user->ID );
                $today =  date('Y/m/d');
               // $tomorrow = date("Y/m/d", strtotime(date("Y/m/d", strtotime($today)) . " -1 day"));
                if($start_date == $today && (get_the_author_meta('is_status', $user->ID ) == 1)) {
                    ?>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" name="is_status" <?php if (esc_attr( get_the_author_meta( "is_status", $user->ID )) == "1") echo "checked"; ?> value="1">
                    New User
                </label>
                <?php
                }
            ?>
        </td>
    </tr>
    <tr>
        <th>
            <label for="">
                <?php _e( "Lost Card"); ?>
            </label>
        </th>
        <td>
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox2" name="is_lost_card" <?php if (esc_attr( get_the_author_meta( "is_lost_card", $user->ID )) == "1") echo "checked"; ?> value="1"> Replacement Card
            </label>
        </td>
    </tr>
</table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

    update_user_meta( $user_id, 'address', $_POST['address'] );
    update_user_meta( $user_id, 'district', $_POST['district'] );
    update_user_meta( $user_id, 'province', $_POST['province'] );
    update_user_meta( $user_id, 'city', $_POST['city'] );
    update_user_meta( $user_id, 'date_of_birth', $_POST['date_of_birth'] );
    update_user_meta( $user_id, 'langguage', $_POST['langguage'] );
    update_user_meta( $user_id, 'gender', $_POST['gender'] );
    update_user_meta( $user_id, 'golf_club', $_POST['golf_club'] );
    update_user_meta( $user_id, 'is_lost_card', $_POST['is_lost_card'] );
    update_user_meta( $user_id, 'is_status', $_POST['is_status'] );
}


add_action('admin_init', 'user_profile_fields_disable');

function user_profile_fields_disable() {

    global $pagenow;

    // apply only to user profile or user edit pages
    if ($pagenow!=='profile.php' && $pagenow!=='user-edit.php') {
        return;
    }

    // do not change anything for the administrator
    /*if (current_user_can('administrator')) {
        return;
    }*/

    add_action( 'admin_footer', 'user_profile_fields_disable_js' );

}


/**
 * Disables selected fields in WP Admin user profile (profile.php, user-edit.php)
 */
function user_profile_fields_disable_js() {
?>
    <script type="text/javascript">
        jQuery(document).ready( function($) {
            var fields_to_disable = ['user-role-wrap', 'user-admin-bar-front-wrap', 'user-comment-shortcuts-wrap', 'user-admin-color-wrap' , 'user-rich-editing-wrap', 'user-url-wrap', 'user-description-wrap'];
            for(i=0; i<fields_to_disable.length; i++) {
                if ( $('.'+ fields_to_disable[i]).length ) {
                    $('.'+ fields_to_disable[i]).css('display', 'none');
                }
            }

            $('#your-profile .form-table:eq(0)').css('display', 'none');
            $('#your-profile h2:eq(0)').css('display', 'none');

            if($("#profile-page h3:eq(2)").html() == "Customer Billing Address") {
                $("#profile-page h3:eq(2)").css('display', 'none');
                $("#profile-page h3:eq(2) + .form-table").css('display', 'none');
            }
            if($("#profile-page h3:eq(3)").html() == "Customer Shipping Address") {
                $("#profile-page h3:eq(3)").css('display', 'none');
                $("#profile-page h3:eq(3) + .form-table").css('display', 'none');
            }
        });

    function updateUsserStatus() {
        <?php /*update_user_meta( $_GET["user_id"], "is_status", true ); */?>
    }

    function replacementCard() {
        <?php /*update_user_meta( $_GET['user_id'], 'is_lost_card', false );*/ ?>
    }
    </script>
<?php
}

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function example_add_dashboard_widgets() {

    wp_add_dashboard_widget(
        'example_dashboard_widget',         // Widget slug.
        'Satistics',         // Title.
        'example_dashboard_widget_function' // Display function.
    );
     wp_add_dashboard_widget(
        'partners_dashboard_widget',         // Widget slug.
        'Satistics',         // Title.
        'partners_dashboard_widget_function' // Display function.
    );
}
add_action( 'wp_dashboard_setup', 'example_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function example_dashboard_widget_function() {
    $result = count_users();
    $count_users = $result['total_users'];
    $count_posts = wp_count_posts( 'golf_events' )->publish;

    echo '<div class="widget_totals">';
    echo '<div class="total total-user">
            <h2>'.$count_users.'</h2>
            <p>New Users</p>
          </div>';
    echo '<div class="total total-events">
        <h2>'.$count_posts.'</h2>
        <p>Golf Events</p>
        </div>';
    echo '<div class="clear"></div>';
    echo '</div>';
}

function partners_dashboard_widget_function() {
    $count_clubs = wp_count_posts( 'golf_clubs' )->publish;
    $count_partners = wp_count_posts( 'proud_partners' )->publish;

    echo '<div class="widget_totals">';
    echo '<div class="total total-clubs">
            <h2>'.$count_clubs.'</h2>
            <p>Golf Clubs</p>
          </div>';
    echo '<div class="total total-partner">
        <h2>'.$count_partners.'</h2>
        <p>Proud Partners</p>
        </div>';
    echo '<div class="clear"></div>';
    echo '</div>';
}

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .widget_totals .total {
        width: 42%;
        float:left;
        border: 1px solid #ddd;
        color: #fff;
        padding: 15px 3%;

    }
    .total-user {
        margin-right: 2%;
        background: #e84c3d url('.get_template_directory_uri().'/images/dashboard/bg-total-users.png) no-repeat right bottom;
    }
    .total-events {
        float: right;
        background: #1abc9c url('.get_template_directory_uri().'/images/dashboard/bg-total-events.png) no-repeat right bottom;
    }
    .total-clubs {
        margin-right: 2%;
        background: #3598db url('.get_template_directory_uri().'/images/dashboard/bg-total-club.png) no-repeat right bottom;
    }
    .total-partner {
        float: right;
        background: #9a59b5 url('.get_template_directory_uri().'/images/dashboard/bg-total-partner.png) no-repeat right bottom;
    }

    .widget_totals .total p ,
    .widget_totals .total h2 {
        color: #fff !important;
        margin-top: 0px !important;
    }
    .widget_totals .total h2 {
        font-size: 32px;
        margin-bottom: 10px;
    }
    .widget_totals {
        position: relative:
    }
    .clear {
        clear: both;
    }
  </style>';

}

add_filter( 'parse_query', 'exclude_pages_from_admin' );
function exclude_pages_from_admin($query) {
    global $pagenow,$post_type;
    if (is_admin() && $pagenow=='edit.php' && $post_type =='page') {
        $query->query_vars['post__not_in'] = array('110','219','47', '270', '272', '157',
            '242', '39', '132', '105', '260' , '264', '290', '268', '276', '41', '283', '253');
    }
}


function save_func($ID, $post,$update) {
    if($post->post_status != 'publish' ) {
        $url = 'http://vn.ehandicap.net/cgi-bin/admin_group.exe?REMOVE=1&ID='.$ID;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// returns the result - very important
        $response = curl_exec($ch);
        curl_close($ch);
    } elseif($update == true) {
/*        global $wpdb;
        $sqlQuery = "SELECT *  FROM wp_posts WHERE wp_posts.post_type='golf_clubs'";
        $clubs = $wpdb->get_results($sqlQuery);
        foreach($clubs as $c) {
            $ehandicap  = new ehandicap();
            $golf = new eHandicapGolf();
            $golf->ID = $c->ID;
            $golf->NAME = str_replace(' ', '+', $c->post_title);
            $golf->PASSWORD = $ID.'pass';
            $golf->STATUS = 'A';
            $ehandicap->RegisterGolf($golf);

            $url= 'http://vn.ehandicap.net/cgi-bin/admin_group.exe?CHANGE=1&ID='.$c->ID.'&NAME='.str_replace(' ', '+', $c->post_title).'&PASSWORD='.$c->ID.'pass&STATUS=A';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// returns the result - very important
            $response = curl_exec($ch);
            curl_close($ch);
        }*/
        $ehandicap  = new ehandicap();
        $golf = new eHandicapGolf();
        $golf->ID = $ID;
        $golf->NAME = str_replace(' ', '+', $post->post_title);
        $golf->PASSWORD = $ID.'pass';
        $golf->STATUS = 'A';
        $ehandicap->RegisterGolf($golf);

        $url= 'http://vn.ehandicap.net/cgi-bin/admin_group.exe?CHANGE=1&ID='.$ID.'&NAME='.str_replace(' ', '+', $post->post_title).'&PASSWORD='.$ID.'pass&STATUS=A';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// returns the result - very important
        $response = curl_exec($ch);
        curl_close($ch);
    }
}

add_action( 'save_post_golf_clubs', 'save_func', 10, 3 );