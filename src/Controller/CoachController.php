<?php

namespace App\Controller;

use App\Entity\Coach;
use App\Form\CoachType;
use App\Services\CoachService;
use App\Services\PokemonCoachService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        return $this->render('coach/index.html.twig', [
            'coachs' => $coachs
        ]);
    }

    /**
     * @Route("/coach/new", name="new_coach")
     */
    public function create(Request $request)
    {

        $coach = new Coach();
        $form = $this->createForm(CoachType::class, $coach);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formCoach = $form->getData();
            $pokemons = $request->request->get('coach')['pokemons'];
            $coach = $this->coachService->addCoach($formCoach, $pokemons);
            return $this->redirectToRoute('coach');
        }

        return $this->renderForm('coach/create.html.twig', [
            'form' => $form
        ]);
    }

    /**
     * @Route("/coach/edit/{id}", name="edit_coach")
     */
    public function edit(Request $request, Coach $coach)
    {
        $form = $this->createForm(CoachType::class, $coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coach = $form->getData();
            $this->coachService->editCoach($coach);
            return $this->redirectToRoute('coach');
        }
        return $this->renderForm('coach/create.html.twig', [
            'form' => $form
        ]);
    }

    /**
     * @Route("/coach/delete/{id}", name="delete_coach")
     */
    public function delete(Coach $coach)
    {
        $this->coachService->deleteCoach($coach);
        return $this->redirectToRoute('coach');
    }
}