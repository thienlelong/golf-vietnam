<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Nisarg
 */

?>
<!DOCTYPE html>

<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<header id="masthead"  role="banner">
  <div class="container-fluid">
    <div class="row">
        <!-- Modal -->
        <div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <nav id="left-navigation" class="navbar-modern navbar-footer" role="navigation">
                  <?php wp_nav_menu(array(
                    'theme_location' => 'left-navigation',
                    'container' => 'ul',
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => false,
                  )); ?>
                </nav>
              </div>
            </div><!-- modal-content -->
          </div><!-- modal-dialog -->
        </div><!-- modal -->
       </a>
      <div class="col-md-9 col-sm-12 co-xs-6">
      <nav class="navbar navbar-default " role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="" id="navigation_menu">
          <div class="navbar-header">
            <?php if ( has_nav_menu( 'primary' ) ) { ?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php } ?>
            <a type="button" class="menu-toggle menu-left" data-toggle="modal" data-target="#myModal">
              <?php _e( 'MENU', 'nisarg' ); ?><span class="caret"></span>
            </a>
           <a id="logo" class="navbar-brand" href="<?php echo esc_url( home_url('/'));?>"><img src="<?php echo get_bloginfo('template_directory')?>/images/headers/logo.png" alt="Logo"></a>
          </div>
            <?php if ( has_nav_menu( 'primary' ) ) {
                nisarg_header_menu(); // main navigation
              }
            ?>
        </div>
      </nav>
      </div>
      <div class="header-right col-md-3 col-sm-12 co-xs-6">
        <img id="lagguage-vn" style="display: none" src="<?php bloginfo('template_directory'); ?>/images/headers/icon-vietnam.png" alt="" />
        <img id="lagguage-en" style="display: none" src="<?php bloginfo('template_directory'); ?>/images/headers/icon-english.png" alt="" />
        <?php pll_the_languages( array(
           'dropdown' => 1,
           'show_flags' => 1,
           'hide_if_empty' => 0,
           'display_names_as' => 1
        )); ?>
        <?php if (is_user_logged_in()) {
        ?>
        <a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="btn btn-login btn-radius"><?php _e( 'Log out', 'nisarg' ); ?></a>
        <?php
        } else { ?>
          <a href="<?php if(pll_current_language('locale')=='vi'){
                    echo site_url('dang-nhap');
                }else {echo site_url('login');}?>" class="btn btn-login btn-radius">
            <?php _e( 'Log in', 'nisarg' ); ?>
          </a>
        <?php } ?>
      </div>
    </div>
  </div> <!-- end .container-fluid -->

    <?php if(is_front_page()): ?>
    <div class="site-header">
        <div class="container">
            <div class="row site-header-info">
              <div class="col-md-5 text-right header-baner">
                <span class="btn btn-vietcap">
                  <h3><?php _e( 'VietCap', 'nisarg' ); ?></h3>
                  <h4><?php _e( 'The Handicap System DESIGNED for Vietnam', 'nisarg' ); ?></h4>
                </span>
              </div>
              <div class="col-md-2 text-center">
                <img src="<?php bloginfo('template_directory'); ?>/images/headers/logo-vietcap-large.png" alt="" />
              </div>
              <div class="col-md-5 header-baner">
                <span class="btn btn-golf-better">
                  <h3><?php _e( 'Making Vietnam', 'nisarg' ); ?></h3>
                  <h3><?php _e( 'Golf Better', 'nisarg' ); ?></h3>
                </span>
              </div>
            </div>
        </div>
    </div>
    <?php elseif(is_page('join-now') || is_page('tham-gia-ngay')): ?>
    <div class="site-header">
        <div class="container">
            <div class="site-join-now text-center">
              <a href="<?php echo site_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>">
                <?php
                if(function_exists( 'ot_get_option' )) : echo '<img src="'. ot_get_option('logo', get_bloginfo('template_directory') . '/images/headers/logo-vietcap.png') .'" alt="" />'; endif;
                ?>
              </a>
              <h2 class="display-inline"><?php _e('HELP GROW THE GAME IN VIETNAM', 'nisarg'); ?></h2>
            </div>
        </div><!--.site-branding-->
    </div><!--.site-header-->
    <?php endif; ?>
</header>
<div class="modal js-loading-bar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img src="<?php bloginfo('template_directory'); ?>/images/icon-loading.gif" alt="">
            </div>
        </div>
    </div>
</div>
<form ACTION="http://vietcap.eHandicap.net" METHOD="POST" id="verify-handicap">
  <input type="hidden" name="SysLogin"  value="1">
</form>

<div id="content" class="site-content">
<script type="text/javascript">
    jQuery( document ).ready(function($) {
        if($( "#lang_choice_1 option:selected" ).val() == 'en') {
            $('#lagguage-en').css('display', 'inline');
        } else {
            $('#lagguage-vn').css('display', 'inline');
        }
        $( '.navbar-nav > li.handicap-member > a' ).click( function(e){
          e.preventDefault();
          var is_login = '<?php echo is_user_logged_in(); ?>';
          if(is_login == 1) {
            var user_lastname = '<?php echo wp_get_current_user()->user_lastname;?>';
            var user_firstname  = '<?php echo wp_get_current_user()->user_firstname ;?>';
            var MID = '<?php echo get_user_meta(get_current_user_id() , "MID", true); ?>';
            var CID = '<?php echo get_user_meta(get_current_user_id() , "CID", true); ?>';
            window.location.href = 'http://vietcap.ehandicap.net/cgi-bin/hcapstat.exe?NAME=' + user_lastname + user_firstname +'&MID='+ MID +'&CID='+CID;
          } else {
            var lagguage = '<?php echo pll_current_language("locale"); ?>';
            if(lagguage == 'vi') {
              window.location.href = '<?php echo site_url("dang-nhap") ?>';
            } else {
              window.location.href = '<?php echo site_url("login") ?>';
            }
          }
        });
        $( '.navbar-nav > li.verify-handicap > a' ).click( function(e){
          $('#verify-handicap').submit();
        });
    });
</script>