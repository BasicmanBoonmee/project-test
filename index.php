<?php
	require_once __DIR__ . '/vendor/autoload.php';

    use Omnipay\Omnipay;

    echo "TEST 1<br />";

    $omnipay = Omnipay::create('Vantiv');

    echo "TEST 2<br />";

    $parameter = array();

    echo "Name : ".$omnipay->authorize($parameter)."<br />";

    //$omnipay = new \Omnipay\JudoPay\Gateway();



    //$omnipay->preAuthorization($parameter);

    echo "TEST 3<br />";



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
    }

    $settings = array();

    $settings['apiVersion'] = '5.2.0';
    $settings['logger'] = new \Psr\Log\NullLogger();
    $settings['userAgent'] = 'Judopay PHP v'.phpversion().' SDK v2.1.0';
    $settings['httpLogFormat'] = "\"{method} {resource} {protocol}/{version}\" ".
        "{code} Content-Length: {res_header_Content-Length}\n| Response: {response}";

    $request = new \Guzzle\Http\Message\Request($settings);
    $client = new \Guzzle\Http\Client();

    $client->setDefaultOption(
        'headers',
        array(
            'API-Version'  => '5.2',
            'Accept'       => 'application/json; charset=utf-8',
            'Content-Type' => 'application/json',
        )
    );

    $client->setSslVerification(__DIR__ .'/../../cert/digicert_sha256_ca.pem');

    $client->setUserAgent('Judopay PHP v'.phpversion().' SDK v2.1.0');

    $client->post('https://gw1.judopay-sandbox.com/transactions/payments',
        [
            'yourConsumerReference' => '12345',
            'yourPaymentReference' => '12345',
            'cardNumber' => '4976000000003436',
            'expiryDate' => '12/22',
            'cv2' => '452',
            'amount' => 1.01,
            'currency' => 'GBP',
            'judoId' => '100826-205'
        ]
    );

    $request->setClient($client);

    $request->setHeader('Authorization', 'Basic ' . base64_encode('9fCa1W7LsrdasToh:crWqj6cUJIbio6odXB9ZlL5QYAXu7k9N'));

    $request->setAuth('jwmXGbpb87xvDM4B','601dc0a93d2752f5041bdb9a53dc1bf0b4e8ef0f1b03f737416fcf3be1a20b7d');*/



    /*$auth = base64_encode("9fCa1W7LsrdasToh:crWqj6cUJIbio6odXB9ZlL5QYAXu7k9N");

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

    //echo $fields_string."<br />";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_CAINFO, 'cacert.pem');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_USERPWD, 'jwmXGbpb87xvDM4B:601dc0a93d2752f5041bdb9a53dc1bf0b4e8ef0f1b03f737416fcf3be1a20b7d');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'API-Version: 5.2',
            'Content-Type: application/json',
            'Accept: application/json; charset=utf-8',
            'Authorization: Basic '.$auth)
    );

    $result = curl_exec($ch);

    if ($result === false)
    {
        echo "Curl error: ".curl_error($result);
    }else{
        echo "Result20 : ".$result;
    }*/

?>