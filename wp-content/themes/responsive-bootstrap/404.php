<?php 
/*
 * 404 Page
 **/
 get_header();
?>

				
	<?php if(ot_get_option('errorpage_image')) : 
		echo '<a href="'. site_url() .'"><img src="' . ot_get_option('errorpage_image') . '" class="aligncenter" alt="" /></a>'; 
	endif; ?>
				
	<?php echo ot_get_option('errorpage_text', ''); ?>		
				

<?php get_footer(); ?>