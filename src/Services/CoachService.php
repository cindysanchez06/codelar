<?php

namespace App\Services;

use App\Repository\CoachRepository;
use Doctrine\ORM\EntityManagerInterface;

class CoachService
{
    private $coachRepository;
    private $entityManager;

    public function __construct(CoachRepository $coachRepository, EntityManagerInterface $entityManager)
    {
        $this->coachRepository = $coachRepository;
        $this->entityManager = $entityManager;
    }

    public function getAllCoachs()
    {
        return $this->coachRepository->findAll();
    }

    public function addCoach($data)
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    public function editCoach($data)
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    public function deleteCoach($coach)
    {
        $this->entityManager->remove($coach);
        $this->entityManager->flush();
    }
}