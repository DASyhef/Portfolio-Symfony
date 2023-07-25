<?php

namespace App\Controller;

use App\Entity\SkillsManager;
use App\Form\SkillsManagerType;
use App\Repository\SkillsManagerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/skills_manager')]
class SkillsManagerController extends AbstractController
{
    #[Route('/', name: 'app_skills_manager_index', methods: ['GET'])]
    public function index(SkillsManagerRepository $skillsManagerRepository): Response
    {
        return $this->render('admin/skills_manager/index.html.twig', [
            'skills_managers' => $skillsManagerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_skills_manager_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $skillsManager = new SkillsManager();
        $form = $this->createForm(SkillsManagerType::class, $skillsManager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($skillsManager);
            $entityManager->flush();

            return $this->redirectToRoute('app_skills_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/skills_manager/new.html.twig', [
            'skills_manager' => $skillsManager,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_skills_manager_show', methods: ['GET'])]
    public function show(SkillsManager $skillsManager): Response
    {
        return $this->render('admin/skills_manager/show.html.twig', [
            'skills_manager' => $skillsManager,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_skills_manager_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SkillsManager $skillsManager, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkillsManagerType::class, $skillsManager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_skills_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/skills_manager/edit.html.twig', [
            'skills_manager' => $skillsManager,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_skills_manager_delete', methods: ['POST'])]
    public function delete(Request $request, SkillsManager $skillsManager, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$skillsManager->getId(), $request->request->get('_token'))) {
            $entityManager->remove($skillsManager);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_skills_manager_index', [], Response::HTTP_SEE_OTHER);
    }
}
