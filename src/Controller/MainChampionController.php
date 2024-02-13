<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainChampionController extends AbstractController
{
    #[Route('/main/champion', name: 'app_main_champion')]
    public function index(): Response
    {
        return $this->render('main_champion/index.html.twig', [
            'controller_name' => 'MainChampionController',
        ]);
    }
}
