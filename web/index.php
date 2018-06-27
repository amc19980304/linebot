<?php
require_once('./LINEBotTiny.php');
$channelAccessToken = getenv('LINE_CHANNEL_ACCESSTOKEN');
$channelSecret = getenv('LINE_CHANNEL_SECRET');
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                	$m_message = $message['text'];
                	if($m_message=="美味菜單")
                	{
                            $client->replyMessage(array(
                                'replyToken' => $event['replyToken'],
                                'messages' => array(
                                    array(
                                        'type' => 'image',
                                        'originalContentUrl' => 'https://raw.githubusercontent.com/amc19980304/linebot/master/menu1.jpg',
                                        'previewImageUrl' => 'https://raw.githubusercontent.com/amc19980304/linebot/master/menu1.jpg'
                                    )
                                )
                            ));
                	}
                        if($m_message=="近期優惠")
                	{
                            $client->replyMessage(array(
                                'replyToken' => $event['replyToken'],
                                'messages' => array(
                                    array(
                                        'type' => 'text',
                                        'text' => '不好意思,目前還沒有優惠活動呦'
                                    )
                                )
                            ));
                	}
                        if($m_message=="產品寫真")
                	{
                            $number = rand(1,6);
                            $url="https://raw.githubusercontent.com/amc19980304/linebot/master/chicken%20(".$number.").jpg";
                            $client->replyMessage(array(
                                'replyToken' => $event['replyToken'],
                                'messages' => array(
                                    array(
                                        'type' => 'image',
                                        'originalContentUrl' => $url,
                                        'previewImageUrl' => $url
                                    )
                                )
                            ));
                	}
                    break; 
                
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
