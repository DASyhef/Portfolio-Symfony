<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LogoutController extends AbstractController
{
    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
        // Cette méthode ne sera pas exécutée. La déconnexion est gérée automatiquement par Symfony.
    }
}