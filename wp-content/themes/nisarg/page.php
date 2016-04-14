<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Nisarg
 */

get_header(); ?>
<div class="container">
    <div class="row">
		<div id="primary" class="col-sx-12 content-area">
			<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="page-header">
						<div class="row">
							<div class="col-sm-3"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>
							<div class="col-sm-9 text-right">
								<img src="<?php bloginfo('template_directory'); ?>/images/page-banner.png" alt="">
							</div>
						</div>
					</div>
					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div> <!--.row-->
</div><!--.container-->
<?php get_footer(); ?>
