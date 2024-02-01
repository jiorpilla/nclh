<?php

namespace App\Repository;

use App\Entity\ExamVaccines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamVaccines>
 *
 * @method ExamVaccines|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamVaccines|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamVaccines[]    findAll()
 * @method ExamVaccines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamVaccinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamVaccines::class);
    }

//    /**
//     * @return ExamVaccines[] Returns an array of ExamVaccines objects
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

//    public function findOneBySomeField($value): ?ExamVaccines
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
