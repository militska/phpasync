<?php



for ($inc = 1; $inc <= 4; $inc++ ) {
    $pokemons =  json_decode(file_get_contents(
        'https://pokeapi.co/api/v2/pokemon?limit=20&offset=' . $inc));
}




