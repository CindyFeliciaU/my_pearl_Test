<?php

namespace App\DataFixtures;

use App\Entity\Avis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AvisFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr-FR");
        for ($i = 0; $i < 30; $i++) {
            $avis = new Avis();
            $avis->setMail($faker->freeEmail)
                ->setMsg($faker->realText(255))
                ->setEtat(false);
            $manager->persist($avis);
        }
        $manager->flush();
    }
}
