<?php
 //Version 2.0

// *********************
// START OF MAIN PROGRAM
// *********************

// Define Constants
// ----------------
// This is secret for encoding the MD5 hash
// This secret will vary from merchant to merchant
// To not create a secure hash, let SECURE_SECRET be an empty string - ""
// $SECURE_SECRET = "secure-hash-secret";
class OnePayPaymentQt {
    public function createRequestUrl($data) {

        $SECURE_SECRET = "B6D9923D8E93A946F05EF3A5328097D6";
        $vpcURL = "https://onepay.vn/vpcpay/vpcpay.op?";
        $data["vpc_AccessCode"] = '54AC9948';
        $data["vpc_Merchant"] = 'GOLFVIETNAM';
        $data["vpc_MerchTxnRef"] = 'QT'.time();
        // add the start of the vpcURL querystring parameters
        /*$vpcURL = $data["virtualPaymentClientURL"] . "?";*/

        // Remove the Virtual Payment Client URL from the parameter hash as we
        // do not want to send these fields to the Virtual Payment Client.
        /*unset($data["virtualPaymentClientURL"]);*/

        // The URL link for the receipt to do another transaction.
        // Note: This is ONLY used for this example and is not required for
        // production code. You would hard code your own URL into your application.

        // Get and URL Encode the AgainLink. Add the AgainLink to the array
        // Shows how a user field (such as application SessionIDs) could be added
        //$data['AgainLink']=urlencode($_SERVER['HTTP_REFERER']);
        //$data['AgainLink']=urlencode($_SERVER['HTTP_REFERER']);
        // Create the request to the Virtual Payment Client which is a URL encoded GET
        // request. Since we are looping through all the data we may as well sort it in
        // case we want to create a secure hash and add it to the VPC data if the
        // merchant secret has been provided.
        //$md5HashData = $SECURE_SECRET; Khởi tạo chuỗi dữ liệu mã hóa trống
        $md5HashData = "";

        ksort ($data);

        // set a parameter to show the first pair in the URL
        $appendAmp = 0;

        foreach($data as $key => $value) {

            // create the md5 input and URL leaving out any fields that have no value
            if (strlen($value) > 0) {

                // this ensures the first paramter of the URL is preceded by the '?' char
                if ($appendAmp == 0) {
                    $vpcURL .= urlencode($key) . '=' . urlencode($value);
                    $appendAmp = 1;
                } else {
                    $vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
                }
                //$md5HashData .= $value; sử dụng cả tên và giá trị tham số để mã hóa
                if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
        		    $md5HashData .= $key . "=" . $value . "&";
        		}
            }
        }
        //xóa ký tự & ở thừa ở cuối chuỗi dữ liệu mã hóa
        $md5HashData = rtrim($md5HashData, "&");
        // Create the secure hash and append it to the Virtual Payment Client Data if
        // the merchant secret has been provided.
        if (strlen($SECURE_SECRET) > 0) {
            //$vpcURL .= "&vpc_SecureHash=" . strtoupper(md5($md5HashData));
            // Thay hàm mã hóa dữ liệu
            $vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$SECURE_SECRET)));
        }
        return $vpcURL;
    }

    function getResponseDescription($responseCode) {

        switch ($responseCode) {
            case "0" :
                $result = "Transaction Successful";
                break;
            case "?" :
                $result = "Transaction status is unknown";
                break;
            case "1" :
                $result = "Bank system reject";
                break;
            case "2" :
                $result = "Bank Declined Transaction";
                break;
            case "3" :
                $result = "No Reply from Bank";
                break;
            case "4" :
                $result = "Expired Card";
                break;
            case "5" :
                $result = "Insufficient funds";
                break;
            case "6" :
                $result = "Error Communicating with Bank";
                break;
            case "7" :
                $result = "Payment Server System Error";
                break;
            case "8" :
                $result = "Transaction Type Not Supported";
                break;
            case "9" :
                $result = "Bank declined transaction (Do not contact Bank)";
                break;
            case "A" :
                $result = "Transaction Aborted";
                break;
            case "C" :
                $result = "Transaction Cancelled";
                break;
            case "D" :
                $result = "Deferred transaction has been received and is awaiting processing";
                break;
            case "F" :
                $result = "3D Secure Authentication failed";
                break;
            case "I" :
                $result = "Card Security Code verification failed";
                break;
            case "L" :
                $result = "Shopping Transaction Locked (Please try the transaction again later)";
                break;
            case "N" :
                $result = "Cardholder is not enrolled in Authentication scheme";
                break;
            case "P" :
                $result = "Transaction has been received by the Payment Adaptor and is being processed";
                break;
            case "R" :
                $result = "Transaction was not processed - Reached limit of retry attempts allowed";
                break;
            case "S" :
                $result = "Duplicate SessionID (OrderInfo)";
                break;
            case "T" :
                $result = "Address Verification Failed";
                break;
            case "U" :
                $result = "Card Security Code Failed";
                break;
            case "V" :
                $result = "Address Verification and Card Security Code Failed";
                break;
            case "99" :
                $result = "User Cancel";
                break;
            default  :
                $result = "Unable to be determined";
        }
        return $result;
    }
}

// FINISH TRANSACTION - Redirect the customers using the Digital Order
// ===================================================================
/*header("Location: ".$vpcURL);*/

// *******************
// END OF MAIN PROGRAM
// *******************

