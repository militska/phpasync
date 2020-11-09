<?php

$task = new class extends Thread {
    private $response;

    public $content;

    public function run()
    {
        $content = file_get_contents("http://militska.ru");
        preg_match("~<div id='for-test'>(.+)</div>~", $content, $matches);
        $this->content = $content;
        $this->response = $matches[1];
    }
};

$task->start() && $task->join();

var_dump($task->response); // s
