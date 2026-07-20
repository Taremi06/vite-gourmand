<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Menu;


class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $menu = new Menu();
        $menu->setNom("Menu Classique");
        $menu->setDescription("Entrée, plat et dessert préparés avec des produits frais.");
        $menu->setNombrePersonnesMinimum(4);
        $menu->setPrix("29.90");
        $menu->setStock(15);

        $manager->persist($menu);
        
        $manager->flush();
    }
}
