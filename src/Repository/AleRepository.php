<?php

namespace App\Repository;

use App\Entity\Ale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ale|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ale|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ale[]    findAll()
 * @method Ale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ale::class);
    }

    // /**
    //  * @return Ale[] Returns an array of Ale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ale
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
