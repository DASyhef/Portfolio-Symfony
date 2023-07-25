<?php

namespace App\Controller;

use App\Entity\KnowledgeManager;
use App\Form\KnowledgeManagerType;
use App\Repository\KnowledgeManagerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/knowledge_manager')]
class KnowledgeManagerController extends AbstractController
{
    #[Route('/', name: 'app_knowledge_manager_index', methods: ['GET'])]
    public function index(KnowledgeManagerRepository $knowledgeManagerRepository): Response
    {
        return $this->render('admin/knowledge_manager/index.html.twig', [
            'knowledge_managers' => $knowledgeManagerRepository->findAll()
        ]);
    }

    #[Route('/new', name: 'app_knowledge_manager_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $knowledgeManager = new KnowledgeManager();
        $form = $this->createForm(KnowledgeManagerType::class, $knowledgeManager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($knowledgeManager);
            $entityManager->flush();

            return $this->redirectToRoute('app_knowledge_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/knowledge_manager/new.html.twig', [
            'knowledge_manager' => $knowledgeManager,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_knowledge_manager_show', methods: ['GET'])]
    public function show(KnowledgeManager $knowledgeManager): Response
    {
        return $this->render('admin/knowledge_manager/show.html.twig', [
            'knowledge_manager' => $knowledgeManager,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_knowledge_manager_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, KnowledgeManager $knowledgeManager, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(KnowledgeManagerType::class, $knowledgeManager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_knowledge_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/knowledge_manager/edit.html.twig', [
            'knowledge_manager' => $knowledgeManager,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_knowledge_manager_delete', methods: ['POST'])]
    public function delete(Request $request, KnowledgeManager $knowledgeManager, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$knowledgeManager->getId(), $request->request->get('_token'))) {
            $entityManager->remove($knowledgeManager);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_knowledge_manager_index', [], Response::HTTP_SEE_OTHER);
    }
}
