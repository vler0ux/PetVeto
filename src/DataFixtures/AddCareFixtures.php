<?php

namespace App\DataFixtures;

use App\Factory\CareFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AddCareFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CareFactory::createMany(5);
        $manager->flush();
    }
}
