<?php

namespace App\Repository;

use App\Entity\FrequencyPlay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FrequencyPlay>
 *
 * @method FrequencyPlay|null find($id, $lockMode = null, $lockVersion = null)
 * @method FrequencyPlay|null findOneBy(array $criteria, array $orderBy = null)
 * @method FrequencyPlay[]    findAll()
 * @method FrequencyPlay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrequencyPlayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FrequencyPlay::class);
    }

//    /**
//     * @return FrequencyPlay[] Returns an array of FrequencyPlay objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FrequencyPlay
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
