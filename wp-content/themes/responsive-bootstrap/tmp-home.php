<?php 
/*
 * Template Name: Home Page
 **/
 get_header();
?>

<?php if(have_posts()) : the_post(); ?>	
		
	<?php the_content(); ?>
	
<?php endif; ?>

<?php get_footer(); ?>