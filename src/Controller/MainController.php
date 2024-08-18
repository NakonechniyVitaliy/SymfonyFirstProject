<?php

namespace App\Controller;



use App\Repository\DealerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/main/', name: 'app_main')]
    public function index(DealerRepository $dealerRepository): Response
    {
        $mazdaDealer = $dealerRepository->findOneBy(['id'=> 2]);
        $mazdaWorkHours = $mazdaDealer->getDealerWorkHours();


        $mondayOpenTime = $mazdaWorkHours->getMondayOpen();
        dump($mondayOpenTime);exit();


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
