<?php

namespace App\Controller;

use App\Repository\ComptesRepository;
use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Page2Controller extends AbstractController
{
    #[Route('/page', name: 'app_page2')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'Page2Controller',
        ]);
    }

    #[Route('/depot_api', name: 'app_api')]
    public function depot(): Response
    {
        return $this->render('page/depot.html.twig', [
            'controller_name' => 'Page2Controller',
        ]);
    }

    #[Route('/depot_solde', name: 'app_solde',methods: ['GET', 'POST'])]
    public function slode(Request $request,ComptesRepository $comptesRepository): Response
    {

        return $this->render('page/solde.html.twig', [
            'controller_name' => 'Page2Controller',
        ]);
    }

    #[Route('/demande', name: 'app_demm')]
    public function demande(): Response
    {
        return $this->render('page/demande_credit.html.twig', [
            'controller_name' => 'Page2Controller',
        ]);
    }

    #[Route('/retrai', name: 'app_retrai')]
    public function retrait(): Response
    {
        return $this->render('page/retrait.html.twig', [
            'controller_name' => 'Page2Controller',
        ]);
    }

    #[Route('/tonti', name: 'app_tonti')]
    public function tontine(): Response
    {
        return $this->render('page/tontine.html.twig', [
            'controller_name' => 'Page2Controller',
        ]);
    }
}
