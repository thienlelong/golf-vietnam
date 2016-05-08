<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php if(!is_home() && !is_page('home')) echo get_bloginfo('name') . ' &raquo; ' . get_the_title(); else echo get_bloginfo('name') . ' &raquo; ' . get_bloginfo('description'); ?></title>	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->	
	<?php wp_head(); ?>
	<script type="text/javascript">
		jQuery(function() {
			jQuery('nav#mmenu').mmenu({
				offCanvas: {
				   position  : "right",
				   zposition : "front"
				}
			});
		});
	</script>
	<?php if(ot_get_option('header_js')) : echo '<script type="text/javascript">' . ot_get_option('header_js', '') . '</script>'; endif; ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">
		
	<nav id="mmenu" style="display: none;">	
		<?php wp_nav_menu(array(
			'theme_location' => 'main-navigation',
			'container' => 'ul',
			'menu_class' => 'nav navbar-nav',	
			'fallback_cb' => false,
		)); ?>
	</nav>	

	<header>
		<div id="start" class="top-line"></div>
		<div class="container">
			<div class="row">
							
				<div id="top" class="col-sm-6 pull-right">
					<nav class="links hideonmobile">
						<ul>
							<li class="detail-text-when-search"><a href="callto:800-212-1212"><strong>Questions?  619-471-1900</strong></a></li> 
							<li><a href="/contact-us/">Email Us </a></li>							
							<li><a href="/my-account/">My Account</a></li>							
						</ul>
					</nav>					
					<div class="cart-widget">												
						<?php 
							global $woocommerce;
							$viewing_cart = __('View your shopping cart', 'your-theme-slug');
							$start_shopping = __('Start shopping', 'your-theme-slug');
							$cart_url = $woocommerce->cart->get_cart_url();
							$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
							$cart_contents_count = $woocommerce->cart->cart_contents_count;
							$cart_contents = sprintf(_n('View Cart (%d)', 'View Cart (%d)', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
							$cart_total = $woocommerce->cart->get_cart_total();
											
							if ($cart_contents_count == 0) {								
								$html = '<a class="iconshopping" href="'. $shop_page_url .'"><em>My Cart </em> (<span>0</span>)</a>
										<a href="'. $shop_page_url .'"><button class="btn-checkout hideonmobile">Go Shopping</button></a>';
							} else {								
								$html = '<a class="iconshopping" href="'. $cart_url .'"><em>My Cart </em> (<span>'. $cart_total .'</span>)</a>
										<a href="/checkout/"><button class="btn-checkout hideonmobile">Checkout</button></a>';
								
							}									
							echo $html;									
						?>						
					</div>
					<a class="navbar-toggle showonmobile" href="#mmenu">						
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
				</div>

				<div id="logo" class="logo col-sm-6">
					<a href="<?php echo site_url(); ?>"><?php if(function_exists( 'ot_get_option' )) : echo '<img src="'. ot_get_option('logo', get_bloginfo('template_directory') . '/images/logo.png') .'" alt="" />'; endif;?></a>
				</div><!--end#logo-->	
				
				<div id="guarantee" class="col-sm-3 pull-right hideonmobile"><span class="hotdeal hideonmobile"><strong class="highlight">Free Same Day Delivery*</strong> <a href="#">Details</a></span></div>
				
				<div id="menu" class="col-sm-9 hideonmobile">
					<nav class="navbar navbar-modern" role="navigation">
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
				
			</div>	
		</div>			
	</header><!--end header-->	
			
	
	<main>