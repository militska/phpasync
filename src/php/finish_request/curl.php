<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://nginx/src/php/finish_request/finish_request.php');
curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
$res = curl_exec($ch);

$info = curl_getinfo($ch);

var_export($res);;
curl_close($ch);
