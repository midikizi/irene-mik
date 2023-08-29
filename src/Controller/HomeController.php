<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/homes', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('homes/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
