<?php
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

/**
 * Task это задача, которая может выполняться параллельно
 */
class Task extends Threaded
{

    private $workerId;

    public function __construct($inc)
    {
        $this->workerId = $inc;
    }

    public function run()
    {
        foreach (range(1, 10) as $inc) {
            sleep(2);
            file_put_contents
            (__DIR__ . '/all.log',
                date('d.m.Y H:i:s')
                . " - worker " . $this->workerId
                . " - step" . $inc . "\n", FILE_APPEND);
        }
    }
}