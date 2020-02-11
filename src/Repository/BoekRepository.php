<?php

namespace App\Repository;

use App\Entity\Boek;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Boek|null find($id, $lockMode = null, $lockVersion = null)
 * @method Boek|null findOneBy(array $criteria, array $orderBy = null)
 * @method Boek[]    findAll()
 * @method Boek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoekRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boek::class);
    }

    // /**
    //  * @return Boek[] Returns an array of Boek objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Boek
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
