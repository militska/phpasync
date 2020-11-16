<?php
require_once 'CounterDP.php';
require_once 'Worker.php';
require_once 'Task.php';

error_reporting(E_ALL);
$threads = 4;

// Создадим провайдер. Этот сервис может например читать некие данные
// из файла или из БД
$provider = new CounterDP();

// Создадим пул воркеров
$pool = new Pool($threads, 'MyWorker', [$provider]);

$start = microtime(true);
$workers = $threads;
for ($i = 0; $i < $workers; $i++) {
    $pool->submit(new MyWork());
}

$pool->shutdown();

printf("Done for %.2f seconds" . PHP_EOL, microtime(true) - $start);