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

	<div id="top-bar" class="top-bar">
		<div class="container">
			<a class="wholesale-login-link" href="">Wholesale Login</a>
			<a class="cart-link" href="">Cart (2)</a>
		</div>
	</div>

	<main>

		<header>
			<div class="container">
				<div class="row">

					<div id="logo" class="logo col-sm-6">
					<!-- 	<a href="<?php echo site_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>">
						<?php if( get_theme_mod( 'logo' )) : ?>
							<img src="<?php echo get_theme_mod( 'logo' )?>" alt="logo" width="250" height="60" />
						<?php endif; ?>

					</a> -->
						<a href="<?php echo site_url(); ?>">
							<?php
								if(function_exists( 'ot_get_option' )) : echo '<img src="'. ot_get_option('logo', get_bloginfo('template_directory') . '/images/logo.png') .'" alt="" />'; endif;?>
							</a>
					</div>

					<div class="socials col-sm-6">
						<?php
							if(ot_get_option('sc_facebook')) : echo '<a target="_blank" href="' . ot_get_option('sc_facebook') . '" class="social facebook"><i class="genericon genericon-facebook-alt"></i></a>'; endif;
							if(ot_get_option('sc_pinterest')) : echo '<a target="_blank" href="' . ot_get_option('sc_pinterest') . '" class="social pinterest"><i class="genericon genericon-pinterest"></i></a>'; endif;
							if(ot_get_option('sc_instagram')) : echo '<a target="_blank" href="' . ot_get_option('sc_instagram') . '" class="social instagram"><i class="genericon genericon-instagram"></i></a>'; endif;
						?>
					</div>

				</div>
			</div>
		</header><!--end header-->

		<nav class="navbar navbar-modern" role="navigation">
			<div class="container">
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
			</div>
		</nav><!--end nav-->

		<div class="container">