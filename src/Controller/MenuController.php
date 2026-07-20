<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MenuRepository;


final class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function index(MenuRepository $menuRepository, Request $request): Response
    {
        $menus = $menuRepository->findAll();


        return $this->render('menu/index.html.twig', [
            'menus' => $menus,
        ]);
    }

    #[Route('/menu/{id}', name: 'app_menu_show')]
    public function show(MenuRepository $menuRepository, int $id): Response 
    {
        $menu = $menuRepository->find($id);

        return $this->render('menu/show.html.twig', [
            'menu' => $menu,
        ]);

    }
}