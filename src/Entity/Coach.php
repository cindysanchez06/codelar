<?php

namespace App\Entity;

use App\Repository\CoachRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoachRepository::class)
 */
class Coach
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PokemonCoach", mappedBy="coach", cascade={"all"})
     */
    private $pokemonCoach;

    private $pokemons;

    public function __construct()
    {
        $this->pokemonCoach =  new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }


    public function getPokemonCoach()
    {
        $pokemonsCoach = [];
        foreach ($this->pokemonCoach as $pokemon)
        {
            $pokemonsCoach[] = $pokemon;
        }

        return $pokemonsCoach;
    }


    /**
     * @return mixed
     */
    public function getPokemons()
    {

        return $this->pokemons;
    }

}
