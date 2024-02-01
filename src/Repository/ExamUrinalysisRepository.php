<?php

namespace App\Repository;

use App\Entity\ExamUrinalysis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamUrinalysis>
 *
 * @method ExamUrinalysis|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamUrinalysis|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamUrinalysis[]    findAll()
 * @method ExamUrinalysis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamUrinalysisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamUrinalysis::class);
    }

//    /**
//     * @return ExamUrinalysis[] Returns an array of ExamUrinalysis objects
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

//    public function findOneBySomeField($value): ?ExamUrinalysis
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
