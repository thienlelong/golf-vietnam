	</main><!--end main-->	
	
	<footer>	
		<div class="container">			
			<?php get_sidebar('footer'); ?>
				
			<hr />
			
			<div class="row">							
				
				<div id="copyright" class="col-xs-6">
					<?php 
					$ori_str = array('{$year}', '{$site_url}', '{$site_name}');
					$new_str = array(date('Y'), home_url(), get_bloginfo('name'));
					echo '<p class="copyright">' . str_replace($ori_str, $new_str, ot_get_option('copyright_text', '&copy; loco flowers 2015 - all rights reserved')) . '</p>';
					?>
				</div>							
				
				<div id="designed" class="col-xs-6">
					<p class="designed alignright">Web Design by <a href="http://creativehaus.com/" target="_blank">CreativeHaus</a></p>
				</div>
			</div>
		</div>		
	</footer><!--end footer-->	
</div><!--end#wrapper-->
<?php wp_footer(); ?>
<?php if(!is_front_page()) : ?>
<script type="text/javascript">
	jQuery('.menu-item a').each(function(){
		jQuery(this).attr('href', jQuery(this).attr('href').replace(/#/g, "<?php echo site_url('#'); ?>"));
	});				
</script>
<?php endif; ?>
<script type="text/javascript">
(function () {

	//jQuery for page scrolling feature - requires jQuery Easing plugin
	jQuery(function() {		
		jQuery('a[href*=#]:not([href=#])').bind('click', function(event) {
			var jQueryanchor = jQuery(this);
			jQuery('html, body').stop().animate({
				scrollTop: jQuery(jQueryanchor.attr('href')).offset().top
			}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
	});

})(jQuery);
</script>
<?php if(ot_get_option('footer_js')) : echo '<script type="text/javascript">' . ot_get_option('footer_js', '') . '</script>'; endif; ?>
</body>
</html>