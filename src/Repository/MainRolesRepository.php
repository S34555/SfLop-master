<?php

namespace App\Repository;

use App\Entity\MainRoles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MainRoles>
 *
 * @method MainRoles|null find($id, $lockMode = null, $lockVersion = null)
 * @method MainRoles|null findOneBy(array $criteria, array $orderBy = null)
 * @method MainRoles[]    findAll()
 * @method MainRoles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MainRolesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MainRoles::class);
    }

//    /**
//     * @return MainRoles[] Returns an array of MainRoles objects
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

//    public function findOneBySomeField($value): ?MainRoles
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
