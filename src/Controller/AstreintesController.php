<?php

namespace App\Controller;

use App\Repository\AstreintesAndrewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AstreintesController extends AbstractController
{
    #[Route('/mon_compte/astreintes', name: 'app_account/astreintes', methods: ['GET'])]
    public function index(AstreintesAndrewRepository $astreintesAndrewRepository): Response
    {
        return $this->render('account/astreintes/astreintes_andrew_crud/index.html.twig',[
        'astreintes_andrew' => $astreintesAndrewRepository->findAll(),
    ]);
    
    }

    
}
