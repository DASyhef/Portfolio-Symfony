<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface; // N'oubliez pas d'importer EntityManagerInterface
use App\Entity\Project; // Remplacez Project par le nom de l'entité correspondante
use App\Entity\Knowledge; // Remplacez Knowledge par le nom de l'entité correspondante
use App\Entity\Skill; // Remplacez Skill par le nom de l'entité correspondante

class ContentManagerController extends AbstractController
{
    #[Route('/content/manager', name: 'app_ContentManagerController')]
    public function index(): Response
    {
        return $this->render('content_manager/index.html.twig', [
            'controller_name' => 'ContentManagerController',
        ]);
    }

    #[Route('/content/manager/{entity}/list', name: 'app_ContentManagerList')]
    public function listEntities(string $entity, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository('App\Entity\\' . ucfirst($entity));
        $entities = $repository->findAll();

        return $this->render('content_manager/' . $entity . '.html.twig', [
            'entities' => $entities,
        ]);
    }

    #[Route('/content/manager/{entity}/create', name: 'app_ContentManagerCreate')]
    public function createEntity(string $entity): Response
    {
        // Handle the creation logic here
        // ...
    }

    #[Route('/content/manager/{entity}/edit/{id}', name: 'app_ContentManagerEdit')]
    public function editEntity(string $entity, int $id): Response
    {
        // Handle the edit logic here
        // ...
    }

    #[Route('/content/manager/{entity}/delete/{id}', name: 'app_ContentManagerDelete')]
    public function deleteEntity(string $entity, int $id): Response
    {
        // Handle the delete logic here
        // ...
    }
}