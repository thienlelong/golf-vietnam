<?php
/*
 * Template Name: Payment
 **/
    get_header();
?>
<?php
    if($_GET["uid"]) {
        $_SESSION['usersId'] = $_GET["uid"];
        $_SESSION['is_renew'] = true;
        $_SESSION['lost_card'] = $_GET["lost_card"] ? true : false;
    }
    $_SESSION['SESSION'] = substr(str_shuffle(md5(time())), 0 , 15);
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
                            <div class="payment-info">
                                <h2 class="page-title"><?php _e('Items Details', 'nisarg') ?></h2>
                                <div class="pmitem">
                                  <div class="pmorder row">
                                      <div class="col-md-6">
                                        <h4 class="pmitem-header"><?php _e('Description', 'nisarg') ?></h4>
                                        <p class="pmitem-value text-left"><?php _e('Buy account of Golf Viet Nam.', 'nisarg') ?></p>
                                      </div>
                                      <div class="col-xs-4 col-md-2" >
                                        <h6 class="pmitem-header"><?php _e('QUANTITY', 'nisarg') ?></h6>
                                        <input id="number-user" type="number" class="pmitem-value" min="0" step="1" max="9999" disabled="true">
                                      </div  >
                                      <div class="col-xs-4 col-md-2" ><h6 class="pmitem-header"><?php _e('PRICE', 'nisarg') ?></h6>
                                        <span id="price" class="pmitem-value">888.888 vnd</span>
                                      </div  >
                                      <div  class="col-xs-4 col-md-2" ><h6 class="pmitem-header"><?php _e('TOTAL', 'nisarg') ?></h6>
                                        <span  id="total-price" class="pmitem-value">888.888 vnd</span>
                                      </div  >
                                  </div>
                                </div>
                            </div>
                            <div class="payment-detail">
                                <h2 class="page-title"><?php _e('Payment Details', 'nisarg') ?></h2>
                                <div class="pmitem">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <div class="pm-order">
                                                <label><?php _e('Transaction Amount', 'nisarg') ?>:</label>
                                                <span id="pm-total-price" class="cl-blue">$72.45 (CAD)</span>
                                            </div>
                                            <div class="pm-order">
                                                <label>Order ID:</label>
                                                <span class="cl-blue" id="orderId">mhp16104072730p58</span>
                                                </div>
                                        </div  >
                                        <div class="col-md-6 pm-paypal">
                                            <img src=<?php echo get_template_directory_uri()."/images/Paymentimgcard.png"?>>
                                        </div  >
                                    </div>
                                <p><?php _e('Please complete the following details exactly as they appear on your card. Do not put spaces or hyphens in the card number.', 'nisarg') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="payment-form row">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                                    <input type="checkbox" name="auto-renew" id="auto-renew" class="css-checkbox" value="auto renew" />
                                    <label for="auto-renew" class="css-label"><?php _e('Automatically renew my membership annually.', 'nisarg') ?></label>
                                </div>
                                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                                    <input type="checkbox" name="remind-expire" id="remind-expire" class="css-checkbox" value="Remind Expire" />
                                    <label for="remind-expire" class="css-label"><?php _e('Remind me 1 month in advance next year.', 'nisarg') ?></label>
                                    </label>
                                </div>
                                <p class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2"><?php _e('By payment an account you agree to our', 'nisarg') ?> <a href="<?php if(pll_current_language('locale') =='vi') { echo site_url('dieu-khoan-va-dieu-kien') ;} else { echo site_url('terms-and-conditions'); }?>" target="_blank"><?php _e('Terms and Conditions', 'nisarg') ?></a> <?php _e('and our', 'nisarg') ?>  <a href="<?php if(pll_current_language('locale') =='vi') { echo site_url('chinh-sach-bao-mat') ;} else { echo  site_url('privacy-policy'); }?>" target="_blank"><?php _e('Privacy Policy', 'nisarg') ?></a>.</p>
                                <div class="col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2">
                                    <button  id="btn-process-transaction" class="btn btn-radius btn-lg-13"><?php _e('process transaction', 'nisarg') ?></button>
                                    <?php echo do_shortcode('[easy_payment amount="9"]'); ?>
                                </div>
                                <div class="col-sm-5 col-md-4"><a href="<?php echo get_home_url(); ?>" class="btn btn-radius btn-lg-13 bg-red"><?php _e('cancel transaction', 'nisarg') ?></a></div>
                                <div id="confirm-checkbox" class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 alert alert-warning" role="alert" style="display: none;">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <?php _e('Please check all box before payment.', 'nisarg') ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->
            <?php endwhile; // End of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!--.container-->
<script type="text/javascript">
    jQuery( document ).ready(function($) {
        var lagguage = '<?php echo pll_current_language("locale"); ?>';
        var url_return = '<?php echo site_url("payment-success"); ?>';
        if(lagguage == 'vi') {
          url_return = '<?php echo site_url("dang-ky-thanh-cong") ?>';
        }
        var usersId = '<?php echo  $_SESSION["usersId"]; ?>';
        var totalUser = usersId.split(",").length;
        var SESSION = '<?php echo $_SESSION["SESSION"];?>';
        $('#orderId').html(SESSION);

        var lost_card =  '<?php echo $_SESSION["lost_card"];?>';
        $('#number-user').val(totalUser);
        $('#price').html('888.888 vnd');
        var totalVn = 888.888 * totalUser;
        var total = 40 * totalUser;
        if(lost_card) {
            $('#price').html('300.000 vnd');
            totalVn = 300.000 * totalUser + '.000';
            total = 14 * totalUser;
        }
        $('#total-price').html(totalVn + ' vnd');
        $('#pm-total-price').html(totalVn + ' vnd (CAD)');

        $('#easy_paypal_form_div form').attr('target', '');
        $('#easy_paypal_form_div form input[name=amount]').val(total);
        $('#easy_paypal_form_div form input[name=return]').val(url_return + '?SESSION=' + SESSION);
        $('#btn-process-transaction').click(function() {
            if($("input[name=auto-renew]").is(":checked") || $("input[name=remind-expire]").is(":checked")) {
                $('#easy_paypal_form_div input[type=image]').trigger('click');
            } else {
                $('#confirm-checkbox').css('display', 'block');
            }
        });
    });
</script>
<?php get_footer(); ?>
