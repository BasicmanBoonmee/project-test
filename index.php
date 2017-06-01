<?php
	require_once __DIR__ . '/vendor/autoload.php';

    $judopay = new Judopay(
        array(
            'apiToken' => 'jwmXGbpb87xvDM4B',
            'apiSecret' => '601dc0a93d2752f5041bdb9a53dc1bf0b4e8ef0f1b03f737416fcf3be1a20b7d',
            'judoId' => '100826-205',
            'useProduction' => false
        )
    );

    echo "TEST";

    /*$registerCard = $judopay->getModel('RegisterCard');
    $registerCard->setAttributeValues(
        array(
            'judoId' => '100826-205',
            'yourConsumerReference' => '12345',
            'yourPaymentReference' => '12345',
            'amount' => 1.01,
            'currency' => 'GBP',
            'cardNumber' => '4976000000003436',
            'expiryDate' => '12/15',
            'cv2' => 452
        )
    );

    $response = $registerCard->create();
    if ($response['result'] === 'Success') {
        echo 'Card registered successfully';
    } else {
        echo 'There were some problems while processing your request';
    }*/

    /*$auth = base64_encode("mark walker");

    $url = 'https://gw1.judopay-sandbox.com/transactions/registercard';
    $fields = array(
        'yourConsumerReference' => '5678849',
        'yourPaymentReference' => '9908865755',
        'cardNumber' => '4976000000003436',
        'expiryDate' => '12/20',
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
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'API-Version: 5.2.0',
            'Token: jwmXGbpb87xvDM4B',
            'Accept: application/json',
            'Content-Type: application/json')
    );

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    echo "Result3 : ".$result;*/

?>