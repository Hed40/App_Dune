<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AstreintesController extends AbstractController
{
    #[Route('/mon_compte/astreintes', name: 'app_astreintes')]
    public function index(): Response
    {
        return $this->render('account/astreintes/index.html.twig');
    }
}
