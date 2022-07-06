<?php

namespace App\Services;

use App\Entity\Coach;
use App\Entity\PokemonCoach;
use App\Repository\PokemonCoachRepository;
use Doctrine\ORM\EntityManagerInterface;

class PokemonCoachService
{
    private $entityManager;
    private $pokemonCoachRepository;

    public function __construct(EntityManagerInterface $entityManager, PokemonCoachRepository $pokemonCoachRepository)
    {
        $this->entityManager = $entityManager;
        $this->pokemonCoachRepository = $pokemonCoachRepository;
    }

    /**
     * @throws \Exception
     */
    public function add(array $pokemons, Coach $coach)
    {
        $savedPokemonsCoach = [];
        foreach ($pokemons as $pokemon) {
            $pokemonCoach = new PokemonCoach();
            $pokemonCoach->setCoach($coach);
            $pokemonCoach->setPokemonId($pokemon);
            $pokemonCoach->setCreatedAt(new \DateTime());
            $this->pokemonCoachRepository->add($pokemonCoach, true);
            $savedPokemonsCoach[] = $pokemonCoach;
        }
        return $savedPokemonsCoach;

    }
}