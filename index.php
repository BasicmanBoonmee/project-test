<?php
	require_once __DIR__ . '/vendor/autoload.php';

    /*$access_token = 'qHrTqVT/bSCXzWZxEoJKN3M/L3AFcc22bG/Nksp3GpJNJCqWJi8p8Z2XMmrgjoFEb97JF7R5kSAAprv7K4KGPyIRnsT/hJPdIvyBcOMHN6mw2fHr/45UCWB/HiR72oJst79wfFnoU9bg7nb+kSaGagdB04t89/1O/w1cDnyilFU=';

    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);

    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'be68d4c33c85989848aca09ea9acb875']);

    $content = file_get_contents('php://input');

    $events = json_decode($content, true);

    if (!is_null($events['events'])) {
        foreach ($events['events'] as $event) {
            if(strpos($event['message']['text'],"ทดสอบ") !== false){
                $text = "ทดสอบอะไรวะ";
            }elseif(strpos($event['message']['text'],"งง") !== false){
                $text = "งงด้วย";
            }elseif(strpos($event['message']['text'],"test") !== false){
                $text = "test อะไร ว้า";
            }else{
                $text = "ไม่มีอะไร";
            }
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text);
            $bot->replyMessage($event['replyToken'], $textMessageBuilder);
        }
    }*/

    $auth = base64_encode("mark walker");

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

    echo "Result3 : ".$result;

?>