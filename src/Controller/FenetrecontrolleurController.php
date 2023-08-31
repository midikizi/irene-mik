<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class FenetrecontrolleurController extends AbstractController
{
    #[Route('/fenetrecontrolleur', name: 'app_fenetrecontrolleur')]
    public function index(): Response
    {
        return $this->render('fenetrecontrolleur/index.html.twig', [
            'controller_name' => 'FenetrecontrolleurController',
        ]);
    }


}
