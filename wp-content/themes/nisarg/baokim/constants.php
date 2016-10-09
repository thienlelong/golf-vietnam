<?php
//CẤU HÌNH TÀI KHOẢN (Configure account)
define('EMAIL_BUSINESS','jamiewestenburg@hotmail.com');//Email Bảo kim
define('MERCHANT_ID','24765');                // Mã website tích hợp
define('SECURE_PASS','1ce1424dee734aac');   // Mật khẩu

// Cấu hình tài khoản tích hợp
define('API_USER','jamiewestenburg');  //API USER
define('API_PWD','PN8Vc5LiZqIBQESnU3XgM7tWewC6D');       //API PASSWORD
define('PRIVATE_KEY_BAOKIM','-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCh/CV9hlBM+g+9
xepGELZA1j15b2+hhsTcz4qpCuxVcGVSDK6SQg0TsZoOnrEQJy4BsXeHJhrBaf+L
g2OSNr1eRHuU7vt6MPdncIMvAzjnC2WF9jWJbINe6q3JINJI/Plv3IAe0b181SmS
340vSNgD3Nz93ZHwJCpXOS0tgnbc6aLH0Ine3YIEVYrisLKWlP/EqBVxypZoDfoU
WviuY3do0/ovawQi+9kdqYf2La5RMx30G4TQ800DCcM1EQ51eYcyOywBxyskUtDy
Gk4zTXjC7E0RnT2Cg4l/UjK/ceAQF5zkma2uXwM7534aLzps4CIcFf5cKa0mpyYb
q2AHR0pxAgMBAAECggEAL+kcTZxEdAAiV8cKG98liNfVJu3G3se1wnnAUW9hp4Ou
9C28FJZkt8Z4Aor9ZAGyod2TtO2YTEzFwMYD1WNLb25h/xMQXnvNMVMd+fHCCtRc
GttPym3GDXTsIekLSXtJa8SUQIlYumtx+HcWkz3AZqQU2SGH4LdRrqrCqgtEjOI1
PsLhFUAWVR41Imwm/20/TOx31k4naqOD72vWOGYgOtiY7dvmddFl6LsZf2Ayeo9f
oqPOsKmPAxd1TtH2HX+9pV3wlq7rixXYVr106+2WnmRSY7EW9oxWMgRUM98Uf2jx
Gs3psc2mVLau5TPF9uM/EwFSNCewuzSQX9BlKrrMgQKBgQDPxwPCPI6dINSfhjkc
IoF9zJpKvIgeUS3GquJ99P2+xxU4EEH9lc0tB0qLc7jlcMgnYP+vMX3h5LTv8jl3
lZvdGM0n1a5krLANHQeweeEGE6ekZUfMuGKgHhD2D8lElYJCM9ImcqSTnwQanley
8/308sohUWdG2FjokZZTH6bYZQKBgQDHlGWp1nxiOz4Cs9N88YmKSXakvdga/2HA
a+dXfEWYE9c4Xn0sxo3sTAevxaE9loqGV+Wdx0l4eaMBCDa384u9rv0ZWQGbi5YK
j16+kICYI6kFHtEgZDwAijceJkPO881zJyABy75X6kQ5zgFum7u+xpwyjLBft5Ko
MTeIlaO7HQKBgQCzy6xl/U8PiyRSsqxiuz1ApbdyKrjDO04YVzFM+55D4zRqYi8o
h+OXLnMEP2xlJvYclWRLrtEWk3k7FWlDIPRSG68T5GVXetORVWic/qqJPqLXsEi0
T24QzlOxCbIJpjKkpQEaAiSGFZlQi2qqUVaWCy58LFvpQzeUcL8bSQ1wvQKBgDpN
XpmLv9BOcCIH+EsyoDRWm6MqllvkqOC2ZOGIuyfe++tKpxSSeFlEKKavfBfqx1LR
kJFT62GXXwfpJ1r7eaIS4XsrJi4TS+SP12Sh//7xw+lsBDmLLoAV4F4dXYeybx0p
m88KfvNdy0p7pK10LxdfG7gko02C6gPaRNfQpwD9AoGBAKPsrFoMsYzH6xL722LL
IknMAzIptQhPgCpUV+MAgpBbJpHT0RBS+/8RnppXjOmUf9jgGc66e7M/U71Y6Bec
AztRCNAzZMw0LLShSuDrYeBC0BWvglJIIKbmpUjV9Tsk9qGe3xXI/Z/9OiuxSu36
BpHJPF8a0uub5zWr8ZTpsJEF
-----END PRIVATE KEY-----');

define('BAOKIM_API_SELLER_INFO','/payment/rest/payment_pro_api/get_seller_info');
define('BAOKIM_API_PAY_BY_CARD','/payment/rest/payment_pro_api/pay_by_card');
define('BAOKIM_API_PAYMENT','/payment/order/version11');

define('BAOKIM_URL','https://www.baokim.vn');
//define('BAOKIM_URL','http://kiemthu.baokim.vn');

//Phương thức thanh toán bằng thẻ nội địa
define('PAYMENT_METHOD_TYPE_LOCAL_CARD', 1);
//Phương thức thanh toán bằng thẻ tín dụng quốc tế
define('PAYMENT_METHOD_TYPE_CREDIT_CARD', 2);
//Dịch vụ chuyển khoản online của các ngân hàng
define('PAYMENT_METHOD_TYPE_INTERNET_BANKING', 3);
//Dịch vụ chuyển khoản ATM
define('PAYMENT_METHOD_TYPE_ATM_TRANSFER', 4);
//Dịch vụ chuyển khoản truyền thống giữa các ngân hàng
define('PAYMENT_METHOD_TYPE_BANK_TRANSFER', 5);

?>