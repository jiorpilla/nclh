<?php

namespace App\Repository;

use App\Entity\ExamDrugs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamDrugs>
 *
 * @method ExamDrugs|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamDrugs|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamDrugs[]    findAll()
 * @method ExamDrugs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamDrugsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamDrugs::class);
    }

//    /**
//     * @return ExamDrugs[] Returns an array of ExamDrugs objects
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

//    public function findOneBySomeField($value): ?ExamDrugs
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
