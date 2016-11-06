<?php
/*
 * Template Name: Payment
 **/
    get_header();
?>
<?php
    include(TEMPLATEPATH.'/onepay/onepay-payment.php');
    include(TEMPLATEPATH.'/onepay-quocte/onepay-payment-qt.php');
    if($_GET["uid"]) {
        $_SESSION['usersId'] = $_GET["uid"];
        $_SESSION['is_renew'] = true;
        $_SESSION['lost_card'] = $_GET["lost_card"] ? true : false;
    }
    $total = $_GET["lost_card"] ? 300000 : 888888;
    $_SESSION['SESSION'] = 'ORDER_ID_'.strtoupper(time());

    $userIDs = explode(",", $_SESSION["usersId"]);
    $total_amount = $total * count($userIDs) * 100;
    $order_description = "Buy VietCap Membership";
    $vpc_ReturnURL = site_url("payment-success");
    $vpc_Locale = 'en';
    if (pll_current_language("locale") == "vi" ){
        $url_success = site_url("dang-ky-thanh-cong");
        $vpc_Locale = 'vn';
    }

    $params = array(
        'vpc_Version'       =>  '2',
        'vpc_Command'       =>  'pay',
        'vpc_Locale'        =>  $vpc_Locale,
        'vpc_ReturnURL'     =>  $vpc_ReturnURL,
        'vpc_OrderInfo'     =>  $_SESSION['SESSION'],
        'vpc_Amount'        =>  $total_amount,
        'vpc_TicketNo'      =>  $_SERVER['REMOTE_ADDR'],
        'Title'             =>  $order_description,
        'AgainLink'         =>  urlencode('http://vietcap.com.vn')
    );
    $onePayPayment = new OnePayPayment();
    $onePayPaymentQt = new OnePayPaymentQt();
    $url = $onePayPayment->createRequestUrl($params);
    $urlQt = $onePayPaymentQt->createRequestUrl($params);
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
                                        <p class="pmitem-value text-left"><?php _e('Buy account of VietCap', 'nisarg') ?></p>
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
                                    <div>
                                        <div class="row" >
                                            <div class="col-sm-6 pm-order">
                                                <label><?php _e('Transaction Amount', 'nisarg') ?>: </label>
                                                <span id="pm-total-price" class="cl-blue">$72.45 (CAD)</span>
                                            </div>
                                            <div class="col-sm-6 pm-order">
                                                <label>Order ID: </label>
                                                <span class="cl-blue" id="orderId"><?php echo time();?></span>
                                                </div>
                                        </div  >
                                        <div class="row">
                                            <h2 class="page-title col-sm-12"><?php _e('Payment Methods', 'nisarg') ?></h2>
                                            <div class="col-sm-6 ">
                                                <div class="payment-onepay">
                                                    <input type="radio" name="payment" id="atm" checked value="atm" class="css-checkbox" />
                                                    <label for="atm" class="css-label"><?php _e('Viet Name Local Debit Card', 'nisarg'); ?></label>
                                                </div>
                                                <img src="<?php bloginfo('template_directory'); ?>/images/logo-payment-atm.png" alt="">
                                            </div>
                                            <div class="col-sm-6 ">
                                                <div class="payment-onepay">
                                                <input type="radio" name="payment" id="visa" value="visa" class="css-checkbox" />
                                                <label for="visa" class="css-label"><?php _e('International Credit or Debit Card', 'nisarg'); ?></label>
                                                </div>
                                                <img src="<?php bloginfo('template_directory'); ?>/images/logo-payment-credit.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                <p><?php _e('Please complete the following details exactly as they appear on your card. Do not put spaces or hyphens in the card number.', 'nisarg') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="payment-form">
                            <div class="row">
                                <div class="inner-70 col-sm-12 terms-and-condition">
                                <h3><strong><?php _e('Terms and Conditions', 'nisarg') ?></strong></h3>
                                    <?php if(pll_current_language('locale') =='vi') {   echo get_post_field('post_content', 149);
                                        } else {
                                            echo get_post_field('post_content', 147);
                                        }?>
                                </div>
                                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                                    <input type="checkbox" name="auto-renew" id="auto-renew" class="css-checkbox" value="auto renew" />
                                    <label for="auto-renew" class="css-label"><?php _e('Automatically renew my membership annually.', 'nisarg') ?></label>
                                </div>
                                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                                    <input type="checkbox" name="remind-expire" id="remind-expire" class="css-checkbox" value="Remind Expire" />
                                    <label for="remind-expire" class="css-label"><?php _e('Remind me 1 month in advance next year.', 'nisarg') ?></label>
                                    </label>
                                </div>
                                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                                    <input type="checkbox" name="term-condition" id="term-condition" class="css-checkbox" value="Remind Expire" />
                                    <label for="term-condition" class="css-label"><?php _e('Agree with the payment terms.', 'nisarg') ?></label>
                                    </label>
                                </div>
                                <p class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2"><?php _e('By payment an account you agree to our ', 'nisarg') ?><a href="<?php if(pll_current_language('locale') =='vi') { echo site_url('chinh-sach-bao-mat') ;} else { echo  site_url('privacy-policy'); }?>" target="_blank"><?php _e('Privacy Policy', 'nisarg') ?></a>.</p>
                                <div class="col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2">
                                    <a  href="<?php echo $url; ?>" id="btn-process-transaction" class="btn btn-radius btn-lg-13"><?php _e('process transaction', 'nisarg'); ?></a>
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
        /*$('#orderId').html(SESSION);*/

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
        $('#pm-total-price').html(totalVn + ' vnd');
        $('#btn-process-transaction').click(function(e) {
            if(($("input[name=auto-renew]").is(":checked") || $("input[name=remind-expire]").is(":checked")) && $("input[name=term-condition]").is(":checked")) {
            } else {
                e.preventDefault();
                $('#confirm-checkbox').css('display', 'block');
            }
        });

        $('.payment-onepay input[name=payment]').click(function(e) {
            if(jQuery(this).val() === 'atm') {
                $("#btn-process-transaction").attr("href", '<?php echo $url;?>');
            } else {
                $("#btn-process-transaction").attr("href", '<?php echo $urlQt;?>');
            }

        });

    });
</script>
<?php get_footer(); ?>
