<?php 
/*
 * Blog Page
 **/
 get_header();
?>

<h3 class="title page-title entry-title">Blog</h3>

<div class="row">
	
	<div id="sidebar" class="col-sm-3 sidebar left">
		<?php get_sidebar(); ?>
	</div>
	
	<div id="content" class="col-sm-9">
		
		<?php if(have_posts()) : ?>
		<div class="row">
			<?php while(have_posts()) : the_post(); ?>
			<div class="col-xs-12">
				<article class="post clearfix">
					<?php if(has_post_thumbnail()) : the_post_thumbnail('event-thumbnail', array('class'=>'attachment-post-thumbnail')); endif; ?>
					<p class="meta"><?php echo get_the_date(); ?></p>
					<h3 class="title entry-title post-title"><strong><?php the_title(); ?></strong></h3>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="button btn-block readmore">Read More</a>
				</article><!--end.article-->
			</div>
			<?php endwhile; ?>										
		</div>
		
		<?php 
		if($wp_query->max_num_pages > 1){
			echo '<div class="paginate">Page ';
			echo paginate_links(array(
				'prev_next' => false,
			)); 
			echo '</div>'; 
		} ?>
		
		<?php else : ?>
		
		<h3 class="entry-title">Not found!</h3>
		<p>There is not article matched your search. Please try again.</p>
		
		<?php endif; wp_reset_query(); ?>
		
	</div><!--end #content-->		
	
</div>

<?php get_footer(); ?>