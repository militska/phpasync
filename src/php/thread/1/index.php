<?php

$task = new class extends Thread {
    private $response;

    public $content;

    public function run()
    {
        sleep(3);
        echo "task";
        sleep(3);

    }
};

$task2 = new class extends Thread {
    private $response;

    public $content;

    public function run()
    {
        sleep(3);
        echo "task";
        sleep(3);

    }
};

$task->start() && $task->join();

var_dump($task->response); // s
