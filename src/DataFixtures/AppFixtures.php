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
        UserFactory::createMany(5);
        VetoFactory::createMany(3);
        AnimalFactory::createMany(10);
        CareFactory::createMany(20);
        $manager->flush();
    }
}
