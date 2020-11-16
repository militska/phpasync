<?php

/**
 * MyWorker тут используется, чтобы расшарить провайдер между экземплярами MyWork.
 */
class MyWorker extends Worker
{
    /**
     * @var Counter
     */
    private $provider;

    /**
     * @param Counter $provider
     */
    public function __construct(Counter $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Возвращает провайдера
     *
     * @return Counter
     */
    public function getProvider()
    {
        return $this->provider;
    }
}