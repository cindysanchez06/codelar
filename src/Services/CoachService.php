<?php

namespace App\Services;

use App\Repository\CoachRepository;
use Doctrine\ORM\EntityManagerInterface;

class CoachService
{
    private $coachRepository;
    private $entityManager;

    public function __construct(CoachRepository $coachRepository,  EntityManagerInterface $entityManager )
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
        //$name = $data->name;
        //$avatar = $data->avatar;
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }
}