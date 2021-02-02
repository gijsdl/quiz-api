<?php

namespace App\Repository;

use App\Entity\Uitslag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Uitslag|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uitslag|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uitslag[]    findAll()
 * @method Uitslag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UitslagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Uitslag::class);
    }

    // /**
    //  * @return Uitslag[] Returns an array of Uitslag objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Uitslag
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
