<?php

namespace App\Services;

use App\Services\API\RequestService;

class PokemonService
{
    private $requestService;

    public function __construct(RequestService $requestService)
    {
        $this->requestService = $requestService;
    }

    public function getPokemons($offset = 0, $limit = 500)
    {
        $method = 'GET';
        $url = 'https://pokeapi.co/api/v2/pokemon?offset=' . $offset . '&limit=' . $limit;
        $result = $this->requestService->requests($method, $url);
        $pokemons = array_map(function ($pokemon){
            $pokemon['id'] =explode('/', $pokemon['url'])[6];
            return $pokemon;
        }, $result['results']);
        return $pokemons;
    }

    public function getPokemon(int $id)
    {
        $method = 'GET';
        $url = 'https://pokeapi.co/api/v2/pokemon/' . $id;
        return $this->requestService->requests($method, $url);
    }

}