<?php

namespace App\Entity;

use App\Repository\PokemonCoachRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pokemon_coach")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Coach", inversedBy="pokemonCoach")
     * @ORM\JoinColumn(name="coach_id", referencedColumnName="id")
     */
    private $coach;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pokemonId;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCoach(): ?Coach
    {
        return $this->coach;
    }

    /**
     * @param mixed $coach
     */
    public function setCoach(? Coach $coach): self
    {
        $this->coach = $coach;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPokemonId()
    {
        return $this->pokemonId;
    }

    /**
     * @param mixed $pokemonId
     */
    public function setPokemonId($pokemonId): void
    {
        $this->pokemonId = $pokemonId;
    }

    public function addCoach(Coach $coach)
    {
        if (!$this->coach->contains($coach))
        {
            $this->coach[] = $coach;
        }
    }
}
