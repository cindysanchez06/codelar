<?php

namespace App\Controller;

use App\Entity\Coach;
use App\Form\CoachType;
use App\Services\CoachService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/new-coach", name="new_coach")
     */
    public function create(Request $request)
    {
        $coach = new Coach();
        $form = $this->createForm(CoachType::class, $coach);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $coach = $form->getData();
            $this->coachService->addCoach($coach);
            return $this->redirectToRoute('coach');
        }

        return $this->renderForm('coach/create.html.twig',[
            'form' => $form
        ]);
    }
}