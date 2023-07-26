<?php

namespace App\Controller;

// use App\Entity\Paragraf;
// use App\Repository\ParagrafRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectsManagerRepository;
use App\Entity\ProjectsManager;

class ProjectsController extends AbstractController
{
    #[Route('/projects', name: 'app_projects', methods: ["GET"])]
    public function index(ProjectsManagerRepository $projectsManagerRepository
    ): Response
    {

        $projects = $projectsManagerRepository->findAll();

        
     return $this->render('projects/index.html.twig', [
            'controller_name' => 'ProjectsController',
            'projects_managers' => $projects

        ]);
    }
}
