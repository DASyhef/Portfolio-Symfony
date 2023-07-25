<?php

namespace App\Controller;

use App\Repository\KnowledgeManagerRepository;
use App\Repository\SkillsManagerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SkillsController extends AbstractController
{
    #[Route('/skills', name: 'app_skills')]
    public function index(KnowledgeManagerRepository $knowledgeManagerRepository
    ): Response
    {

        $presentations = $knowledgeManagerRepository->findAll();
        
        return $this->render('skills/index.html.twig', [
            'controller_name' => 'SkillsController',
            'knowledge_managers' => $presentations
        ]);
    }
}
