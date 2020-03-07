<?php

namespace App\DataFixtures;

use App\Entity\Administrateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdministrateurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 30; $i++) {
            $administrateur = new Administrateur();
            $administrateur->setMail("")
                ->setNom("")
                ->setPrenom("")
                ->setMdp("");
            $manager->persist($administrateur);
        }
        $manager->flush();
    }
}
