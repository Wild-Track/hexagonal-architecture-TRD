<?php

namespace App\Repository;

use App\Entity\SoccerVenue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SoccerVenue>
 *
 * @method SoccerVenue|null find($id, $lockMode = null, $lockVersion = null)
 * @method SoccerVenue|null findOneBy(array $criteria, array $orderBy = null)
 * @method SoccerVenue[]    findAll()
 * @method SoccerVenue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SoccerVenueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SoccerVenue::class);
    }

    //    /**
    //     * @return SoccerVenue[] Returns an array of SoccerVenue objects
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

    //    public function findOneBySomeField($value): ?SoccerVenue
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
