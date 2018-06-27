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
                                        'type' => 'sticker',
                                        'packageId' => 2, // 貼圖包 ID
                                        'stickerId' => 38 // 貼圖 ID
                                    ),
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
                        if($m_message=="服務人員介紹")
                	{
                            $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'template', // 訊息類型 (模板)
                                    'altText' => 'Example buttons template', // 替代文字
                                    'template' => array(
                                        'type' => 'carousel', // 類型 (旋轉木馬)
                                        'columns' => array(
                                            array(
                                                'thumbnailImageUrl' => 'https://raw.githubusercontent.com/amc19980304/linebot/master/man.jpg', // 圖片網址 <不一定需要>
                                                'title' => '小麥', // 標題 1 <不一定需要>
                                                'text' => '炸台工作人員', // 文字 1
                                                'actions' => array(
                                                    array(
                                                        'type' => 'uri', // 類型 (連結)
                                                        'label' => 'FB', // 標籤 3
                                                        'uri' => 'https://www.facebook.com/amc19980304' // 連結網址
                                                    )
                                                )
                                            ),
                                            array(
                                                'thumbnailImageUrl' => 'https://raw.githubusercontent.com/amc19980304/linebot/master/woman.jpg', // 圖片網址 <不一定需要>
                                                'title' => '美麗人妻', // 標題 2 <不一定需要>
                                                'text' => '前台服務人員', // 文字 2
                                                'actions' => array(
                                                    array(
                                                        'type' => 'uri', // 類型 (連結)
                                                        'label' => 'FB', // 標籤 3
                                                        'uri' => 'https://www.facebook.com/amc19980304' // 連結網址
                                                    )
                                                )
                                            ),
                                            array(
                                                'thumbnailImageUrl' => 'https://raw.githubusercontent.com/amc19980304/linebot/master/oldwoman.jpg', // 圖片網址 <不一定需要>
                                                'title' => '美魔女阿婆', // 標題 2 <不一定需要>
                                                'text' => '備料工作人員', // 文字 2
                                                'actions' => array(
                                                    array(
                                                        'type' => 'uri', // 類型 (連結)
                                                        'label' => 'FB', // 標籤 3
                                                        'uri' => 'https://www.facebook.com/amc19980304' // 連結網址
                                                    )
                                                )
                                            )
                                        )
                                    )
                                )
                            )
                        ));
                    }
                    break; 
                case 'sticker':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'sticker',
                                'packageId' => 2, // 貼圖包 ID
                                'stickerId' => 36 // 貼圖 ID
                            )
                        )
                    ));
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
