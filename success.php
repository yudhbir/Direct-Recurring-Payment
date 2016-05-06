<?php
 // echo "<pre>";print_r($_REQUEST);echo"</pre>";
$token=$_REQUEST['token'];
//get token id for users

 $curl = curl_init();

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
    'USER' => 'BUSSINESS ID',
    'PWD' => 'BUSSINESS PASSWPRD',
    'SIGNATURE' => 'BUSSINESS SIGNATURE',
    'METHOD' => 'GetExpressCheckoutDetails',
    'VERSION' => '86',
    'TOKEN' => $token,
)));
 
$response1 =    curl_exec($curl);
 
curl_close($curl);

$response_info1 = array();

parse_str($response1, $response_info1);
 // echo "<pre>";print_r($response_info1);echo"</pre>";
$payer_id=$response_info1['PAYERID'];
// $token=$response_info1['TOKEN'];


//createing the payments


 $curl = curl_init();
 //8802.70 USD
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
    'USER' => 'BUSSINESS ID',
    'PWD' => 'BUSSINESS PASSWPRD',
    'SIGNATURE' => 'BUSSINESS SIGNATURE',
    'METHOD' => 'CreateRecurringPaymentsProfile',
    'VERSION' => '86',
    'TOKEN' => $token,
    'PAYERID' => $payer_id,
	'PROFILESTARTDATE' => '2016-05-06T16:00:00Z',
    'BILLINGPERIOD' => 'Day',
    'DESC' => 'FitnessMembership',
    'BILLINGFREQUENCY' => '1',
    'AMT' => 50,
    'COUNTRYCODE' => 'US',
    'CURRENCYCODE' => 'USD',
    'MAXFAILEDPAYMENTS' => '3',

)));
 
$response2 =    curl_exec($curl);
 
curl_close($curl);
 
$nvp = array();
$response_info2 = array();

parse_str($response2, $response_info2);
 echo "<pre>";print_r($response_info2);echo"</pre>"; 
