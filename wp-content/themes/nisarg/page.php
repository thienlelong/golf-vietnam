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
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="page-header">
					<div class="row">
						<div class="col-md-4"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>
						<div class="col-md-8 text-right">
							<img src="<?php bloginfo('template_directory'); ?>/images/page-banner.png" alt="">
						</div>
					</div>
				</div>
				<?php if(is_page('join-now')) {
						get_template_part( 'template-parts/content', 'joinnow' );
					} elseif(is_page('golf-club-listings') || is_page('danh-sach-golf-club')) {
						get_template_part( 'template-parts/content', 'golf-club-listings' );
					}else {
						get_template_part( 'template-parts/content', 'page' );
					}
				?>
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!--.container-->
<?php get_footer(); ?>
