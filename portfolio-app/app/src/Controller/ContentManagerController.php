<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\EntityFormType;
use App\Entity\Project;
use App\Entity\Knowledge;
use App\Entity\Skill;

class ContentManagerController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/admin/content_manager', name: 'app_ContentManagerController')]
    public function index(): Response
    {
        return $this->render('content_manager/index.html.twig', [
            'controller_name' => 'ContentManagerController',
        ]);
    }

    #[Route('/admin/content_manager/{entity}/list', name: 'app_ContentManagerList')]
    public function listEntities(string $entity): Response
    {
        $repository = $this->entityManager->getRepository('App\Entity\\' . ucfirst($entity));
        $entities = $repository->findAll();

        return $this->render('content_manager/' . $entity . '.html.twig', [
            'entities' => $entities,
        ]);
    }

    #[Route('/admin/content_manager/{entity}/create', name: 'app_ContentManagerCreate')]
    public function createEntity(Request $request, string $entity): Response
    {
        $class = 'App\\Entity\\' . ucfirst($entity);
        $entityObject = new $class();

        $form = $this->createForm(EntityFormType::class, $entityObject);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($entityObject);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_ContentManagerList', ['entity' => $entity]);
        }

        return $this->render('content_manager/create_entity.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/content_manager/{entity}/edit/{id}', name: 'app_ContentManagerEdit')]
    public function editEntity(Request $request, string $entity, int $id): Response
    {
        $class = 'App\\Entity\\' . ucfirst($entity);
        $entityObject = $this->entityManager->getRepository($class)->find($id);

        if (!$entityObject) {
            throw $this->createNotFoundException('Entity not found');
        }

        $form = $this->createForm(EntityFormType::class, $entityObject);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('app_ContentManagerList', ['entity' => $entity]);
        }

        return $this->render('content_manager/edit_entity.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/content_manager/{entity}/delete/{id}', name: 'app_ContentManagerDelete')]
    public function deleteEntity(string $entity, int $id): Response
    {
        $class = 'App\\Entity\\' . ucfirst($entity);
        $entityObject = $this->entityManager->getRepository($class)->find($id);

        if (!$entityObject) {
            throw $this->createNotFoundException('Entity not found');
        }

        $this->entityManager->remove($entityObject);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_ContentManagerList', ['entity' => $entity]);
    }
}
