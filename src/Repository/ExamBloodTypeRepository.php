<?php

namespace App\Repository;

use App\Entity\ExamBloodType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamBloodType>
 *
 * @method ExamBloodType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamBloodType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamBloodType[]    findAll()
 * @method ExamBloodType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamBloodTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamBloodType::class);
    }

//    /**
//     * @return ExamBloodType[] Returns an array of ExamBloodType objects
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

//    public function findOneBySomeField($value): ?ExamBloodType
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
