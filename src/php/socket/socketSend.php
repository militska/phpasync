<?php
$start = microtime(true);
require_once __DIR__.'/../../Telegram.php';

$url = getLink("test from socketSend.php");

$opts = [
    'http' => [
        'method' => "GET",
    ]
];

$context = stream_context_create($opts);
$fp = fopen($url, 'r', false, $context);
fclose($fp);
//$fp = file_get_contents($url, false, $context);
echo 'exec; Время выполнения скрипта: ' . round(microtime(true) - $start, 4) . " сек. \n";

