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
      <div id="logo" class="logo col-md-3">
        <a type="button" class="menu-toggle" data-toggle="modal" data-target="#myModal">
          MENU <span class="caret"></span>
        </a>
        <!-- Modal -->
        <div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
<!--               <div class="modal-header">
  <a href="#" class="btn  btn-radius btn-lg"><i class="fa fa-search cl-white" aria-hidden="true"></i> <?php _e('Find a Course', 'nisarg'); ?></a>
</div> -->
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
        <a href="<?php echo site_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>">
          <?php
          if(function_exists( 'ot_get_option' )) : echo '<img src="'. ot_get_option('logo', get_bloginfo('template_directory') . '/images/headers/logo.png') .'" alt="" />'; endif;
          ?>
        </a>
      </div>
      <div class="col-md-6">
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
           <!--  <a class="navbar-brand" href="<?php echo esc_url( home_url('/'));?>"><?php bloginfo('name')?></a> -->
          </div>
            <?php if ( has_nav_menu( 'primary' ) ) {
                nisarg_header_menu(); // main navigation
              }
            ?>
        </div>
      </nav>
      </div>
      <div class="header-right col-md-3">
        <?php pll_the_languages( array(
           'dropdown' => 1,
           'show_flags' => 1,
           'hide_if_empty' => 0,
           'display_names_as' => 1
        )); ?>
        <a href="<?php echo get_site_url(); ?>/login" class="btn btn-login btn-radius"><?php _e( 'Log in', 'nisarg' ); ?></a>
      </div>
    </div>
  </div> <!-- end .container-fluid -->
 <!--  <div id="cc_spacer"></div> --><!-- used to clear fixed navigation by the themes js -->
  <div class="site-header">
    <div class="container">
        <?php if(is_front_page()): ?>
        <div class="row site-header-info">
          <div class="col-md-6 text-right"><img src="<?php bloginfo('template_directory'); ?>/images/headers/logo-vietcap.png" alt="" />
            <span class="btn btn-vietcap">
              <h3><?php _e( 'VietCap', 'nisarg' ); ?></h3>
              <h4><?php _e( 'VietNam National Handicap System', 'nisarg' ); ?></h4>
            </span>
          </div>
          <div class="col-md-6">
            <span class="btn btn-golf-better">
              <h3><?php _e( 'Making Vietnam', 'nisarg' ); ?></h3>
              <h3><?php _e( 'Golf Better', 'nisarg' ); ?></h3>
            </span>
            <span href=""><img src="<?php bloginfo('template_directory'); ?>/images/headers/logo-vga.png" alt="" /></span>
          </div>
        </div>
      <?php elseif(is_page('join-now') || is_page('dang-ky')): ?>
        <div class="site-join-now text-center">
          <a href="<?php echo site_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>">
            <?php
            if(function_exists( 'ot_get_option' )) : echo '<img src="'. ot_get_option('logo', get_bloginfo('template_directory') . '/images/headers/logo.png') .'" alt="" />'; endif;
            ?>
          </a>
          <h2 class="display-inline"><?php _e('HELP GROW THE GAME IN VIETNAM', 'nisarg'); ?></h2>
        </div>
      <?php endif; ?>
    </div><!--.site-branding-->
  </div><!--.site-header-->
</header>
<div id="content" class="site-content">


