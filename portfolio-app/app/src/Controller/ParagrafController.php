<?php

namespace App\Controller;

use App\Entity\Paragraf;
use App\Form\ParagrafType;
use App\Repository\ParagrafRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/paragraf')]
class ParagrafController extends AbstractController
{
    #[Route('/', name: 'app_paragraf_index', methods: ['GET'])]
    public function index(ParagrafRepository $paragrafRepository): Response
    {
        return $this->render('paragraf/index.html.twig', [
            'paragrafs' => $paragrafRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_paragraf_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ParagrafRepository $paragrafRepository): Response
    {
        $paragraf = new Paragraf();
        $form = $this->createForm(ParagrafType::class, $paragraf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paragrafRepository->save($paragraf, true);

            return $this->redirectToRoute('app_paragraf_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('paragraf/new.html.twig', [
            'paragraf' => $paragraf,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_paragraf_show', methods: ['GET'])]
    public function show(Paragraf $paragraf): Response
    {
        return $this->render('paragraf/show.html.twig', [
            'paragraf' => $paragraf,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_paragraf_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Paragraf $paragraf, ParagrafRepository $paragrafRepository): Response
    {
        $form = $this->createForm(ParagrafType::class, $paragraf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paragrafRepository->save($paragraf, true);

            return $this->redirectToRoute('app_paragraf_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('paragraf/edit.html.twig', [
            'paragraf' => $paragraf,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_paragraf_delete', methods: ['POST'])]
    public function delete(Request $request, Paragraf $paragraf, ParagrafRepository $paragrafRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paragraf->getId(), $request->request->get('_token'))) {
            $paragrafRepository->remove($paragraf, true);
        }

        return $this->redirectToRoute('app_paragraf_index', [], Response::HTTP_SEE_OTHER);
    }
}
