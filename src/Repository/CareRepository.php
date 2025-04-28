<?php

namespace App\Repository;

use App\Entity\Care;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Care>
 */
class CareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Care::class);
    }

    /**
     * Retourne les soins des animaux appartenant à un utilisateur donné
     *
     * @param User $user
     * @return Care[]
     */
    public function findByUserAnimals(User $user): array
    {
        return $this->createQueryBuilder('c')
            ->join('c.animal', 'a')
            ->andWhere('a.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }
}
