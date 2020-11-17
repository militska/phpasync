<?php

$task = new class extends Thread
{
    public function run()
    {
        foreach (range(1, 10) as $inc) {
            sleep(1);
            file_put_contents
            (__DIR__ . '/all.log', date('d.m.Y H:i:s') . " - step" . $inc . "\n", FILE_APPEND);
        }
    }
};

$task->start();
foreach (range(1, 6) as $inc) {
    sleep(2);
    echo "hi";
}

$task->join();

