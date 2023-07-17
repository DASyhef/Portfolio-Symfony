<?php

namespace App\Controller;

use App\Entity\Paragraf;
use App\Repository\ParagrafRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SkillsController extends AbstractController
{
    #[Route('/skills', name: 'app_skills')]
    public function index(ParagrafRepository $paragrafRepository
    ): Response
    {

        $presentations = $paragrafRepository->findAll();
//        dd($presentations);
        
        return $this->render('skills/index.html.twig', [
            'controller_name' => 'SkillsController',
            'paragrafs' => $presentations
        ]);
    }
}
