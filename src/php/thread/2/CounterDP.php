<?php
/**
 * Провайдер данных для потоков
 */
class CounterDP extends Threaded
{
    /**
     * @var int Сколько элементов в нашей воображаемой БД
     */
    private $total = 10;

    /**
     * @var int Сколько элементов было обработано
     */
    private $processed = 0;

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

        return $this->processed;
    }
}