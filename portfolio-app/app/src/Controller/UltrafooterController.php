<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UltrafooterController extends AbstractController
{
    #[Route('/ultrafooter', name: 'app_ultrafooter')]
    public function index(): Response
    {
        return $this->render('ultrafooter/index.html.twig', [
            'controller_name' => 'UltrafoooterController',
        ]);
    }
}
