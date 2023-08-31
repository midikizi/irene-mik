<?php

namespace App\Controller;

use App\Entity\Comptes;
use App\Entity\Depot;
use App\Form\DepotType;
use App\Repository\ComptesRepository;
use App\Repository\DepotRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/depot')]
class DepotController extends AbstractController
{
    #[Route('/', name: 'app_depot_index', methods: ['GET'])]
    public function index(DepotRepository $depotRepository): Response
    {
        return $this->render('depot/index.html.twig', [
            'depots' => $depotRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_depot_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,DepotRepository $depotRepository,ComptesRepository $comptesRepository): Response
    {
        $depot = new Depot();
        $form = $this->createForm(DepotType::class, $depot);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($depot);
            $entityManager->flush();

            //incrémentation du solde du compte
            $data = $form->getData();
            //dd($data->getCompte()->getNumeroCompte());
            $compte = $this->getDoctrine()->getRepository(Comptes::class)->findOneBy(['numero_compte' => $data->getCompte()->getNumeroCompte()]);

            ComptesController::Addition($comptesRepository,$compte,$depot);

            return $this->redirectToRoute('app_depot_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('depot/new.html.twig', [
            'depot' => $depot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_depot_show', methods: ['GET'])]
    public function show(Depot $depot): Response
    {
        return $this->render('depot/show.html.twig', [
            'depot' => $depot,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_depot_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Depot $depot, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DepotType::class, $depot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_depot_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('depot/edit.html.twig', [
            'depot' => $depot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_depot_delete', methods: ['POST'])]
    public function delete(Request $request, Depot $depot, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$depot->getId(), $request->request->get('_token'))) {
            $entityManager->remove($depot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_depot_index', [], Response::HTTP_SEE_OTHER);
    }
}
