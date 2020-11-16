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
            $provider->synchronized(function ($provider) use (&$value) {
                $value = $provider->getNext();
            }, $provider);

            if ($value === null) {
                continue;
            }

            $list = $value->results;
            foreach ($list as $pokemon) {
                $infoPokemon = json_decode(file_get_contents($pokemon->url));
                $abilities = [];
                foreach ($infoPokemon->abilities as $ability) {
                    $abilities[] = $ability->ability->name;
                }

                $str = 'name: ' . $pokemon->name . '; abilities: ' . implode(", ", $abilities);
                file_put_contents
                (__DIR__ . '/all.log',
                    date('d.m.Y H:i:s') . " - " . $str . "\n", FILE_APPEND);
            }
        } while ($value !== null);
    }

}