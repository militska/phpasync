<?php


$start = microtime(true);

$out = '';
exec(sprintf("php %s/task.php el > /dev/null &", __DIR__));
exec(sprintf("php %s/task.php jho > /dev/null &", __DIR__));
exec(sprintf("php %s/task.php mia", __DIR__));

echo 'exec; Время выполнения скрипта: ' . round(microtime(true) - $start, 4) . " сек. \n";


$start = microtime(true);

passthru(sprintf("php %s/task.php el", __DIR__));
passthru(sprintf("php %s/task.php el", __DIR__));
passthru(sprintf("php %s/task.php el", __DIR__));

echo 'passthru; Время выполнения скрипта: ' . round(microtime(true) - $start, 4) . ' сек.';
