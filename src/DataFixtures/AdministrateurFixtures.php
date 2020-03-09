<?php

namespace App\DataFixtures;

use App\Entity\Administrateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AdministrateurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr-FR");
        for ($i = 0; $i < 30; $i++) {
            $administrateur = new Administrateur();
            $administrateur->setMail($faker->freeEmail)
                ->setNom($faker->lastName)
                ->setPrenom($faker->firstName())
                ->setMdp($faker->password);
            $manager->persist($administrateur);
        }
        $manager->flush();
    }
}
