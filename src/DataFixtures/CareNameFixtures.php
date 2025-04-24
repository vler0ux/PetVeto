<?php
namespace App\DataFixtures;

use App\Entity\CareName;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CareNameFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $types = [
            'Vaccination',
            'Vermifuge',
            'Consultation',
            'Bilan de santé',
            'Stérilisation',
            'Analyse',
            'Autre',
        ];

        foreach ($types as $name) {
            $careName = new CareName();
            $careName->setNameTypeCare($name);
            $manager->persist($careName);
        }

        $manager->flush();
    }
}
