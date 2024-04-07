<?php

namespace App\Repository;

use App\Entity\SoccerMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SoccerMatch>
 *
 * @method SoccerMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method SoccerMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method SoccerMatch[]    findAll()
 * @method SoccerMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SoccerMatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SoccerMatch::class);
    }

    //    /**
    //     * @return SoccerMatch[] Returns an array of SoccerMatch objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SoccerMatch
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
