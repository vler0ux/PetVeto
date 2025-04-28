<?php

namespace App\DataFixtures;

use App\Factory\AnimalFactory;
use App\Factory\CareFactory;
use App\Factory\UserFactory;
use App\Factory\VetoFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createMany(10);
        VetoFactory::createMany(5);
        AnimalFactory::createMany(30);
        CareFactory::createMany(60);
        $manager->flush();
    }
}
