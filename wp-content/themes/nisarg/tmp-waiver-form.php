<?php
/*
 * Template Name: Vaiver Form
 **/
    get_header();
?>
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
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
                    <div class="entry-content page-content">
                    <div class="inner-70">
                    <?php the_content(); ?>
                    <form action="" class="form-horizontal waiver-form" id="waiver-form">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="competion_name" placeholder="<?php _e('Name of Competion', 'nisarg') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="location" placeholder="<?php _e('Location', 'nisarg') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="dates" placeholder="<?php _e('Dates', 'nisarg') ?>">
                            </div>
                        </div>
                        <p><?php _e('Without limiting the foregoing, I agree not to accept any cash prizes, and any merchandise prizes whose aggregate retail value exceeds $1000.00 that I might win at the above tournament.', 'nisarg'); ?> </p>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label><?php _e('Competitor', 'nisarg'); ?>:</label>
                            </div>
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="competitor" placeholder="<?php _e('Competitor', 'nisarg') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                             <input type="text" class="form-control bottom-15" name="competitor_dates" placeholder="<?php _e('Dates', 'nisarg') ?>">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control bottom-15" name="competitor_name" placeholder="<?php _e('Name', 'nisarg') ?>">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control bottom-15" name="competitor_signature" placeholder="<?php _e('Signature', 'nisarg') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label><?php _e('Receipt of waiver acknowledged by Tournament Official :','nisarg'); ?></label>
                            </div>
                            <div class="col-xs-12">
                                <input type="text" class="form-control" name="receipt_waiver" placeholder="<?php _e('Receipt of waiver acknowledged by Tournament Official', 'nisarg') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                 <input type="text" class="form-control bottom-15" name="receipt_dates" placeholder="<?php _e('Dates', 'nisarg') ?>">
                            </div>
                            <div class="col-sm-4">
                                 <input type="text" class="form-control bottom-15" name="receipt_name" placeholder="<?php _e('Name', 'nisarg') ?>">
                            </div>
                            <div class="col-sm-4">
                                 <input type="text" class="form-control bottom-15" name="receipt_signature" placeholder="<?php _e('Signature', 'nisarg') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <input type="button" id="submit_waiver_form" class="btn btn-radius btn-lg-13" value="<?php _e('submit WAIVER form', 'nisarg'); ?>">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <div class="results-message alert alert-warning" style="display: none;"><?php _e('You Are Submitted Successfully', 'nisarg'); ?></div>
                            </div>
                        </div>

                    </form>
                    </div>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->
            <?php endwhile; // End of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!--.container-->
<script type="text/javascript">
    jQuery( document ).ready(function($) {
        jQuery('input[name=receipt_dates]').datepicker();
        jQuery('input[name=competitor_dates]').datepicker();
        jQuery('input[name=dates]').datepicker();


        jQuery('#submit_waiver_form').click(function() {
            var ajax_url = vb_reg_vars.vb_ajax_url;
            var data = {
                action: 'waiver_forms',
                waiver_forms: arrayToObject(jQuery('#waiver-form').serializeArray())
            };
            jQuery.ajax({
                url: ajax_url,
                data: data,
                type: 'post',
                datatype: 'json',
                success: function(response) {
                    result = jQuery.parseJSON(response);
                    console.log(result);
                    if (result.success) {
                        jQuery('.results-message').css('display', 'block');
                    }
                },
                error: function(response) {
                    result = jQuery.parseJSON(response);
                }
            });

        });
    });
</script>
<?php get_footer(); ?>
