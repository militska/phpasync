<?php

/**
 * Провайдер данных для потоков
 */
class Counter extends Threaded
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
     * @return int
     */
    public function getNext()
    {

        if ($this->processed === $this->total) {
            return null;
        }

        $this->processed++;

        return $this->processed;
    }
}