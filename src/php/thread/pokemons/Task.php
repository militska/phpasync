<?php

/**
 * Task это задача, которая может выполняться параллельно
 */
class Task extends Threaded
{

    public function run()
    {
        do {
            $value = null;
            $provider = $this->worker->getProvider();
            $provider->synchronized(function ($provider) use (&$value) {
                $value = $provider->getNext();
            }, $provider);

            if ($value === null) {
                continue;
            }

            $list = $this->getListPokemons($value);
            foreach ($list as $pokemon) {
                $abilities = $this->getAbility($pokemon->url);

                $str = 'step' . $value . '; name: ' . $pokemon->name . '; abilities: ' . implode(", ", $abilities);
                file_put_contents
                (__DIR__ . '/logs/async/all.log.' . $value,
                    date('d.m.Y H:i:s') . " - " . $str . "\n", FILE_APPEND);
            }
        } while ($value !== null);
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
            'https://pokeapi.co/api/v2/pokemon?limit=20&offset=' . $offset));

        $str = 'step ' . $offset . '; cnt ' . count($resPok->results) . '  ' . 'https://pokeapi.co/api/v2/pokemon?limit=20&offset=' . $offset;
        file_put_contents
        (__DIR__ . '/logs/async/all.log.' . $offset,
            date('d.m.Y H:i:s') . " - " . $str . "\n", FILE_APPEND);

        return $resPok->results;

    }

}