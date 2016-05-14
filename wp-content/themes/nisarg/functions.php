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
}
add_action( 'wp_enqueue_scripts', 'nisarg_scripts' );


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


/*
Plugin Name: Register Helper Example
Plugin URI: http://www.paidmembershipspro.com/wp/pmpro-customizations/
Description: Register Helper Initialization Example
Version: .1
Author: Stranger Studios
Author URI: http://www.strangerstudios.com
*/
//we have to put everything in a function called on init, so we are sure Register Helper is loaded
function my_pmprorh_init()
{
    //don't break if Register Helper is not loaded
    if(!function_exists("pmprorh_add_registration_field"))
    {
        return false;
    }
    //define the fields
    $fields = array();
    $fields[] = new PMProRH_Field(
        "company",              // input name, will also be used as meta key
        "text",                 // type of field
        array(
            "size"=>40,         // input size
            "class"=>"company", // custom class
            "profile"=>true,    // show in user profile
            "required"=>true    // make this field required
        ));
    $fields[] = new PMProRH_Field(
        "referral",                     // input name, will also be used as meta key
        "text",                         // type of field
        array(
            "label"=>"Referral Code",   // custom field label
            "profile"=>"admins"         // only show in profile for admins
        ));
    $fields[] = new PMProRH_Field(
        "gender",                   // input name, will also be used as meta key
        "radio",
       	array("options"=>array("male"=>"Male", "female"=>"Female"))
    	);

   	 $fields[] = new PMProRH_Field(
        "languages",                   // input name, will also be used as meta key
        "checkbox",
       	array("profile"=>true)
    	);
   	$fields[] = new PMProRH_Field("avatar", "file", array("profile"=>true, "options"=>array()));
    //add the fields into a new checkout_boxes are of the checkout page
    foreach($fields as $field)
        pmprorh_add_registration_field(
            "checkout_boxes", // location on checkout page
            $field            // PMProRH_Field object
        );
    //that's it. see the PMPro Register Helper readme for more information and examples.
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
        //Redirect customers and subscribers to the "My Account" page
        $redirect = $home_page;
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
    $user_login = $user['user_email'];
    $last_name = $user['last_name'];
    $user_email = $user['user_email'];
    $password = $user['password'];
    $golf_club = isset($user['golf_club']) ? $user['golf_club'] : '';
    $district = $user['district'];
    $province = $user['province'];
    $city = $user['city'];
    $langguage = isset($user['langguage']) ? $user['langguage'] : '';
    $gender = $user['gender'];
    $avatar=$user['avatar'];
    $date_of_birth = $user['date_of_birth'];
    $start_date =  date('Y/m/d');
    $expire_date = date("Y/m/d", strtotime(date("Y/m/d", strtotime($start_date)) . " + 365 day"));
    $is_active = false;
    $MID = date('y').'00001';
    /**
     * IMPORTANT: You should make server side validation here!
     *
     */
    $uId = wp_create_user( $user_login, $password, $user_email) ;
    //Add metatdata for user
    if($uId!=0){
         //add user metadata
             $meta_keys = array("first_name","last_name","middle_name", "golf_club", "district", "province", "city", "langguage", "gender","avatar", "start_date", "expire_date", "is_active", "MID");
             $meta_values = array( $first_name,$last_name,$middle_name, $golf_club, $district, $province, $city, $langguage, $gender, $avatar,$start_date, $expire_date,  $is_active, $MID);
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

//call service api
//dungdh update userprofile
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

    
    <h3>Extra profile information</h3>

    <? echo the_content() ?>
    <table class="form-table">
        <tr>
            <th><label for="twitter">Twitter</label></th>

            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Twitter username.</span>
            </td>
        </tr>

    </table>
<?php }
