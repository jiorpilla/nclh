<?php

namespace App\Repository;

use App\Entity\ExamBloodChemistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamBloodChemistry>
 *
 * @method ExamBloodChemistry|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamBloodChemistry|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamBloodChemistry[]    findAll()
 * @method ExamBloodChemistry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamBloodChemistryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamBloodChemistry::class);
    }

//    /**
//     * @return ExamBloodChemistry[] Returns an array of ExamBloodChemistry objects
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

//    public function findOneBySomeField($value): ?ExamBloodChemistry
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
