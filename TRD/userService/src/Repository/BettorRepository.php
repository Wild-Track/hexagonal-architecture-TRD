<?php

namespace App\Repository;

use App\Entity\Bettor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bettor>
 *
 * @method Bettor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bettor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bettor[]    findAll()
 * @method Bettor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BettorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bettor::class);
    }

    //    /**
    //     * @return Bettor[] Returns an array of Bettor objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Bettor
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
