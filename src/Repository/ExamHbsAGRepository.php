<?php

namespace App\Repository;

use App\Entity\ExamHbsAG;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamHbsAG>
 *
 * @method ExamHbsAG|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamHbsAG|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamHbsAG[]    findAll()
 * @method ExamHbsAG[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamHbsAGRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamHbsAG::class);
    }

//    /**
//     * @return ExamHbsAG[] Returns an array of ExamHbsAG objects
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

//    public function findOneBySomeField($value): ?ExamHbsAG
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
