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

printf("Done for %.2f seconds" . PHP_EOL, microtime(true) - $start ."\n");


foreach (range(1, 5) as $value) {
    echo $value . "\n";
}
$pool->shutdown();
printf("Done for %.2f seconds" . PHP_EOL, microtime(true) - $start);

require_once __DIR__.'/../../../Telegram.php';

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
        sleep(rand(1, 5));
        $url = getLink("test from curl/index.php");

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_exec($ch);
        curl_close($ch);

    }
}