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
			<?php
                $wp_query = new WP_Query(array(
                    'post_type' => 'proud_partners',
                    'posts_per_page' => 20,
                    'order' => 'ASC',
                    'orderby' => 'menu_order',
                    'caller_get_posts' => 1
                ));
                if($wp_query->have_posts()) :
                ?>
                    <?php while($wp_query->have_posts()) : $wp_query->the_post(); $key++; ?>
					    <div class="item">
					    	<a href="<?php echo get_post_meta($post->ID, 'proud_partners_website', true); ?>" target="_blank"><img src="<?php echo get_field('proud_partners_logo', $post->ID); ?>" alt=""></a>
					    </div>
					<?php endwhile; ?>
				<?php endif; wp_reset_query(); ?>
			</div>
		</div>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="site-info col-sm-7">
					<?php
            if(pll_current_language('locale') =='vi') {
            ?>
	          <address>
						  <strong class="cl-green">Công Ty TNHH Đầu Tư Và Thương Mại Golf Việt Nam</strong><br>
						  Trụ Sở Chính: Số 125 Nguyễn Sơn, Phường Gia Thuỵ, Quận Long Biên, Hà Nội<br>
						  Văn Phòng Hiện Tại: Số 108 Từ Hoa, Phường Quảng An, Quận Tây Hồ, Hà Nội<br>
						  <?php echo '&copy; '.date("Y"); ?>
							<span class="sep"> | </span>
							<?php printf( esc_html__( 'VietCap. Thiết Kế  ','nisargf')); ?>
							<a href="http://ydcvn.com" target="_blank" class="cl-green">YDCVN</a>
						</address>
            <?php
            } else {
            ?>
            <address>
						  <strong class="cl-green">Golf Vietnam Investment And Trading Company Limited</strong><br>
						  Headquarters: No. 125 Nguyen Son Street, Gia Thuy Ward, Long Bien District, Ha Noi <br>
						  Current Office: No. 108 Tu Hoa Street, Quang An Ward, Tay Ho District, Ha Noi <br>
						  <?php echo '&copy; '.date("Y"); ?>
							<span class="sep"> | </span>
							<?php printf( esc_html__( 'VietCap. Designed with ','nisargf')); ?>
							<a href="http://ydcvn.com" target="_blank" class="cl-green">YDCVN</a>
						</address>
           	<?php
          	}
	        ?>

				</div><!-- .site-info -->
				<div  class="col-sm-5 app-store">
					<a href="#" data-toggle="tooltip" data-placement="left" title="Coming Soon"><img src="<?php bloginfo('template_directory'); ?>/images/footers/logo-google-play.png" alt="" /></a>
					<a href="#" data-toggle="tooltip" data-placement="right" title="Coming Soon"><img src="<?php bloginfo('template_directory'); ?>/images/footers/logo-app-store.png" alt="" /></a>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<script>
	jQuery(document).ready(function() {
		jQuery("#owl-partners").owlCarousel({
			autoPlay: 3000, //Set AutoPlay to 3 seconds
			items : 7,
			itemsDesktop : [1200,6],
			itemsDesktopSmall : [979,4],
			itemsMobile : [768,2],
			navigation: true,
			pagination: false,
			navigationText: false
		});

	});
</script>
<?php wp_footer(); ?>
</body>
</html>
