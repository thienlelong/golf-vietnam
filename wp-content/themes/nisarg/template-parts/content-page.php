<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>

	<?php nisarg_featured_image_disaplay(); ?>
	<div class="entry-content page-content">
		<?php the_content();
		?>
		<div class="inner-70 page-waiver-form">
			<h2 class="page-title text-center">VIETNAM GOLF ASSOCIATION & GOLF VIETNAM <br>AMATEUR STATUS CONFIRMATION AND WAIVER</h2>
			<div class="page-description">
				<p>I acknowledge that individuals who participate in golf events which award prize money or its equivalent or prizes, vouchers or testimonials of an aggregate retail value exceeding $1000.00 USD or of a nature which is the equivalent of money or makes it readily convertible into money are liable to lose their amateur status and eligibility to play in amateur golf events, or in the case of students may lose their academic eligibility and scholarships.</p>
				<p>I understand that I can protect my amateur status by signing a waiver revoking such prizes and providing the same to a tournament official before beginning the competition.
				</p>
				<p>I hereby revoke all right and entitlement to all prize money or its equivalent, and all prizes, vouchers or testimonials that violate the Rules of Amateur Status as approved by Golf Vietnam that I may win for golf competition in the following tournament:
				</p>
			</div>
			<div class="waiver-form">
			<?php echo do_shortcode('[contact-form-7 id="256" title="Waiver Form" html_class="form-horizontal"]'); ?>
				<!-- <form class="form-horizontal">
				    <div class="form-group">
				    	<div class="col-xs-12">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    </div>
				    <div class="form-group">
				    	<div class="col-xs-12">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    </div>
				    <div class="form-group">
				    	<div class="col-xs-12">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    </div>
				    <p>Without limiting the foregoing, I agree not to accept any cash prizes, and any merchandise prizes whose aggregate retail value exceeds $1000.00 that I might win at the above tournament. </p>
				    <div class="form-group">
				    	<div class="col-xs-12">
				    		<label>Competitor :</label>
				    	</div>
				    	<div class="col-xs-12">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    </div>
				    <div class="form-group">
				    	<div class="col-xs-4">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    	<div class="col-xs-4">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    	<div class="col-xs-4">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    </div>
				    <div class="form-group">
				    	<div class="col-xs-12">
				    		<label>Receipt of waiver acknowledged by Tournament Official :</label>
				    	</div>
				    	<div class="col-xs-12">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    </div>
				    <div class="form-group">
				    	<div class="col-xs-4">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    	<div class="col-xs-4">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    	<div class="col-xs-4">
				      		<input type="text" class="form-control"  placeholder="Name of Competion">
				    	</div>
				    </div>
				    <div class="form-group">
				    	<div class="col-xs-12 text-center">
				    		<input type="submit" value="submit WAIVER form" class="btn btn-radius">
				    	</div>
				    </div>
				  </div>
				</form> -->
			</div>
		</div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nisarg' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

