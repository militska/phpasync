<?php

require_once __DIR__.'/../../Telegram.php';

$url = getLink("test from socketSend2.php");

//file_get_contents($url);
$hole = fsockopen($url, 81, $errno, $errstr, 10);

$socket = stream_socket_client($url );

stream_set_blocking($socket, 0);


socket_write($socket, [], strlen([]));

$fp = file_get_contents($url, false, $context);