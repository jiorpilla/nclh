<?php

namespace App\Repository;

use App\Entity\ExamRiba;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamRiba>
 *
 * @method ExamRiba|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamRiba|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamRiba[]    findAll()
 * @method ExamRiba[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamRibaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamRiba::class);
    }

//    /**
//     * @return ExamRiba[] Returns an array of ExamRiba objects
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

//    public function findOneBySomeField($value): ?ExamRiba
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
