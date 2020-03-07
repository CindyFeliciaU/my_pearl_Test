<?php

namespace App\DataFixtures;

use App\Entity\Administrateur;
use App\Entity\Avis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AvisFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 30; $i++) {
            $avis = new Avis();
            $administrateur = new Administrateur();
            $avis->setMail("")
                ->setMsg("")
                ->setEtat("")
                ->setMailAdministrateur($administrateur);
            $manager->persist($avis);
        }
        $manager->flush();
    }
}
