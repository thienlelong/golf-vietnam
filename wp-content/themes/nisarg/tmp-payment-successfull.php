<?php
/*
 * Template Name: Payment Successfull
 **/
 get_header();
?>
<?php
include(TEMPLATEPATH.'/onepay/onepay-payment.php');
include(TEMPLATEPATH.'/onepay-quocte/onepay-payment-qt.php');
require_once(ABSPATH.'wp-admin/includes/user.php' );
function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

$onePayPayment = new OnePayPayment();

if (strpos($_GET ["vpc_MerchTxnRef"], 'VN') !== false) {
    $SECURE_SECRET = "DA88C2C62BDAAC2F65B65D1933FF822B";
    $vpc_Txn_Secure_Hash = $_GET ["vpc_SecureHash"];
    unset ( $_GET ["vpc_SecureHash"] );
    $errorExists = false;

    ksort ($_GET);

    if (strlen ( $SECURE_SECRET ) > 0 && $_GET ["vpc_TxnResponseCode"] != "7" && $_GET ["vpc_TxnResponseCode"] != "No Value Returned") {
        $stringHashData = "";
        foreach ( $_GET as $key => $value ) {
            if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
                $stringHashData .= $key . "=" . $value . "&";
            }
        }
        $stringHashData = rtrim($stringHashData, "&");
        if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper(hash_hmac('SHA256', $stringHashData, pack('H*',$SECURE_SECRET)))) {
            $hashValidated = "CORRECT";
        } else {
            $hashValidated = "INVALID HASH";
        }
    } else {
        $hashValidated = "INVALID HASH";
    }
} else {
    $SECURE_SECRET = "B6D9923D8E93A946F05EF3A5328097D6";
    $vpc_Txn_Secure_Hash = $_GET["vpc_SecureHash"];
    $vpc_MerchTxnRef = $_GET["vpc_MerchTxnRef"];
    $vpc_AcqResponseCode = $_GET["vpc_AcqResponseCode"];
    unset($_GET["vpc_SecureHash"]);
    $errorExists = false;

    if (strlen($SECURE_SECRET) > 0 && $_GET["vpc_TxnResponseCode"] != "7" && $_GET["vpc_TxnResponseCode"] != "No Value Returned") {

        ksort($_GET);
        $md5HashData = "";
        foreach ($_GET as $key => $value) {
            if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
                $md5HashData .= $key . "=" . $value . "&";
            }
        }
        $md5HashData = rtrim($md5HashData, "&");
        if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$SECURE_SECRET)))) {
            $hashValidated = "CORRECT";
        } else {
            $hashValidated = "INVALID HASH";
        }
    } else {
        $hashValidated = "INVALID HASH";
    }
    $onePayPayment = new OnePayPaymentQt();
}

$url_params = array(
    'vpc_TxnResponseCode' =>  strval($_GET["vpc_TxnResponseCode"]),
    'vpc_SecureHash'      =>  strval($_GET["vpc_SecureHash"]),
    'vpc_OrderInfo'       =>  strval($_GET["vpc_OrderInfo"]),
);

