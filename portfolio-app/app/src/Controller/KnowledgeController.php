<?php

namespace App\Controller;

// use App\Entity\Paragraf;
// use App\Repository\ParagrafRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KnowledgeController extends AbstractController
{
    #[Route('/knowledge', name: 'app_knowledge')]
    public function index(//ParagrafRepository $paragrafRepository
    ): Response
    {

//        $presentations = $paragrafRepository->findAll();
//        dd($presentations);

        return $this->render('knowledge/index.html.twig', [
            'controller_name' => 'KnowledgeController',
//            'paragrafs' => $presentations
        ]);
    }
}
