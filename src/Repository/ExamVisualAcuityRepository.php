<?php

namespace App\Repository;

use App\Entity\ExamVisualAcuity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamVisualAcuity>
 *
 * @method ExamVisualAcuity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamVisualAcuity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamVisualAcuity[]    findAll()
 * @method ExamVisualAcuity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamVisualAcuityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamVisualAcuity::class);
    }

//    /**
//     * @return ExamVisualAcuity[] Returns an array of ExamVisualAcuity objects
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

//    public function findOneBySomeField($value): ?ExamVisualAcuity
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
