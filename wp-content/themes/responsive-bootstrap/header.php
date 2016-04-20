<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">
	<header>
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
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<a href="#" class="btn  btn-radius btn-lg"><span class="glyphicon glyphicon-search"></span> Find a Course</a>
								</div>
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
						if(function_exists( 'ot_get_option' )) : echo '<img src="'. ot_get_option('logo', get_bloginfo('template_directory') . '/images/logo.png') .'" alt="" />'; endif;
						?>
					</a>
				</div>
				<div class="col-md-6">
					<nav class="navbar navbar-modern" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
								<span class="sr-only">Menu</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="main-navigation">
							<?php wp_nav_menu(array(
								'theme_location' => 'main-navigation',
								'container' => 'ul',
								'menu_class' => 'nav navbar-nav',
								'fallback_cb' => false,
							)); ?>
						</div>
					</nav><!--end nav-->
				</div>
				<div class="header-right col-md-3">
					<!-- <a type="button" class="language-toggle">
						ENGLISH <span class="caret"></span>
					</a> -->
					<?php pll_the_languages( array(
					   'dropdown' => 1,
					   'show_flags' => 1,
					   'hide_if_empty' => 0
					)); ?>
					<a href="#" class="btn btn-login btn-radius">Log in</a>
				</div>
			</div>
		</div>
	</header><!--end header-->
	<main>
		<div class="container">