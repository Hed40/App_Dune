<?php

namespace App\Controller;

use App\Entity\AstreintesUsers;
use App\Entity\User;
use App\Form\AstreintesUsers1Type;
use App\Repository\AstreintesUsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[Route('/mon_compte/astreintes')]
class AstreintesUsersController extends AbstractController
{
    public function __construct(TokenStorageInterface $tokenStorage) {
        $this->currentUser = $tokenStorage->getToken()->getUser();

    }

    #[Route('/', name: 'app_astreintes_index', methods: ['GET'])]
    public function index(AstreintesUsersRepository $astreintesUsersRepository): Response
    {   
   
        return $this->render('account/astreintes/index.html.twig', [
            'astreintes' => $astreintesUsersRepository->findBy(['astreinteUser' => $this->currentUser]),
            //Reccupère uniquement les données de l'agent connecté
        ]);
    }

    #[Route('/new', name: 'app_astreintes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AstreintesUsersRepository $astreintesUsersRepository): Response
    {
        $astreintesUser = new AstreintesUsers();

        $form = $this->createForm(AstreintesUsers1Type::class, $astreintesUser);
        $form->get('firstName')->setData($this->currentUser->getFirstName());
        $form->get('lastName')->setData($this->currentUser->getLastName());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $astreintesUser->setAstreinteUser($this->currentUser);
            $astreintesUsersRepository->save($astreintesUser, true);

            return $this->redirectToRoute('app_astreintes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('account/astreintes/new.html.twig', [
            'astreintes' => $astreintesUser,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_astreintes_show', methods: ['GET'])]
    public function show(AstreintesUsersRepository $astreintesUsersRepository, $id): Response
    {
        $astreintesUser = $astreintesUsersRepository->findOneBy(array('id' => $id));

        return $this->render('account/astreintes/show.html.twig', [
            'astreintes' => $astreintesUser,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_astreintes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AstreintesUsersRepository $astreintesUsersRepository, $id): Response
    {
        $astreintesUser = $astreintesUsersRepository->findOneBy(array('id' => $id));

        $form = $this->createForm(AstreintesUsers1Type::class, $astreintesUser);
        $form->get('firstName')->setData($this->currentUser->getFirstName());
        $form->get('lastName')->setData($this->currentUser->getLastName());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $astreintesUsersRepository->save($astreintesUser, true);

            return $this->redirectToRoute('app_astreintes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('account/astreintes/edit.html.twig', [
            'astreintes' => $astreintesUser,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_astreintes_delete', methods: ['POST'])]
    public function delete(Request $request, AstreintesUsersRepository $astreintesUsersRepository, $id): Response
    {
        $astreintesUser = $astreintesUsersRepository->findOneBy(array('id' => $id));

        if ($this->isCsrfTokenValid('delete'.$astreintesUser->getId(), $request->request->get('_token'))) {
            $astreintesUsersRepository->remove($astreintesUser, true);
        }

        return $this->redirectToRoute('app_astreintes_index', [], Response::HTTP_SEE_OTHER);
    }
}
