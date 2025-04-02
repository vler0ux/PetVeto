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
            'behaviour' => self::faker()->text(255),
            'food' => self::faker()->sentence(1),
            'treatment' => self::faker()->text(255),
            'vaccin_date' => self::faker()->dateTime(),
            'vaccins' => self::faker()->text(255),
            'veto_examination' => self::faker()->dateTime(),
            'weightTracking' => self::faker()->randomNumber(),
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
