<?php

namespace App\Controller;

use App\Entity\Intervention;
use App\Form\InterventionType;
use App\Repository\InterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


#[Route('/mon_compte/intervention')]
class InterventionController extends AbstractController
{

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->currentUser = $tokenStorage->getToken()->getUser();
    }

    #[Route('/', name: 'app_intervention_index', methods: ['GET'])]
    public function index(Request $request, InterventionRepository $interventionRepository): Response
    {
        $date = $request->query->get('date');

        if ($date) {
            $date =  new \DateTime($date);
            $interventions = $interventionRepository->findBy([
                'interventionUser' => $this->currentUser,
                'Date' => $date,
            ]);
        }
        // Sinon, on ne filtre pas du tout
        else {
            $interventions = $interventionRepository->findbY([
                'interventionUser' => $this->currentUser,
            ]);
        }

        return $this->render('account/intervention/index.html.twig', [
            'interventions' => $interventions,
            'Date' => $date ? $date->format('d-m-y') : '',
        ]);
    }

    #[Route('/new', name: 'app_intervention_new', methods: ['GET', 'POST'])]
    public function new(Request $request, InterventionRepository $interventionRepository): Response
    {
        $intervention = new Intervention();

        $form = $this->createForm(InterventionType::class, $intervention);
        $form->get('Firstname')->setData($this->currentUser->getFirstName());
        $form->get('Lastname')->setData($this->currentUser->getLastName());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $intervention->setInterventionUser($this->currentUser);
            $interventionRepository->save($intervention, true);

            return $this->redirectToRoute('app_intervention_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('account/intervention/new.html.twig', [
            'intervention' => $intervention,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_intervention_show', methods: ['GET'])]
    public function show(InterventionRepository $interventionRepository, $id): Response
    {
        $intervention = $interventionRepository->findOneBy(array('id' => $id));
        return $this->render('account/intervention/show.html.twig', [
            'intervention' => $intervention,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_intervention_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, InterventionRepository $interventionRepository, $id): Response
    {
        $intervention = $interventionRepository->findOneBy(array('id' => $id));

        $form = $this->createForm(InterventionType::class, $intervention);
        $form->get('Firstname')->setData($this->currentUser->getFirstName());
        $form->get('Lastname')->setData($this->currentUser->getLastName());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $interventionRepository->save($intervention, true);

            return $this->redirectToRoute('app_intervention_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('account/intervention/edit.html.twig', [
            'intervention' => $intervention,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_intervention_delete', methods: ['POST'])]
    public function delete(Request $request, InterventionRepository $interventionRepository, $id): Response
    {
        $intervention = $interventionRepository->findOneBy(array('id' => $id));

        if ($this->isCsrfTokenValid('delete' . $intervention->getId(), $request->request->get('_token'))) {
            $interventionRepository->remove($intervention, true);
        }

        return $this->redirectToRoute('app_intervention_index', [], Response::HTTP_SEE_OTHER);
    }
}
