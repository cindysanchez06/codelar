<?php

namespace App\Controller;

use App\Services\PokemonService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    private $pokemonService;

    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    /**
     * @Route("/pokemons", name="pokemons", methods="GET")
     */
    public function index()
    {
        $pokemons = $this->pokemonService->getPokemons();
        return $this->render('pokemon/index.html.twig', [
            'pokemons' => $pokemons
        ]);
    }

    /**
     * @Route("/pokemon/{id}", name="pokemon_show", methods="GET")
     */
    public function show(Request $request, int $id)
    {
        $pokemon = $this->pokemonService->getPokemon($id);
        return $this->render('pokemon/show.html.twig', [
            'pokemon' => $pokemon
        ]);
    }
}