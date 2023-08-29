<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnexesController extends AbstractController
{
    #[Route('/contact', name: 'app_annexes')]
    public function index(): Response
    {
        return $this->render('homes/contact.html.twig', [
            'controller_name' => 'AnnexesController',
        ]);
    }

    #[Route('/propos', name: 'app_propos')]
    public function index2(): Response
    {
        return $this->render('homes/propos.html.twig', [
            'controller_name' => 'ProposController',
        ]);
    }
}
