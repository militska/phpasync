<?php

/**
 * MyWorker тут используется, чтобы расшарить провайдер между экземплярами MyWork.
 */
class MyWorker extends Worker
{
    /**
     * @var PokemonsDP
     */
    private $provider;

    /**
     * @param PokemonsDP $provider
     */
    public function __construct(PokemonsDP $provider)
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
     * @return PokemonsDP
     */
    public function getProvider()
    {
        return $this->provider;
    }
}