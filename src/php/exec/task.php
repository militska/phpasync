<?php


sleep(1);
$message = "hello from script. my name: " . $argv[1] . "\n";
echo $message;
file_put_contents(__DIR__ . '/all.log', date('d.m.Y H:i:s') . " - " . $message, FILE_APPEND);
sleep(2);

?>