<?php

namespace App\Controller;

use App\Entity\Api;
use App\Form\ApiType;
use App\Repository\ApiRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/apii')]
class ApiController extends AbstractController
{
    #[Route('/', name: 'app_api_index', methods: ['GET'])]
    public function index(ApiRepository $apiRepository): Response
    {
        return $this->render('apii/index.html.twig', [
            'apis' => $apiRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_api_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $api = new Api();
        $form = $this->createForm(ApiType::class, $api);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($api);
            $entityManager->flush();

            return $this->redirectToRoute('app_api_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('apii/new.html.twig', [
            'apii' => $api,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_api_show', methods: ['GET'])]
    public function show(Api $api): Response
    {
        return $this->render('apii/show.html.twig', [
            'apii' => $api,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_api_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Api $api, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ApiType::class, $api);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_api_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('apii/edit.html.twig', [
            'apii' => $api,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_api_delete', methods: ['POST'])]
    public function delete(Request $request, Api $api, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$api->getId(), $request->request->get('_token'))) {
            $entityManager->remove($api);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_api_index', [], Response::HTTP_SEE_OTHER);
    }

    //#[Route('/fenetre', name: 'app_api_fenetre')]
    //public function fenetre(): Response
   // {
     //   return $this->render('api/fenetre.html.twig', [
       //     'controller_name' => 'AnnexesController',
     //   ]);
   // }
}
