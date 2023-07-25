<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\KnowledgeManagerRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(KnowledgeManagerRepository $knowledgeManagerRepository
        ): Response
    {

        $presentations = $knowledgeManagerRepository->findAll();
//        dd($presentations);

 //       $lorem = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi harum iste vero nihil quas sed sapiente exercitationem ea explicabo et magni fugit ipsum est repellendus similique rem, ipsa hic adipisci?";
      return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'knowledge_managers' => $presentations
 //           'lorem' => $lorem
        ]);
    }
}
