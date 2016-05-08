<?php 
/*
 * Template Name: Sidebar Left
 **/
 get_header();
?>
<div class="row">
	<div id="sidebar" class="col-sm-3 sidebar left">
		<?php get_sidebar(); ?>
	</div><!-- end sidebar -->
	<div id="content" class="col-sm-9 <?php echo 'page-' . $post->post_name; ?>">
		<?php if(have_posts()) : ?>	
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content(); ?>	
			<?php endwhile; ?>
		<?php else : ?>
			<h3 class="entry-title">Not found!</h3>
			<p>There is not article matched your search. Please try again.</p>
		<?php endif; wp_reset_query(); ?>
	</div><!--end #content-->
</div>
<?php get_footer('shop'); ?>