<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentManagerController extends AbstractController
{
    #[Route('/content/manager', name: 'app_ContentManagerController')]
    public function index(): Response
    {
        return $this->render('content_manager/index.html.twig', [
            'controller_name' => 'ContentManagerController',
        ]);
    }
    
    #[Route('/content/manager/{page}', name: 'app_ContentManagerPage')]
    public function showPage(string $page): Response
    {
        // Assuming you have already created the templates
        return $this->render('content_manager/' . $page . '.html.twig');
    }
}
