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


foreach (range(1,20) as $value) {
    sleep(1);
    echo "iteration " . $value . "\n";
}
$pool->shutdown();

printf("Done for %.2f seconds" . PHP_EOL, microtime(true) - $start);