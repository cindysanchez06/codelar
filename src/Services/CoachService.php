<?php

namespace App\Services;

use App\Entity\Coach;
use App\Repository\CoachRepository;
use Doctrine\ORM\EntityManagerInterface;

class CoachService
{
    private $coachRepository;
    private $entityManager;
    private $pokemonCoachService;

    public function __construct(CoachRepository $coachRepository, EntityManagerInterface $entityManager, PokemonCoachService $pokemonCoachService)
    {
        $this->coachRepository = $coachRepository;
        $this->entityManager = $entityManager;
        $this->pokemonCoachService = $pokemonCoachService;
    }

    public function getAllCoachs()
    {
       // return $this->coachRepository->getWithPokemons();
        return $this->coachRepository->findAll();
    }

    /**
     * @throws \Exception
     */
    public function addCoach($formCoach, $pokemons)
    {
        $this->entityManager->beginTransaction();
        try {
            $coach = new Coach();
            $coach->setName($formCoach->getName());
            $coach->setAvatar($formCoach->getAvatar());
            $coach->setCreatedAt(new \DateTime());
            $this->coachRepository->add($coach, true);
            $this->pokemonCoachService->add($pokemons, $coach);
            $this->entityManager->commit();
            return $coach;
        } catch (\Exception $exception) {
            $this->entityManager->rollback();
            throw $exception;
        }
    }

    public function editCoach($data)
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    public function deleteCoach(Coach $coach)
    {
        $this->coachRepository->remove($coach, true);
    }
}