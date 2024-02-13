<?php

namespace App\Repository;

use App\Entity\MainChampions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MainChampions>
 *
 * @method MainChampions|null find($id, $lockMode = null, $lockVersion = null)
 * @method MainChampions|null findOneBy(array $criteria, array $orderBy = null)
 * @method MainChampions[]    findAll()
 * @method MainChampions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MainChampionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MainChampions::class);
    }

//    /**
//     * @return MainChampions[] Returns an array of MainChampions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MainChampions
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
