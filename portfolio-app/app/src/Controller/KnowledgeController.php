<?php

namespace App\Controller;

use App\Repository\SkillsManagerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KnowledgeController extends AbstractController
{
    #[Route('/knowledge', name: 'app_knowledge')]
    public function index(SkillsManagerRepository $SkillsManagerRepository
    ): Response
    {

        $skills = $SkillsManagerRepository->findAll();

        return $this->render('knowledge/index.html.twig', [
            'controller_name' => 'SkillsController',
            'skills_managers' => $skills
        ]);
    }
}
