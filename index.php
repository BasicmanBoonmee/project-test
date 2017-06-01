<?php
	require_once __DIR__ . '/vendor/autoload.php';
	
	echo "TEST";

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

?>