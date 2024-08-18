<?php

namespace App\Controller;

use App\Entity\DealerWorkHours;
use App\Form\DealerWorkHoursType;
use App\Repository\DealerWorkHoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dealerworkhours')]
class DealerWorkHoursController extends AbstractController
{
    #[Route('/', name: 'app_dealer_work_hours_index', methods: ['GET'])]
    public function index(DealerWorkHoursRepository $dealerWorkHoursRepository): Response
    {
        return $this->render('dealer_work_hours/index.html.twig', [
            'dealer_work_hours' => $dealerWorkHoursRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_dealer_work_hours_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $dealerWorkHour = new DealerWorkHours();
        $form = $this->createForm(DealerWorkHoursType::class, $dealerWorkHour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($dealerWorkHour);
            $entityManager->flush();

            return $this->redirectToRoute('app_dealer_work_hours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dealer_work_hours/new.html.twig', [
            'dealer_work_hour' => $dealerWorkHour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dealer_work_hours_show', methods: ['GET'])]
    public function show(DealerWorkHours $dealerWorkHour): Response
    {
        return $this->render('dealer_work_hours/show.html.twig', [
            'dealer_work_hour' => $dealerWorkHour,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_dealer_work_hours_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DealerWorkHours $dealerWorkHour, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DealerWorkHoursType::class, $dealerWorkHour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_dealer_work_hours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dealer_work_hours/edit.html.twig', [
            'dealer_work_hour' => $dealerWorkHour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_dealer_work_hours_delete', methods: ['POST'])]
    public function delete(Request $request, DealerWorkHours $dealerWorkHour, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dealerWorkHour->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($dealerWorkHour);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_dealer_work_hours_index', [], Response::HTTP_SEE_OTHER);
    }
}
