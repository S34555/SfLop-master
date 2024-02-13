<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayStyleController extends AbstractController
{
    #[Route('/play/style', name: 'app_play_style')]
    public function index(): Response
    {
        return $this->render('play_style/index.html.twig', [
            'controller_name' => 'PlayStyleController',
        ]);
    }
}
