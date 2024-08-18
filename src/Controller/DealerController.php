<?php

namespace App\Controller;

use App\Entity\Dealer;
use App\Form\DealerType;
use App\Repository\DealerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dealer')]
class DealerController extends AbstractController
{
    #[Route('/', name: 'app_dealer_index', methods: ['GET'])]
    public function index(DealerRepository $dealerRepository): Response
    {
        return $this->render('dealer/index.html.twig', [
            'dealers' => $dealerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_dealer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $dealer = new Dealer();
        $form = $this->createForm(DealerType::class, $dealer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($dealer);
            $entityManager->flush();

            return $this->redirectToRoute('app_dealer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dealer/new.html.twig', [
            'dealer' => $dealer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dealer_show', methods: ['GET'])]
    public function show(Dealer $dealer): Response
    {
        return $this->render('dealer/show.html.twig', [
            'dealer' => $dealer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dealer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dealer $dealer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DealerType::class, $dealer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($dealer);
            $entityManager->flush();

            return $this->redirectToRoute('app_dealer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dealer/edit.html.twig', [
            'dealer' => $dealer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dealer_delete', methods: ['POST'])]
    public function delete(Request $request, Dealer $dealer, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dealer->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($dealer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_dealer_index', [], Response::HTTP_SEE_OTHER);
    }
}
