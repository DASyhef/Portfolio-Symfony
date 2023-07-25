<?php

namespace App\Controller;

use App\Entity\ProjectsManager;
use App\Form\ProjectsManagerType;
use App\Repository\ProjectsManagerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/projects_manager')]
class ProjectsManagerController extends AbstractController
{
    #[Route('/', name: 'app_projects_manager_index', methods: ['GET'])]
    public function index(ProjectsManagerRepository $projectsManagerRepository): Response
    {
        return $this->render('admin/projects_manager/index.html.twig', [
            'projects_managers' => $projectsManagerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_projects_manager_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $projectsManager = new ProjectsManager();
        $form = $this->createForm(ProjectsManagerType::class, $projectsManager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($projectsManager);
            $entityManager->flush();

            return $this->redirectToRoute('app_projects_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/projects_manager/new.html.twig', [
            'projects_manager' => $projectsManager,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_projects_manager_show', methods: ['GET'])]
    public function show(ProjectsManager $projectsManager): Response
    {
        return $this->render('admin/projects_manager/show.html.twig', [
            'projects_manager' => $projectsManager,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_projects_manager_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProjectsManager $projectsManager, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProjectsManagerType::class, $projectsManager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_projects_manager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/projects_manager/edit.html.twig', [
            'projects_manager' => $projectsManager,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_projects_manager_delete', methods: ['POST'])]
    public function delete(Request $request, ProjectsManager $projectsManager, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projectsManager->getId(), $request->request->get('_token'))) {
            $entityManager->remove($projectsManager);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_projects_manager_index', [], Response::HTTP_SEE_OTHER);
    }
}
