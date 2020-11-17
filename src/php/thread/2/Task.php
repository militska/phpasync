<?php

/**
 * MyWork это задача, которая может выполняться параллельно
 */
class Task extends Threaded
{

    public function run()
    {
        do {
            $value = null;

            $provider = $this->worker->getProvider();

            // Синхронизируем получение данных
            $provider->synchronized(function($provider) use (&$value) {
                $value = $provider->getNext();
            }, $provider);

            if ($value === null) {
                continue;
            }

            file_put_contents
            (__DIR__ . '/all.log',
                date('d.m.Y H:i:s') . " - step " . $value . "\n" , FILE_APPEND);

            // Некая ресурсоемкая операция
            $count = 20;
            for ($j = 1; $j <= $count; $j++) {
                sleep(2);
//                file_put_contents
//                (__DIR__ . '/all.log',
//                    date('d.m.Y H:i:s') . " - step " . $j . "\n" , FILE_APPEND);
            }
        }
        while ($value !== null);
    }

}