<?
require_once __DIR__.'/../../Telegram.php';

$start = microtime(true);
$url = getLink("test from curl/curl.php");

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_exec($ch);
curl_close($ch);

echo 'exec; Время выполнения скрипта: ' . round(microtime(true) - $start, 4) . " сек. \n";
