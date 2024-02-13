<?php

namespace App\Repository;

use App\Entity\PlayStyles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlayStyles>
 *
 * @method PlayStyles|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayStyles|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayStyles[]    findAll()
 * @method PlayStyles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayStylesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayStyles::class);
    }

//    /**
//     * @return PlayStyles[] Returns an array of PlayStyles objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PlayStyles
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
