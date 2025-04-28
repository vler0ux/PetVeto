<?php

namespace App\Factory;

use App\Entity\Care;
use App\Factory\AnimalFactory;
use App\Factory\VetoFactory;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Care>
 */
final class CareFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Care::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return function() {
            $animal = AnimalFactory::random();
            $animalWeight = $animal->getWeight();

            // variation du poid
            $variation = $animalWeight * (random_int(-5, 5) / 100);
            $careWeight = round($animalWeight + $variation, 2);

            return [
                'examDate' => self::faker()->dateTimeBetween('-1 year', 'now'),
                'vaccinationDate' => self::faker()->dateTimeBetween('-1 year', 'now'),
                'careName' =>  self::faker()->randomElement(['Vaccination',
            'Vermifuge',
            'Consultation',
            'Bilan de santé',
            'Stérilisation',
            'Analyse']),
                'weight' => $careWeight,
                'food' => self::faker()->randomElement(['croquette', 'pâtée maison', 'ration mixte', 'B.A.R.F','regime médicalisé']),
                'behaviour' => self::faker()->randomElement(['calme', 'agressif(ve)', 'agité(e)', 'peureux(se)', 'joueur(se)', 'stressé(e)', 'sociable', 'dominant(e)']),
                'veto' => VetoFactory::random(),
                'animal' => $animal,
            ];
        };
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Care $care): void {})
        ;
    }
}
