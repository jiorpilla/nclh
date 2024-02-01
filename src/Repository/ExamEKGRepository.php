<?php

namespace App\Repository;

use App\Entity\ExamEKG;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamEKG>
 *
 * @method ExamEKG|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamEKG|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamEKG[]    findAll()
 * @method ExamEKG[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamEKGRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamEKG::class);
    }

//    /**
//     * @return ExamEKG[] Returns an array of ExamEKG objects
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

//    public function findOneBySomeField($value): ?ExamEKG
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
