<?php

namespace App\Repository;

use App\Entity\Credencial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Credencial|null find($id, $lockMode = null, $lockVersion = null)
 * @method Credencial|null findOneBy(array $criteria, array $orderBy = null)
 * @method Credencial[]    findAll()
 * @method Credencial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CredencialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Credencial::class);
    }

    // /**
    //  * @return Credencial[] Returns an array of Credencial objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Credencial
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
