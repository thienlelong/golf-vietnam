		</div>
	</main><!--end main-->

	<footer>
		<div class="container">
		<!-- 	<div class="logo footer-logo">
			<a href="<?php echo site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo-footer.png" alt="" width="250" height="62" /></a>
		</div>end logo

		<nav id="footer-navigation" class="navbar-modern navbar-footer" role="navigation">
			<?php wp_nav_menu(array(
				'theme_location' => 'footer-navigation',
				'container' => 'ul',
				'menu_class' => 'nav navbar-nav',
				'fallback_cb' => false,
			)); ?>
		</nav>

		<div class="socials">
			<a href="" class="social twitter" target="_blank"><i class="genericon genericon-twitter"></i></a>
			<a href="" class="social pinterest" target="_blank"><i class="genericon genericon-pinterest"></i></a>
			<a href="" class="social facebook" target="_blank"><i class="genericon genericon-facebook-alt"></i></a>
		</div> -->
		</div>
	</footer><!--end footer-->

	<div class="bottom-bar">
		<div class="container">
			<div class="row">
				<div id="copyright" class="col-sm-6">
					<?php
					$ori_str = array('{$year}', '{$site_url}', '{$site_name}');
					$new_str = array(date('Y'), home_url(), get_bloginfo('name'));
					echo '<p class="copyright">' . str_replace( $ori_str, $new_str, get_theme_mod('copyright_text', '&copy; '. get_bloginfo('name') .' '. date('Y')) ) . '</p>';
					?>
				</div>

				<div  class="col-sm-6 app-store">
					<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/logo-google-play.png" alt="" /></a>
					<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/logo-app-store.png" alt="" /></a>
				</div>
			</div>
		</div>
	</div>

</div><!--end#wrapper-->
<?php wp_footer(); ?>
<?php //if(ot_get_option('footer_js')) : echo '<script type="text/javascript">' . ot_get_option('footer_js', '') . '</script>'; endif; ?>
</body>
</html>