<?php
//buyer account fund: 999970.00 USD
$curl = curl_init();

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
    'USER' => 'BUSSINESS ID',
    'PWD' => 'BUSSINESS PASSWPRD',
    'SIGNATURE' => 'BUSSINESS SIGNATURE',
    'METHOD' => 'SetExpressCheckout',
    'VERSION' => '86',
    'L_BILLINGTYPE0' => 'RecurringPayments',
    'L_BILLINGAGREEMENTDESCRIPTION0' => 'FitnessMembership',
    'cancelUrl' => 'http://localhost/paypal/cancel.php',
    'returnUrl' => 'http://localhost/paypal/success.php'
)));
 
$response =    curl_exec($curl);
 
curl_close($curl);

$response_info = array();

parse_str($response, $response_info);
 // echo "<pre>";print_r($response_info);echo"</pre>";

$token=$response_info['TOKEN'];
// echo $token;
 $url="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=$token";
header("Location:$url");
