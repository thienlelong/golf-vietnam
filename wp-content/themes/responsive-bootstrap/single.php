<?php 
/*
 * Inner Post
 **/
 get_header();
?>

<?php if(have_posts()) : the_post(); ?>

	<h2 class="title page-title entry-title"><?php the_title(); ?></h2>
	
	<div class="row">
		<div id="content" class="col-sm-8">
			<?php if(has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
			<?php the_content(); ?>
		</div>
		
		<div id="sidebar" class="col-sm-4 sidebar right">
			<?php get_sidebar(); ?>
		</div>
	</div>
	
<?php endif; ?>

<?php get_footer(); ?>