<?php

namespace App\Controller;

// Je mets la classe AbstractController à ma disposition pour pouvoir l’utiliser dans ce fichier.
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]

    public function index(): Response
    {
        $menus = [
            //'Menu de Italien',
            //'Menu de Mariage',
            //'Menu Anniversaire',
        ];

        return $this->render('home/index.html.twig', [
            'titre' => 'Bienvenue sur Vite & Gourmand !',
            'description' => 'Des menus pour tous vos événements',
            'menus' => $menus,
        ]);
    }
}