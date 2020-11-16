<?php

/**
 * MyWorker тут используется, чтобы расшарить провайдер между экземплярами MyWork.
 */
class MyWorker extends Worker
{
    /**
     * @var MyDataProvider
     */
    private $provider;

    /**
     * @param CounterDP $provider
     */
    public function __construct(CounterDP $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Вызывается при отправке в Pool.
     */
    public function run()
    {
        // В этом примере нам тут делать ничего не надо
    }

    /**
     * Возвращает провайдера
     *
     * @return MyDataProvider
     */
    public function getProvider()
    {
        return $this->provider;
    }
}