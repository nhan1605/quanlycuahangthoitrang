<?php
header('Content-type: text/html; charset=utf-8');

$config = file_get_contents('./php-master/basic.example/config.json');
$array = json_decode($config, true);

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

$endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";

$partnerCode = $array["partnerCode"];
$accessKey = $array["accessKey"];
$secretKey = $array["secretKey"];
$orderInfo = "Thanh toán MOMO-QR";//thong tin hoa dơn
$amount = "10000";// tong tien
$orderId = time() ."";
$returnUrl = "http://localhost:8000/paymomo/result.php";
$notifyurl = "http://localhost:8000/paymomo/ipn_momo.php";
// Lưu ý: link notifyUrl không phải là dạng localhost
$extraData = "";

    $requestId = time() . "";
    $requestType = "captureMoMoWallet";
    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array('partnerCode' => $partnerCode,
        'accessKey' => $accessKey,
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'returnUrl' => $returnUrl,
        'notifyUrl' => $notifyurl,
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest ($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);
   
?>