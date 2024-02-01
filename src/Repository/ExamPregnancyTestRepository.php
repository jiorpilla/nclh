<?php

namespace App\Repository;

use App\Entity\ExamPregnancyTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamPregnancyTest>
 *
 * @method ExamPregnancyTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamPregnancyTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamPregnancyTest[]    findAll()
 * @method ExamPregnancyTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamPregnancyTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamPregnancyTest::class);
    }

//    /**
//     * @return ExamPregnancyTest[] Returns an array of ExamPregnancyTest objects
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

//    public function findOneBySomeField($value): ?ExamPregnancyTest
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
