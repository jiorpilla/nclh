<?php

namespace App\Repository;

use App\Entity\ExamFecalysis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamFecalysis>
 *
 * @method ExamFecalysis|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamFecalysis|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamFecalysis[]    findAll()
 * @method ExamFecalysis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamFecalysisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamFecalysis::class);
    }

//    /**
//     * @return ExamFecalysis[] Returns an array of ExamFecalysis objects
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

//    public function findOneBySomeField($value): ?ExamFecalysis
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
