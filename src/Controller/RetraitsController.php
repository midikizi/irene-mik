<?php

namespace App\Controller;

use App\Entity\Retraits;
use App\Form\RetraitsType;
use App\Repository\RetraitsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/retraits')]
class RetraitsController extends AbstractController
{
    #[Route('/', name: 'app_retraits_index', methods: ['GET'])]
    public function index(RetraitsRepository $retraitsRepository): Response
    {
        return $this->render('retrait/index.html.twig', [
            'retrait' => $retraitsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_retraits_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $retrait = new Retraits();
        $form = $this->createForm(RetraitsType::class, $retrait);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($retrait);
            $entityManager->flush();

            return $this->redirectToRoute('app_retraits_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('retrait/new.html.twig', [
            'retrait' => $retrait,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_retraits_show', methods: ['GET'])]
    public function show(Retraits $retrait): Response
    {
        return $this->render('retrait/show.html.twig', [
            'retrait' => $retrait,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_retraits_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Retraits $retrait, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RetraitsType::class, $retrait);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_retraits_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('retrait/edit.html.twig', [
            'retrait' => $retrait,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_retraits_delete', methods: ['POST'])]
    public function delete(Request $request, Retraits $retrait, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$retrait->getId(), $request->request->get('_token'))) {
            $entityManager->remove($retrait);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_retraits_index', [], Response::HTTP_SEE_OTHER);
    }
}
