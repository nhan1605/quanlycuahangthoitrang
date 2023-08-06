<?php
header('Content-type: text/html; charset=utf-8');

$config = file_get_contents('./php-master/basic.example/config.json');
$array = json_decode($config, true);

include ('./php-master/basic.example/common/helper.php');

$endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";


// $partnerCode = $array["partnerCode"];
// $accessKey = $array["accessKey"];
// $secretKey = $array["secretKey"];
 
$partnerCode= "MOMOBKUN20180529";
$accessKey= "klm05TvNBzhg7h7j";
$secretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";

$orderInfo = "Thanh toán qua MoMo_ATM";
$amount = "10000";
$orderId = time() ."";
$returnUrl = "./index.php";
$notifyurl = "./index.php";
// Lưu ý: link notifyUrl không phải là dạng localhost
$bankCode = "SML";


    // $partnerCode = $_POST["partnerCode"];
    //      $accessKey = $_POST["accessKey"];
    //      $serectkey = $_POST["secretKey"];
    //      $orderid = time()."";
    //      $orderInfo = $_POST["orderInfo"];
    //      $amount = $_POST["amount"];
    //      $bankCode = $_POST['bankCode'];
    //      $returnUrl = $_POST['returnUrl'];
         $requestId = time()."";
         $requestType = "payWithMoMoATM";
         $extraData = "";
         
         
         //before sign HMAC SHA256 signature
        //  $rawHashArr =  array(
        //                 'partnerCode' => $partnerCode,
        //                 'accessKey' => $accessKey,
        //                 'requestId' => $requestId,
        //                 'amount' => $amount,
        //                 'orderId' => $orderid,
        //                 'orderInfo' => $orderInfo,
        //                 'bankCode' => $bankCode,
        //                 'returnUrl' => $returnUrl,
        //                 'notifyUrl' => $notifyurl,
        //                 'extraData' => $extraData,
        //                 'requestType' => $requestType
        //                 );
         // echo $serectkey;die;
         $rawHash = "partnerCode=".$partnerCode."&accessKey=".$accessKey."&requestId=".$requestId."&bankCode=".$bankCode."&amount=".$amount."&orderId=".$orderId."&orderInfo=".$orderInfo."&returnUrl=".$returnUrl."&notifyUrl=".$notifyurl."&extraData=".$extraData."&requestType=".$requestType;
         $signature = hash_hmac("sha256", $rawHash, $secretKey);

         $data =  array('partnerCode' => $partnerCode,
                        'accessKey' => $accessKey,
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'returnUrl' => $returnUrl,
                        'bankCode' => $bankCode,
                        'notifyUrl' => $notifyurl,
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature);
         $result = execPostRequest($endpoint, json_encode($data));
         $jsonResult = json_decode($result,true);  // decode json
         
         error_log( print_r( $jsonResult, true ) );
         header('Location: '.$jsonResult['payUrl']);

?>