if($url_params['vpc_SecureHash'] && $_SESSION["usersId"]
    && $url_params['vpc_TxnResponseCode'] == "0"
    && ($url_params["vpc_OrderInfo"] == $_SESSION["SESSION"])
    && $hashValidated == "CORRECT") {
    $orderId =  $url_params['transaction_id'];
    $userIDs = explode(",", $_SESSION["usersId"]);
    $ehandicap  = new ehandicap();
    $start_date =  date('Y/m/d');
    $expire_date = date("Y/m/d", strtotime(date("Y/m/d", strtotime($start_date)) . " + 365 day"));
    for ($i=0; $i < count($userIDs); $i++) {
        if($_SESSION["lost_card"]) {
            update_user_meta( $userIDs[$i], 'is_lost_card', true);
            update_user_meta( $userIDs[$i], 'is_status', false);
        } else {

            update_user_meta( $userIDs[$i], 'orderId', $orderId);
            update_user_meta( $userIDs[$i], 'is_payment', true);
            update_user_meta( $userIDs[$i], 'expire_date', $expire_date);
            $member = new eHandicapMember();
            $user_info = get_user_by('id', $userIDs[$i]);
            $recepients = $user_info->user_email;
            $subject = 'Membership Application for '.$user_info->first_name.' '.$user_info->last_name;
            $headers = "From: Vietcap.com.vn <golfvn@gmail.com>\r\n";
            $headers .= "Reply-To: golfvn@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <title></title>
                        </head>
                        <body>
                            <div>
                                <h4>
                                    Thank you for applying for membership with Vietcap.com.vn. The details of your membership follow:
                                </h4>
                                <p>Name: '.$user_info->first_name.' '.$user_info->last_name.'</p>
                                <p>Email: </p>
                                <p>The following membership number was assigned to you: </p>
                                <p>Member  ID Number: '.get_the_author_meta( 'MID', $userIDs[$i] ).'</p>
                                <p>Thanks!</p>
                                <p>VietCap Team</p>
                            </div>
                        </body>
                        </html>';
            if($_SESSION['is_renew']) {
                $subject = $user_info->first_name.' ,Thank you for renewing your membership with Vietcap.com.vn';
                $message = '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <title></title>
                        </head>
                        <body>
                            <div>
                                <h4>
                                    Thank you for renewing membership with Vietcap.com.vn. We appreciate your membership and look forward to seeing you at upcoming membership events!
                                </h4>
                                <p>Here are the some important details about your membership: </p>
                                <p>Name: '.$user_info->first_name.' '.$user_info->last_name.'</p>
                                <p>Email: </p>
                                <p>The following membership number was assigned to you: </p>
                                <p>Member  ID Number: '.get_the_author_meta( 'MID', $userIDs[$i] ).'</p>
                                <p>Keep this number handy because you\'ll need it when you register for events on our website and to access other members-only benefits. </p>
                                <p>Thanks!</p>
                                <p>VietCap Team</p>
                            </div>
                        </body>
                        </html>';
            }
            mail($recepients, $subject, $message, $headers);

            $member->lastname = $user_info->first_name;
            $member->firstname = $user_info->last_name;
            $member->CID = get_the_author_meta( 'CID', $userIDs[$i] );
            $member->MID = get_the_author_meta( 'MID', $userIDs[$i] );
            $member->gender = get_the_author_meta( 'gender', $userIDs[$i] );
            $member->email = $user_info->user_email;
            $member->pass = get_the_author_meta( 'passbackup', $userIDs[$i] );

            $result = $ehandicap->RegisterNewMember($member);
            if (strpos($result, 'OK') !== false) {
                update_user_meta( $userIDs[$i], 'is_active', true);
            }
        }

    }
    unset($_SESSION['usersId']);
    unset($_SESSION["SESSION"]);
    unset($_SESSION["is_renew"]);
    unset($_SESSION["lost_card"]);
} else {
    $userIDs = explode(",", $_SESSION["usersId"]);
    for ($i=0; $i < count($userIDs); $i++) {
        if (!$_SESSION["lost_card"]) {
            $meta_keys = array("first_name","last_name","middle_name", "golf_club", "district", "province", "city", "langguage", "gender","avatar", "start_date", "expire_date", "is_active", "MID", 'passbackup', 'address', 'date_of_birth', 'user_phone', 'is_status', 'CID');
            delete_user($userIDs[$i], $meta_keys);
        }
    }
}

?>
<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-4">
                        <?php
                            if($url_params['vpc_TxnResponseCode'] == '0' && $hashValidated = "CORRECT") {
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            } else {
                                echo '<h1 class="entry-title">Payment Failured</h1>';
                            }?></div>
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
                            <h2 class="<?php if($url_params['vpc_TxnResponseCode'] == '0') {echo 'cl-green';} else { echo 'cl-red';}?>"><?php _e($onePayPayment->getResponseDescription($url_params['vpc_TxnResponseCode']), 'nisarg');?></h2>
                            <h3><?php _e('Thank you for payment with us online!', 'nisarg') ?> </h3>
                            <a href="<?php echo get_home_url(); ?>" class="btn btn-radius btn-lg-13"><?php _e('Back to home', 'nisarg') ?> </a>
                        </div>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->
            <?php endwhile; // End of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!--.container-->
<?php get_footer(); ?>
