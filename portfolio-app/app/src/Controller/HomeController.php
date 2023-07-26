<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\KnowledgeManagerRepository;
use App\Repository\ProjectsManagerRepository;
use App\Repository\SkillsManagerRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(KnowledgeManagerRepository $knowledgeManagerRepository,
    ProjectsManagerRepository $projectsManagerRepository,
    SkillsManagerRepository $SkillsManagerRepository
        ): Response
    {

        $presentations = $knowledgeManagerRepository->findAll();
        $projects = $projectsManagerRepository->findAll();
        $skills = $SkillsManagerRepository->findAll();
//        dd($presentations);

 //       $lorem = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi harum iste vero nihil quas sed sapiente exercitationem ea explicabo et magni fugit ipsum est repellendus similique rem, ipsa hic adipisci?";
      return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'knowledge_managers' => $presentations,
            'projects_managers' => $projects,
            'skills_managers' => $skills
 //           'lorem' => $lorem
        ]);
    }
}
