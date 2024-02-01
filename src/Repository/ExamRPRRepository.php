<?php

namespace App\Repository;

use App\Entity\ExamRPR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamRPR>
 *
 * @method ExamRPR|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamRPR|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamRPR[]    findAll()
 * @method ExamRPR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamRPRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamRPR::class);
    }

//    /**
//     * @return ExamRPR[] Returns an array of ExamRPR objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ExamRPR
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
