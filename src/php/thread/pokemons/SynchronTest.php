<?php

/***
 * Тестирование синхронной работы
 */


$startAll = microtime(true);

$pokemons = [];
for ($inc = 1; $inc <= 4; $inc++) {
    $pokemons = json_decode(file_get_contents(
        'https://pokeapi.co/api/v2/pokemon?limit=20&offset=' . $inc));
    $listPokemons = $pokemons->results;
    foreach ($listPokemons as $pokemon) {
        $infoPokemon = json_decode(file_get_contents($pokemon->url));
        $abilities = [];
        foreach ($infoPokemon->abilities as $ability) {
            $abilities[] = $ability->ability->name;
        }

        $str = 'name: ' . $pokemon->name . '; abilities: ' . implode(", ", $abilities);
        file_put_contents
        (__DIR__ . '/all_sync.log',
            date('d.m.Y H:i:s') . " - " . $str . "\n", FILE_APPEND);
    }

}
printf("All script. Done for %.2f seconds" . PHP_EOL, microtime(true) - $startAll);
