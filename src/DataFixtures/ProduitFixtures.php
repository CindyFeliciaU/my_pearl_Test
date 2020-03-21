<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProduitFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ["group1"];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr-FR");
        $categories = ["loisirs", "mode", "maison"];
        for ($i = 0; $i < 30; $i++) {
            $produit = new Produit();
            $produit->setNom($faker->sentence())
                ->setPrix($faker->randomFloat(2, 0, 9))
                ->setUrl($faker->url)
                ->setCategorie($categories[rand(0, 2)])
                ->setDescription($faker->text(255))
                ->setImage($faker->imageUrl(640, 480, "abstract"));
            $manager->persist($produit);
        }
        $manager->flush();
    }
}
