<?php
/*
 * Template Name: Payment Successfull
 **/
 get_header();
?>
<?php
if($_GET["orderId"] && $_SESSION["usersId"]) {
    $orderId =  $_GET['orderId'];
    $userIDs = $pieces = explode(",", $_SESSION["usersId"]);
    $ehandicap  = new ehandicap();
    for ($i=0; $i < count($userIDs); $i++) {
        update_user_meta( $userIDs[$i], 'orderId', $orderId);
        update_user_meta( $userIDs[$i], 'is_payment', true);
        $member = new eHandicapMember();
        $user_info = get_userdata($userIDs[$i]);
        $member->lastname = $user_info->first_name;
        $member->firstname = $user_info->last_name;
        $member->MID = get_the_author_meta( 'MID', $userIDs[$i] );
        $member->gender = get_the_author_meta( 'gender', $userIDs[$i] );
        $member->email = $user_info->user_email;
        $member->pass = get_the_author_meta( 'passbackup', $userIDs[$i] );
        $result = $ehandicap->RegisterNewMember($member);
        if (strpos($result, 'OK') !== false) {
            update_user_meta( $userIDs[$i], 'is_active', true);
        }
    }
    unset($_SESSION['usersId']);
}
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
                        <div class="page-payment-success text-center">
                            <img src="<?php bloginfo('template_directory'); ?>/images/icon-payment-uccessful.png" alt="">
                            <h1 class=""><?php _e('Your Order Has Been Processed!', 'nisarg') ?></h1>
                            <h3><?php _e('Thank you for payment with us online!', 'nisarg') ?> </h3>
                            <a href="<?php echo get_home_url(); ?>" class="btn btn-radius btn-lg-13"><?php _e('Back to home', 'nisarg') ?> </a>
                        </div>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->
            <?php endwhile; // End of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!--.container-->
<script type="text/javascript">
    jQuery( document ).ready(function($) {
        $('#number-user').val('2');
        $('#price').html('$49.95');
        $('#total-price').html('$72.45');
        $('#pm-total-price').html('$72.45 (CAD)');

        $('#easy_paypal_form_div form').attr('target', '');
        $('#easy_paypal_form_div form input[name=amount]').val("72.45");
        $('#easy_paypal_form_div form input[name=return]').val('http://golfvn.com/golf-vietnam/en/payment-success?uid=1');
        $('#btn-process-transaction').click(function() {
            console.log("haha");
            $('#easy_paypal_form_div input[type=image]').trigger('click');
        });
    });
</script>
<?php get_footer(); ?>
