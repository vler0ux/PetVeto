<?php

namespace App\Factory;
use App\Factory\UserFactory;
use App\Entity\Animal;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Animal>
 */
final class AnimalFactory extends PersistentProxyObjectFactory
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
        return Animal::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'user' => UserFactory::random(),
            'birthday' => self::faker()->dateTimeBetween('-15 years', 'now'),
            'description' => self::faker()->randomElement([
                'Animal affectueux et joueur',
                'A besoin d’un régime alimentaire spécial',
                'Sensible au stress, préfère les environnements calmes',
                'Très énergique, adore courir',
                'Sociable avec les autres animaux'
            ]),
            'weight' => self::faker()->randomFloat(1, 1, 60),
            'name' => self::faker()->randomElement([
                'Tulipe', 'Lilas', 'Rose', 'Camélia', 'Magnolia', 'Églantine', 'Coquelicot', 'Myrtille',
                'Lou', 'Léo', 'Zoé', 'Élia', 'Malo', 'Jade', 'Sacha', 'Noé', 'Léna',
                'Cachou', 'Pépito', 'Moka', 'Choupi', 'Biscotte', 'Plume', 'Caramel', 'Praline',
                'Panda', 'Ourson', 'Chaton', 'Moineau', 'Écureuil', 'Loutre'
            ]),
            'species' => self::faker()->randomElement([
                'Chien', 'Chat', 'Lapin', 'Cochon d’Inde',
                'Furet', 'Perroquet','Cheval', 'Souris', 'Rat',
                'Hamster', 'Tortue', 'Serpent'
            ]),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Animal $animal): void {})
        ;
    }
}
