<?php

namespace App\Controller;

use App\Entity\AstreintesAndrew;
use App\Form\AstreintesAndrewType;
use App\Repository\AstreintesAndrewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/astreintes/andrew/crud')]
class AstreintesAndrewCrudController extends AbstractController
{
    #[Route('/', name: 'app_astreintes_andrew_crud_index', methods: ['GET'])]
    public function index(AstreintesAndrewRepository $astreintesAndrewRepository): Response
    {
        return $this->render('astreintes_andrew_crud/index.html.twig', [
            'astreintes_andrew' => $astreintesAndrewRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_astreintes_andrew_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AstreintesAndrewRepository $astreintesAndrewRepository): Response
    {
        $astreintesAndrew = new AstreintesAndrew();
        $form = $this->createForm(AstreintesAndrewType::class, $astreintesAndrew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $astreintesAndrewRepository->save($astreintesAndrew, true);

            return $this->redirectToRoute('app_astreintes_andrew_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('astreintes_andrew_crud/new.html.twig', [
            'astreintes_andrew' => $astreintesAndrew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_astreintes_andrew_crud_show', methods: ['GET'])]
    public function show(AstreintesAndrew $astreintesAndrew): Response
    {
        return $this->render('astreintes_andrew_crud/show.html.twig', [
            'astreintes_andrew' => $astreintesAndrew,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_astreintes_andrew_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AstreintesAndrew $astreintesAndrew, AstreintesAndrewRepository $astreintesAndrewRepository): Response
    {
        $form = $this->createForm(AstreintesAndrewType::class, $astreintesAndrew);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $astreintesAndrewRepository->save($astreintesAndrew, true);

            return $this->redirectToRoute('app_astreintes_andrew_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('astreintes_andrew_crud/edit.html.twig', [
            'astreintes_andrew' => $astreintesAndrew,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_astreintes_andrew_crud_delete', methods: ['POST'])]
    public function delete(Request $request, AstreintesAndrew $astreintesAndrew, AstreintesAndrewRepository $astreintesAndrewRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$astreintesAndrew->getId(), $request->request->get('_token'))) {
            $astreintesAndrewRepository->remove($astreintesAndrew, true);
        }

        return $this->redirectToRoute('app_astreintes_andrew_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
