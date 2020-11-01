<?php

namespace api\components;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Redis;


/***
 * Class TelegramTarget
 * @package api\components
 */
export();
/***
 * Отправка в телеграм
 */
function export()
{
    $start = microtime(true);

    $message = "test";

    try {
//            $client = new Client([
//                'base_uri' => 'https://api.telegram.org',
//                'timeout' => 2.0,
//            ]);
//            $res = $client->get('/bot' . $botToken . '/sendMessage',
//                [
//                    'query' => [
//                        'chat_id' => self::DAMAGE_PAYMENT_CHAT_ID,
//                        'text' => $message
//                    ],
//                ]);
//
//

//            session_write_close();
//            fastcgi_finish_request();
//
//
//


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot' . getenv('BOT_KEY') . '/sendMessage?chat_id=' .
            getenv('CHAT_ID') . '&text=' . $message);
//            curl_setopt($ch, CURLOPT_HEADER, false);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_POST, 1);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, [
//                'chat_id' => self::DAMAGE_PAYMENT_CHAT_ID,
//                'text' => $message,
//            ]);
//            curl_setopt($ch, CURLOPT_TIMEOUT_MS, 50);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);


//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_exec($ch);
        curl_close($ch);
//


//            $this->streamv2($botToken, $message);
//
//            $content = "Here is my content";
//            $fp = fopen("https://api.telegram.org/bot' . $botToken . '/sendMessage?chat_id=" .
//                self::DAMAGE_PAYMENT_CHAT_ID . '&text=' . $message, "w");
//            fwrite($fp, $content);
//            fclose($fp);
//
//
//            $this->stream('https://api.telegram.org/bot' . $botToken . '/sendMessage?chat_id=' .
//                self::DAMAGE_PAYMENT_CHAT_ID . '&text=' . $message);
//////
////            $this->redis($message);
//            $this->curl($botToken, $message);
//            $this->asyncGuzzle($botToken, $message);
//            $this->guzzle($botToken, $message);
//

    } catch (\Exception $exception) {
//            \Yii::getLogger()->log(sprintf('Apicash.sendMessage(); message: %s', $exception->getMessage()), Logger::LEVEL_WARNING);
    }
    echo 'Время выполнения скрипта: ' . round(microtime(true) - $start, 4) . ' сек.';


}


function curl($botToken, $message)
{
    $ch = curl_init('https://api.telegram.org/bot' . $botToken . '/sendMessage');
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'chat_id' => CHAT_ID,
        'text' => $message,
    ]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($ch);
    curl_close($ch);
}


function redis($message)
{
//        $tlgrmRedis = \Yii::$app->redisTlgrm;
//        $tlgrmRedis->set(time(), $message, 10);
//        $tlgrmRedis->save();


}

function asyncGuzzle($botToken, $message)
{
    $client = new Client([
        'base_uri' => 'https://api.telegram.org',
        'timeout' => 2.0,
    ]);
    $promise = $client->getAsync('/bot' . $botToken . '/sendMessage',
        [
            'query' => [
                'chat_id' => CHAT_ID,
                'text' => $message
            ],
        ]);
    $promise->wait();
}

function guzzle($botToken, $message)
{
    $client = new Client([
        'base_uri' => 'https://api.telegram.org',
        'timeout' => 2.0,
    ]);
    $res = $client->get('/bot' . BOT_KEY . '/sendMessage',
        [
            'query' => [
                'chat_id' => CHAT_ID,
                'text' => $message
            ],
        ]);
}


function stream($url)
{
    $opts = [
        'http' => [
            'method' => "GET",
            'header' => "Accept-language: en\r\n" .
                "Cookie: foo=bar\r\n"
        ]
    ];

    $context = stream_context_create($opts);
    /* Sends an http request to www.example.com
       with additional headers shown above */
    $fp = fopen($url, 'r', false, $context);
    fpassthru($fp);
    fclose($fp);


    $fp = file_get_contents($url, false, $context);

}


function streamv2($botToken, $message)
{
    $fp = stream_socket_client("udp://api.telegram.org/bot' . BOT_KEY . '/sendMessage?chat_id=" .
        CHAT_ID . '&text=' . $message, $errno, $errstr);
    if (!$fp) {
        echo "ОШИБКА: $errno - $errstr<br />\n";
    } else {
        fwrite($fp, "\n");
        echo fread($fp, 26);
        fclose($fp);
    }

}

