<?php

namespace App\Controller;
use App\Entity\AstreintesUsers;
use App\Form\AstreintesUsersType;
use App\Repository\AstreintesUsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class AstreintesController extends AbstractController
{
    #[Route('/mon_compte/astreintes', name: 'app_account/astreintes', methods: ['GET'])]
    public function index(AstreintesUsersRepository $astreintesUsersRepository): Response
    {
        return $this->render('account/astreintes/index.html.twig',[
        'astreintes_users' => $astreintesUsersRepository->findAll(),
    ]);
    
    }
    #[Route('/mon_compte/astreintes/new', name: 'app_account/astreintes/new', methods: ['GET', 'POST'])]
    public function new(Request $request, AstreintesUsersRepository $astreintesUsersRepository): Response
    {
        $astreintesUsers = new AstreintesUsers();
        $form = $this->createForm(AstreintesUsersType::class, $astreintesUsers);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $astreintesUsersRepository->save($astreintesUsers, true);

            return $this->redirectToRoute('app_account/astreintes/new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('account/astreintes/new.html.twig', [
            'astreintes_users' => $astreintesUsers,
            'form' => $form,
        ]);
    }
    #[Route('/{id}', name: 'app_account/astreintes/delete', methods: ['POST'])]
    public function delete(Request $request, AstreintesUsers $astreintesUsers, AstreintesUsersRepository $AstreintesUsersRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$astreintesUsers->getId(), $request->request->get('_token'))) {
            $AstreintesUsersRepository->remove($astreintesUsers, true);
        }

        return $this->redirectToRoute('app_account/astreintes/new', [], Response::HTTP_SEE_OTHER);
    }
}
