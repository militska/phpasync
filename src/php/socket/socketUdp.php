<?php

require_once __DIR__.'/../../Telegram.php';

$url = getLink("test from socketSend2.php");

//Reduce errors
error_reporting(~E_WARNING);

$server = '127.0.0.1';
$port = 9999;

if(!($sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Couldn't create socket: [$errorcode] $errormsg \n");
}

echo "Socket created \n";
$msg = "hi!";
//Send the message to the server
if( ! socket_sendto($sock, $msg , strlen($msg) , 0 , $url, 443))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Could not send data: [$errorcode] $errormsg \n");
}
