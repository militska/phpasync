<?php
require_once 'Task.php';

error_reporting(E_ALL);
$threads = 4;

// Создадим пул воркеров
$pool = new Pool($threads);
$start = microtime(true);
$workers = $threads;
for ($i = 1; $i <= $workers; $i++) {
    $pool->submit(new Task($i));
}
$pool->shutdown();

printf("Done for %.2f seconds" . PHP_EOL, microtime(true) - $start);