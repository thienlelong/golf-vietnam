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
<?php wp_footer(); ?>
</body>
</html>
