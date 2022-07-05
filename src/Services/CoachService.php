<?php

namespace App\Services;

use App\Repository\CoachRepository;

class CoachService
{
    private $coachRepository;

    public function __construct(CoachRepository $coachRepository)
    {
        $this->coachRepository = $coachRepository;
    }

    public function getAllCoachs()
    {
        return $this->coachRepository->findAll();
    }

}