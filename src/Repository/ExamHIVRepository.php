<?php

namespace App\Repository;

use App\Entity\ExamHIV;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamHIV>
 *
 * @method ExamHIV|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamHIV|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamHIV[]    findAll()
 * @method ExamHIV[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamHIVRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamHIV::class);
    }

//    /**
//     * @return ExamHIV[] Returns an array of ExamHIV objects
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

//    public function findOneBySomeField($value): ?ExamHIV
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
