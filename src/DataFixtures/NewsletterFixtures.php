<?php

namespace App\DataFixtures;

use App\Entity\Newsletter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class NewsletterFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ["group1"];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr-FR");
        for ($i = 0; $i < 30; $i++) {
            $newsletter = new Newsletter();
            $newsletter->setMail($faker->freeEmail)
                ->setDate($faker->dateTimeThisMonth());
            $manager->persist($newsletter);
        }
        $manager->flush();
    }
}
