<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nisarg
 */

?>
<?php if(is_page('login') || is_page('dang-nhap')){
		if ( is_user_logged_in() ) {?>
		<script type="text/javascript">
			location.href = '<?php echo home_url(); ?>'
		</script>
	<?php }
	} ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>

	<?php nisarg_featured_image_disaplay(); ?>
	<div class="entry-content page-content">
		<?php the_content();
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nisarg' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

