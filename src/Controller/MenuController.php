<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MenuRepository;
use App\Entity\Menu;
use App\Form\MenuType;
use Doctrine\ORM\EntityManagerInterface;


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

    #[Route('/menu/new', name: 'app_menu_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $menu = new Menu();

        $form = $this->createForm(MenuType::class, $menu);

        //👉 C’est cette ligne qui prend les données du formulaire et les met dans l’objet $menu.
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($menu);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Le menu a été créé avec succès.',
            );

            return $this->redirectToRoute('app_menu');
        }

        return $this->render('menu/new.html.twig', [
            'form' => $form->createView(),
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
