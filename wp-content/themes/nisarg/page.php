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
						<div class="col-md-4">

						<?php if($_GET["category"]) {
						    $category =  $_GET['category'];
						    echo '<h1 class="entry-title text-capitalize">'. str_replace("-"," ", $category) .'</h1>';
						} else {
							if(is_page(105)) {
								echo '<div class="login-page">';
									the_title( '<h1 class="entry-title">', '</h1>' );
								?>
									<img src="<?php bloginfo('template_directory'); ?>/images/headers/logo-vietcap.png" alt="" />
								</div>
							<?php
							} else {
								the_title( '<h1 class="entry-title">', '</h1>' );
							}
						}
						?>
						</div>
						<div class="col-md-8 text-right">
						<?php
			                $wp_query = new WP_Query(array(
			                    'post_type' => 'advertisements',
			                    'posts_per_page' => 1,
			                    'order' => 'ASC',
			                    'orderby' => 'menu_order',
			                    'caller_get_posts' => 1,
			                    's' => 'Top Banner',
			                ));
			                if($wp_query->have_posts()) :
			                ?>
			                    <?php while($wp_query->have_posts()) : $wp_query->the_post(); $key++; ?>
			                        <a href="<?php echo get_post_meta($post->ID, 'advertisements_url', true); ?>" target="_blank"><img src="<?php echo get_field('advertisements_banner', $post->ID); ?>" alt=""></a>
			                    <?php endwhile; ?>
			                <?php endif; wp_reset_query(); ?>
							<!-- <img src="<?php bloginfo('template_directory'); ?>/images/page-banner.png" alt=""> -->
						</div>
					</div>
				</div>
				<?php if(is_page('join-now') || is_page('tham-gia-ngay')) {
						get_template_part( 'template-parts/content', 'joinnow' );
					} elseif(is_page('golf-club-listings') || is_page('danh-sach-golf-club')) {
						get_template_part( 'template-parts/content', 'golf-club-listings' );
					} elseif(is_page('golf-events') || is_page('su-kien-golf')) {
						get_template_part( 'template-parts/content', 'golf-events' );
					}
					else {
						get_template_part( 'template-parts/content', 'page' );
					}
				?>
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!--.container-->
<?php get_footer(); ?>
