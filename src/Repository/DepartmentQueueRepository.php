<?php

namespace App\Repository;

use App\Entity\DepartmentQueue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DepartmentQueue>
 *
 * @method DepartmentQueue|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepartmentQueue|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepartmentQueue[]    findAll()
 * @method DepartmentQueue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentQueueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DepartmentQueue::class);
    }

//    /**
//     * @return DepartmentQueue[] Returns an array of DepartmentQueue objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DepartmentQueue
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
