<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Nisarg
 */

?>
	</div><!-- #content -->
	<div class="section-partners">
		<div class="container">
			<h1 class="section-title"><?php _e("Proud Partners", 'nisarg') ?>
			</h1>
			<div class="owl-carousel" id="owl-partners">
			    <div class="item">
			    	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/partners/logo-adias.png" alt=""></a>
			    </div>
			    <div class="item">
			    	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/partners/logo-callaway.png" alt=""></a>
			    </div>
			    <div class="item">
			    	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/partners/logo-footjoy.png" alt=""></a>
			    </div>
			    <div class="item">
			    	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/partners/logo-mercedes.png" alt=""></a>
			    </div>
			    <div class="item">
			    	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/partners/logo-ping.png" alt=""></a>
			    </div>
			    <div class="item">
			    	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/partners/logo-ping-play.png" alt=""></a>
			    </div>
			    <div class="item">
			    	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/partners/logo-puma.png" alt=""></a>
			    </div>
			    <div class="item">
			    	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/partners/logo-rolex.png" alt=""></a>
			    </div>

			    <div class="item">
			    	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/partners/logo-callaway.png" alt=""></a>
			    </div>
			    <div class="item">
			    	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/partners/logo-rolex.png" alt="">
			    	</a>
			    </div>
			</div>
		</div>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="site-info col-sm-6">
					<?php echo '&copy; '.date("Y"); ?>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'VietCap. Designed with ','nisargf')); ?>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nisarg' ) ); ?>">WordPress</a>
				</div><!-- .site-info -->
				<div  class="col-sm-6 app-store">
					<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/footers/logo-google-play.png" alt="" /></a>
					<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/footers/logo-app-store.png" alt="" /></a>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<script>
	jQuery(document).ready(function() {
		jQuery("#owl-partners").owlCarousel({
			autoPlay: 3000, //Set AutoPlay to 3 seconds
			items : 9,
			itemsDesktop : [1200,8],
			itemsDesktopSmall : [979,6],
			itemsMobile : [768,2],
			navigation: true,
			pagination: false,

		});

	});
</script>
<?php wp_footer(); ?>
</body>
</html>
