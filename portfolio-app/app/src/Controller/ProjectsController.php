<?php

namespace App\Controller;

use App\Entity\Paragraf;
use App\Repository\ParagrafRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    #[Route('/projects', name: 'app_projects')]
    public function index(ParagrafRepository $paragrafRepository
    ): Response
    {

        $presentations = $paragrafRepository->findAll();
//        dd($presentations);
        
     return $this->render('projects/index.html.twig', [
            'controller_name' => 'ProjectsController',
           'paragrafs' => $presentations

        ]);
    }
}
