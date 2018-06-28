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
                        else if($m_message=="近期優惠")
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
                        else if($m_message=="來一張產品寫真")
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
                        else if($m_message=="服務人員介紹")
                	{
                            $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'template', // 訊息類型 (模板)
                                    'altText' => '服務人員介紹', // 替代文字
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
                    else if($m_message=="店家資訊"){
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'template', // 訊息類型 (模板)
                                    'altText' => '店家資訊唷', // 替代文字
                                    'template' => array(
                                        'type' => 'buttons', // 類型 (按鈕)
                                        'thumbnailImageUrl' => 'https://raw.githubusercontent.com/amc19980304/linebot/master/store.jpg', // 圖片網址 <不一定需要>
                                        'title' => '加加鹹酥雞', // 標題 <不一定需要>
                                        'text' => '地址:屏東縣長治鄉長興路9號-------加盟電話:0987251920', // 文字
                                        'actions' => array(
                                            array(
                                                'type' => 'uri', // 類型 (連結)
                                                'label' => '店家網頁', // 標籤 3
                                                'uri' => 'https://goo.gl/maps/LpTL6e1PDvr' // 連結網址
                                            )
                                        )
                                    )
                                )
                            )
                        ));
                    }
                    else if($m_message=="訂餐"){
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'template', // 訊息類型 (模板)
                                    'altText' => '訂餐服務唷', // 替代文字
                                    'template' => array(
                                        'type' => 'buttons', // 類型 (按鈕)
                                        'thumbnailImageUrl' => 'https://raw.githubusercontent.com/amc19980304/linebot/master/store.jpg', // 圖片網址 <不一定需要>
                                        'title' => '訂餐服務', // 標題 <不一定需要>
                                        'text' => '請點擊以下欄位以便輸入資料', // 文字
                                        'actions' => array(
                                            array(
                                                'type' => 'postback', // 類型 (回傳)
                                                'label' => '姓名', // 標籤 1
                                                'data' => 'action=buy&itemid=123' // 資料
                                            ),
                                            array(
                                                'type' => 'postback', // 類型 (回傳)
                                                'label' => '電話', // 標籤 1
                                                'data' => 'action=buy&itemid=123' // 資料
                                            ),
                                            array(
                                                'type' => 'postback', // 類型 (回傳)
                                                'label' => '地址', // 標籤 1
                                                'data' => 'action=buy&itemid=123' // 資料
                                            ),
                                            array(
                                                'type' => 'postback', // 類型 (回傳)
                                                'label' => '訂餐內容', // 標籤 1
                                                'data' => 'action=buy&itemid=123' // 資料
                                            )
                                        )
                                    )
                                )
                            )
                        ));
                    }
                    else{
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
                                    'text' => '不好意思,我聽不懂你的話呢'
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
