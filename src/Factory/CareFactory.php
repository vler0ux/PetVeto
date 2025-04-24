<?php

namespace App\Factory;

use App\Entity\Care;
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
        return [
            'examDate' => self::faker()->dateTimeBetween('-1 year', 'now'),
            'vaccinationDate' => self::faker()->dateTimeBetween('-1 year', 'now'),
            'treatment' => self::faker()->word(),
            'weight' => self::faker()->randomFloat(1, 1, 60),
            'food' => self::faker()->word(),
            'behaviour' => self::faker()->randomElement(['calme', 'agité', 'peureux']),
            'veto' => VetoFactory::random(),
            'animal' => AnimalFactory::random(),
        ];
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
