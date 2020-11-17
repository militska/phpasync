<?php

/**
 * Task это задача, которая может выполняться параллельно
 */
class Task extends Threaded
{

    private $inc;

    public function __construct($inc)
    {
        $this->inc = $inc;
    }

    public function run()
    {
        $list = $this->getListPokemons($this->inc);
        foreach ($list as $pokemon) {
            $abilities = $this->getAbility($pokemon->url);

            $str = 'step' . $this->inc . '; ' .
                'name: ' . $pokemon->name . '; ' .
                'abilities: ' . implode(", ", $abilities);
            file_put_contents
            (__DIR__ . '/all.log',
                date('d.m.Y H:i:s') . " - " . $str . "\n", FILE_APPEND);
        }
    }

    /***
     * @param $url
     * @return array
     */
    private function getAbility($url)
    {
        $infoPokemon = json_decode(file_get_contents($url));
        $abilities = [];
        foreach ($infoPokemon->abilities as $ability) {
            $abilities[] = $ability->ability->name;
        }
        return $abilities;
    }


    /***
     * @param $offset
     * @return mixed
     */
    private function getListPokemons($offset)
    {
        $resPok = json_decode(file_get_contents(
            'https://pokeapi.co/api/v2/pokemon?limit=20&offset=' . $offset*20));

        $str = 'step ' . $offset . '; cnt ' . count($resPok->results) . '  ' . 'https://pokeapi.co/api/v2/pokemon?limit=20&offset=' . $offset;
        file_put_contents
        (__DIR__ . '/all.log',
            date('d.m.Y H:i:s') . " - " . $str . "\n", FILE_APPEND);

        return $resPok->results;

    }

}