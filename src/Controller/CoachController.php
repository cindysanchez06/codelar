<?php

namespace App\Controller;

use App\Services\CoachService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoachController extends AbstractController
{
    private $coachService;

    public function __construct(CoachService $coachService)
    {
        $this->coachService = $coachService;
    }

    /**
     * @Route("/", name="coach")
     */
    public function index()
    {
        $coachs = $this->coachService->getAllCoachs();
        return $this->render('coach/index.html.twig',[
            'coachs' => $coachs
        ]);
    }
}