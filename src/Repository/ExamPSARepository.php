<?php

namespace App\Repository;

use App\Entity\ExamPSA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamPSA>
 *
 * @method ExamPSA|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamPSA|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamPSA[]    findAll()
 * @method ExamPSA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamPSARepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamPSA::class);
    }

//    /**
//     * @return ExamPSA[] Returns an array of ExamPSA objects
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

//    public function findOneBySomeField($value): ?ExamPSA
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
