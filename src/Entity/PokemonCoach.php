<?php

namespace App\Entity;

use App\Repository\PokemonCoachRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonCoachRepository::class)
 */
class PokemonCoach
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idCoach;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idPokemon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCoach(): ?string
    {
        return $this->idCoach;
    }

    public function setIdCoach(string $idCoach): self
    {
        $this->idCoach = $idCoach;

        return $this;
    }

    public function getIdPokemon(): ?string
    {
        return $this->idPokemon;
    }

    public function setIdPokemon(string $idPokemon): self
    {
        $this->idPokemon = $idPokemon;

        return $this;
    }
}
