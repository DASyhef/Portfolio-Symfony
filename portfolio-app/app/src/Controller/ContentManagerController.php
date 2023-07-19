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
}
