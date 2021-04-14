<?php

namespace App\Repository;

use App\Entity\BookClubMonth;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookClubMonth|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookClubMonth|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookClubMonth[]    findAll()
 * @method BookClubMonth[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookClubMonthRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookClubMonth::class);
    }

    // /**
    //  * @return BookClubMonth[] Returns an array of BookClubMonth objects
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
    public function findOneBySomeField($value): ?BookClubMonth
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
