<?php

namespace App\Controller;

use App\Entity\Knowledge;
use App\Form\KnowledgeType;
use App\Repository\KnowledgeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/knowledges')]
class KnowledgesController extends AbstractController
{
    #[Route('/', name: 'app_knowledges_index', methods: ['GET'])]
    public function index(KnowledgeRepository $knowledgeRepository): Response
    {
        return $this->render('knowledges/index.html.twig', [
            'knowledge' => $knowledgeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_knowledges_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $knowledge = new Knowledge();
        $form = $this->createForm(KnowledgeType::class, $knowledge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($knowledge);
            $entityManager->flush();

            return $this->redirectToRoute('app_knowledges_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('knowledges/new.html.twig', [
            'knowledge' => $knowledge,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_knowledges_show', methods: ['GET'])]
    public function show(Knowledge $knowledge): Response
    {
        return $this->render('knowledges/show.html.twig', [
            'knowledge' => $knowledge,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_knowledges_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Knowledge $knowledge, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(KnowledgeType::class, $knowledge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_knowledges_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('knowledges/edit.html.twig', [
            'knowledge' => $knowledge,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_knowledges_delete', methods: ['POST'])]
    public function delete(Request $request, Knowledge $knowledge, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$knowledge->getId(), $request->request->get('_token'))) {
            $entityManager->remove($knowledge);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_knowledges_index', [], Response::HTTP_SEE_OTHER);
    }
}
