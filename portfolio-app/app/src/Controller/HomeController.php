<?php

namespace App\Controller;

//use App\Entity\Paragraf;
//use App\Repository\ParagrafRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(//ParagrafRepository $paragrafRepository
        ): Response
    {

//        $presentations = $paragrafRepository->findAll();
//        dd($presentations);

 //       $lorem = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi harum iste vero nihil quas sed sapiente exercitationem ea explicabo et magni fugit ipsum est repellendus similique rem, ipsa hic adipisci?";
      return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
 //           'paragrafs' => $presentations
 //           'lorem' => $lorem
        ]);
    }
}
