<?php

/**
 * Провайдер данных для потоков
 */
class PokemonsDP extends Threaded
{
    /**
     * @var int Сколько элементов в нашей воображаемой БД
     */
    private $total = 4;

    /**
     * @var int Сколько элементов было обработано
     */
    private $processed;

    /**
     * Переходим к следующему элементу и возвращаем его
     *
     * @return mixed
     */
    public function getNext()
    {
        if ($this->processed === $this->total) {
            return null;
        }

        $this->processed++;

        return json_decode(file_get_contents(
                'https://pokeapi.co/api/v2/pokemon?limit=20&offset=' . $this->processed));


        //https://pokeapi.co/api/v2/pokemon?limit=20&offset=3


    }
}