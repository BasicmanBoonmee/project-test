<?php
	require_once __DIR__ . '/vendor/autoload.php';

    /*$judopay = new \Judopay(
        array(
            'apiToken' => 'jwmXGbpb87xvDM4B',
            'apiSecret' => '601dc0a93d2752f5041bdb9a53dc1bf0b4e8ef0f1b03f737416fcf3be1a20b7d',
            'judoId' => '100826-205',
            'useProduction' => false
        )
    );

    $payment = $judopay->getModel('Payment');
    $payment->setAttributeValues(
        array(
            'judoId' => '100826-205',
            'yourConsumerReference' => '12345',
            'yourPaymentReference' => '12345',
            'amount' => 1.01,
            'currency' => 'GBP',
            'cardNumber' => '4976000000003436',
            'expiryDate' => '02/22',
            'cv2' => 452
        )
    );

    try {
        $response = $payment->create();
        if ($response['result'] === 'Success') {
            echo 'Payment succesful';
        } else {
            echo 'There were some problems while processing your payment';
        }
    } catch (\Judopay\Exception\ValidationError $e) {
        echo $e->getSummary();
    } catch (\Judopay\Exception\ApiException $e) {
        echo $e->getSummary();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }*/


    $auth = base64_encode("jwmXGbpb87xvDM4B:601dc0a93d2752f5041bdb9a53dc1bf0b4e8ef0f1b03f737416fcf3be1a20b7d");

    $url = 'https://gw1.judopay-sandbox.com/transactions/payments';
    $fields = array(
        'yourConsumerReference' => '12345',
        'yourPaymentReference' => '12345',
        'cardNumber' => '4976000000003436',
        'expiryDate' => '12/22',
        'cv2' => '452',
        'amount' => 1.01,
        'currency' => 'GBP',
        'judoId' => '100826-205'
    );

    //url-ify the data for the POST
    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'API-Version: 5.2.0',
            'Accept: application/json; charset=utf-8',
            'Content-Type: application/json',
            'Authorization: Basic {'.$auth.'}')
    );

    $result = curl_exec($ch);

    echo "Result7 : ".$result;

?>