<?php

namespace App\Controller;

use App\Entity\Comptes;
use App\Entity\Depot;
use App\Form\ComptesType;
use App\Repository\ComptesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/comptes')]
class ComptesController extends AbstractController
{
    #[Route('/', name: 'app_comptes_index', methods: ['GET'])]
    public function index(ComptesRepository $comptesRepository): Response
    {
        return $this->render('comptes/index.html.twig', [
            'comptes' => $comptesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_comptes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $compte = new Comptes();
        $form = $this->createForm(ComptesType::class, $compte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($compte);
            $entityManager->flush();

            return $this->redirectToRoute('app_comptes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptes/new.html.twig', [
            'comptes' => $compte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_comptes_show', methods: ['GET'])]
    public function show(Comptes $compte): Response
    {
        return $this->render('comptes/show.html.twig', [
            'comptes' => $compte,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_comptes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Comptes $compte, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ComptesType::class, $compte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_comptes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptes/edit.html.twig', [
            'comptes' => $compte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_comptes_delete', methods: ['POST'])]
    public function delete(Request $request, Comptes $compte, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$compte->getId(), $request->request->get('_token'))) {
            $entityManager->remove($compte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_comptes_index', [], Response::HTTP_SEE_OTHER);
    }

    // #[Route('/addition', name: 'app_comptes_addition', methods: ['POST'])]
    public static  function Addition( ComptesRepository $comptesRepository,Comptes $compte,Depot $depot)
    {
        //1- récupéré le compte cible par un findby (numero_compte)
        //2- ajouter montant de la transaction sur le solde actuel
        //3- envoyer le message de comfirmation
        // $compte = getDoctrine()->getRepository(Comptes::class)->findby();
        // $depot = getDoctrine()->getRepository(Depot::class)->findby();

        $soldeAct = $compte->getSolde();
        $compte->setSolde($soldeAct + $depot->getMontant());
        $comptesRepository->save($compte, true);



        // foreach ($compte as $compte) {
        //     foreach ($depot as $depot) {
        //         if ($depot->getMontant() == $compte) {
        //             $total += $compte->getSolde() + $depot->getMontant();
        //         }
        //     }
        // }
// $total contient la somme des montant et solde


    }
}
